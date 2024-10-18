<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(5);
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|max:100',
            'user_email' => 'required|email',
            'booking_date' => 'required|date',
            'destination' => 'required|max:100',
            'number_of_people' => 'required|integer|min:1',
        ]);

        Booking::create($request->all());

        return redirect()->route('booking.index')->with('success', 'Booking created successfully.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required|max:100',
            'user_email' => 'required|email',
            'booking_date' => 'required|date',
            'destination' => 'required|max:100',
            'number_of_people' => 'required|integer|min:1',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully.');
    }
}