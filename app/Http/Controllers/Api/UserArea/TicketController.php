<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {

    }

    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $request->validate([
            'message' => 'required|string|min:3|max:2000'
        ]);
        // abort_if(403, );
        $message = new TicketMessage;
        $message->side = 'customer';
        $message->body = $request->input('message');
        $message->user_id = $request->user()->id;
        $ticket->messages()->save($message);
        return response()->json([
            'okay' => true,
            'message' => $message
        ]);
    }

    public function destroy(Request $request)
    {

    }

    public function departments()
    {
        $departments = TicketDepartment::orderBy('name')->get();
        return response()->json($departments);
    }
}