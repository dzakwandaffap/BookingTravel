<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
{
    $query = Booking::query();

    // Admin lihat semua, user lihat booking miliknya
    if (Auth::user()->role !== 'admin') {
        $query->where('user_email', Auth::user()->email);
    }

    // Search filter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('destination', 'like', "%{$search}%")
              ->orWhere('user_name', 'like', "%{$search}%");
        });
    }

    $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

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
            'booking_date' => 'required|date|after_or_equal:today',
            'destination' => 'required|max:100',
            'number_of_people' => 'required|integer|min:1|max:20',
        ]);

        // For non-admin users, automatically set user_name and user_email to current user's data
        $bookingData = $request->all();
        if (Auth::user()->role !== 'admin') {
            $bookingData['user_name'] = Auth::user()->name;
            $bookingData['user_email'] = Auth::user()->email;
        }

        Booking::create($bookingData);

        return redirect()->route('booking.index')->with('success', 'Booking created successfully.');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        // Check if user has permission to view this booking
        if (Auth::user()->role !== 'admin' && $booking->user_email !== Auth::user()->email) {
            abort(403, 'Unauthorized access to this booking.');
        }

        return view('booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        // Check if user has permission to edit this booking
        if (Auth::user()->role !== 'admin' && $booking->user_email !== Auth::user()->email) {
            abort(403, 'Unauthorized access to edit this booking.');
        }

        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Check if user has permission to update this booking
        if (Auth::user()->role !== 'admin' && $booking->user_email !== Auth::user()->email) {
            abort(403, 'Unauthorized access to update this booking.');
        }

        $request->validate([
            'user_name' => 'required|max:100',
            'user_email' => 'required|email',
            'booking_date' => 'required|date|after_or_equal:today',
            'destination' => 'required|max:100',
            'number_of_people' => 'required|integer|min:1|max:20',
        ]);

        $bookingData = $request->all();

        // For non-admin users, prevent them from changing user_name and user_email
        if (Auth::user()->role !== 'admin') {
            $bookingData['user_name'] = $booking->user_name;
            $bookingData['user_email'] = $booking->user_email;
        }

        $booking->update($bookingData);

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        // Only admin can delete bookings
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Only administrators can delete bookings.');
        }

        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully.');
    }
}
