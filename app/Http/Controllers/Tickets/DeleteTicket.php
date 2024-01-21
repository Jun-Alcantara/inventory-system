<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class DeleteTicket extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->delete();

        $this->log('Ticket deleted: '. $ticket->ticket_number, 'Tickets');
        
        return back()->with("notification.success","A ticket has been deleted");
    }
}
