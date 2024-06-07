<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationsController extends Controller
{
    /**
     * Show the reservations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch reservations data
        $reservations = Reservation::all();

        // If there's a status message to display, set the $status variable
        $status = session('status');

        // Render the reservations view and pass the $reservations and $status variables
        return view('reservations', compact('reservations', 'status'));
    }
}
