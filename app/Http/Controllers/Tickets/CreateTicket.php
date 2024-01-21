<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class CreateTicket extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return $request->all();
        $ticket = Ticket::create([
            'ticket_number' => $request->ticket_number,
            'problem_type' => $request->problem,
            'description' => $request->description,
            'created_by' => $request->user()->id,
        ]);

        $this->log('Ticket created: '. $ticket->ticket_number, 'Tickets');

        return redirect()->route('tickets.index')->with('notification.success','New ticket created');
    }
}
