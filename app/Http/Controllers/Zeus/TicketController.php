<?php

namespace App\Http\Controllers\Zeus;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\Zeus\TicketDepartment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * This method returns a HTML page containing the script tags and
     * other things needed to run the JS interface of Support tickets
     * @return \Illuminate\Support\Facades\View
     */
    public function page()
    {
        return view('custom.tickets');
    }
    /**
     * 
     */
    public function departments()
    {
        $user = auth('zeus')->user();
        $departments = TicketDepartment::whereRelation('users', 'user_id', '=', $user->id)->get();
        return response()->json($departments);
    }
    /**
     * This method returns json response containing all tickets with their unread messages
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($department)
    {
        $department = TicketDepartment::findOrFail($department);
        $tickets = $department->tickets()->withCount(['unread_messages' => function(Builder $query) {
            $query->whereSide('customer');
        }])->latest()->paginate(10);
        return response()->json(compact('tickets'));
    }
    /**
     * This method returns the ticket with paginated messages
     * @param int|string $ticket Ticket identifier
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $messages = $ticket->messages()->simplePaginate(10);
        return response()->json(compact('ticket', 'messages'));
    }
    /**
     * This method accepts the values needed to edit on Ticket from Requested params
     * and tries to update the ticket with the given params and return the new ticket
     * as a json response
     * @param \Illuminate\Http\Request $request Requested Params
     * @param int|string $ticket Ticket Identifier
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->fill($request->all());
        $ticket->save();
        return response()->json([
            'okay' => true,
            'ticket' => $ticket
        ]);
    }
    /**
     * This method will create a new message on the given Ticket instance
     * @param \Illuminate\Http\Request $request new TicketMessage params
     * @param int|string $ticket Ticket Identifier
     * @return \Illuminate\Http\JsonResponse
     */
    public function message(Request $request, $ticket)
    {
        $request->validate([
            'message' => 'required|string|min:3|max:2000'
        ]);
        $ticket = Ticket::findOrFail($ticket);
        $message = new TicketMessage;
        $message->side = 'operator';
        $message->body = $request->input('message');
        $message->user_id = $request->user()->id;
        $message->read_at = null;
        $ticket->messages()->save($message);
        return response()->json([
            'okay' => true,
            'message' => $message
        ]);
    }
}