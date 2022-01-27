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
        $tickets = $request->user()->tickets()->paginate(10);
        return response()->json($tickets);
    }

    public function show(Request $request, Ticket $ticket)
    {
        $this->authorize('view', $ticket);
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