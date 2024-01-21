<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class UpdateTicket extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $ticket->problem_type = $request->problem;
        $ticket->description = $request->description;   
        $ticket->save();

        $this->log('Ticket updated: '. $ticket->ticket_number, 'Tickets');

        return redirect()->route("tickets.index")->with("notification.success","Ticket details has been updated");
    }
}
