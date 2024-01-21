<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class ShowTickets extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tickets = Ticket::orderBy("created_at","desc")->get();
        return view("tickets.index", compact("tickets"));
    }
}
