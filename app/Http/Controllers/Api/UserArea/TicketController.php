<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewTicketMessageRequest;
use App\Http\Requests\NewTicketRequest;
use App\Models\File;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = $request->user()
                    ->tickets()
                    ->select('id', 'title', 'tracking_code', 'status', 'ticket_department_id', 'closed_at', 'created_at')
                    ->with('department')
                    ->paginate(10);
        return response()->json($tickets);
    }

    public function show(Request $request, $ticket_id)
    {
        $ticket = $request->user()
                    ->tickets()
                    ->select('id', 'title', 'user_id', 'tracking_code', 'status', 'ticket_department_id', 'closed_at', 'created_at')
                    ->findOrFail($ticket_id);
        $this->authorize('view', $ticket);
        if (! $request->has('cursor')) {
            $ticket->load('department');
        }
        $messages = $ticket->messages()->orderBy('created_at', 'desc')->simplePaginate(5);
        return response()->json(compact('ticket', 'messages'));
    }

    public function store(NewTicketRequest $request)
    {
        $department = TicketDepartment::select(['id'])->findOrFail($request->input('department'));
        try {
            \DB::beginTransaction();
            $ticket = new Ticket([
                'status' => 'open',
                'title' => $request->input('title'),
            ]);
            $ticket->ticket_department_id = $department->getKey();
            if ($request->user()->tickets()->save($ticket)) {
                $ticket_message = new TicketMessage([
                    'side' => 'customer',
                    'body' => $request->input('ticket_content'),
                    'user_id' => $request->user()->getKey()
                ]);
                $ticket->messages()->save($ticket_message);
                $files = $this->handleUploadedFilesForMessage($request);
                if ($files->count()) {
                    $ticket_message->files()->saveMany($files);
                }
                \DB::commit();
                return response()->json([
                    'okay' => true,
                    'ticket' => $ticket
                ]);
            }
        } catch (\Throwable $th) {
            \DB::rollback();
            abort(500);
        }
    }

    public function update(NewTicketMessageRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        try {
            \DB::beginTransaction();
            $ticket_message = new TicketMessage([
                'side' => 'customer',
                'body' => $request->input('message'),
                'user_id' => $request->user()->id
            ]);
            $ticket->messages()->save($ticket_message);
            $ticket->updated_at = $ticket_message->created_at;
            $ticket->save();
            $files = $this->handleUploadedFilesForMessage($request);
            if ($files->count()) {
                $ticket_message->files()->saveMany($files);
            }
            \DB::commit();
            return response()->json([
                'okay' => true,
                'message' => $ticket_message
            ]);
        } catch (\Throwable $th) {
            \DB::rollback();
            abort(500);
        }
    }

    public function destroy(Request $request)
    {

    }

    public function departments()
    {
        $departments = TicketDepartment::orderBy('name')->get();
        return response()->json($departments);
    }
    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Support\Collection
     */
    protected function handleUploadedFilesForMessage($request)
    {
        return collect($request->file('files'))->map(function($uploaded_file) {
            return new File([
                'path' => $uploaded_file->store('private/images'),
                'name' => $uploaded_file->getClientOriginalName(),
                'type' => 'image',
                'ext' => $uploaded_file->extension()
            ]);
        });
    }
}