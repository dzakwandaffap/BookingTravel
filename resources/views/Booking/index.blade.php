@extends('layout.nav')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Bookings</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('booking.create') }}" class="btn btn-primary mb-3">Add Booking</a>

    <table class="table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Booking Date</th>
                <th>Type</th>
                <th>Number of People</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->user_name }}</td>
                    <td>{{ $booking->user_email }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->destination }}</td>
                    <td>{{ $booking->number_of_people }}</td>
                    <td>
                        <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bookings->links() }} <!-- Pagination links -->
</div>
@endsection
