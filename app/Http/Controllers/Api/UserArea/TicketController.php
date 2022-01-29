<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketDepartment;
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

    public function show(Request $request, Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        $ticket->load('department');
        $messages = $ticket->messages()->cursorPaginate(10);
        return response()->json(compact('ticket', 'messages'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Ticket $ticket)
    {

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