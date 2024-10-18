@extends('layout.nav')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Booking</h2>

    {{-- Jika ada error validasi, tampilkan di sini --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk mengedit booking --}}
    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="user_name" class="form-label">User Name</label>
            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ old('user_name', $booking->user_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="user_email" class="form-label">User Email</label>
            <input type="email" name="user_email" class="form-control" id="user_email" value="{{ old('user_email', $booking->user_email) }}" required>
        </div>

        <div class="mb-3">
            <label for="booking_date" class="form-label">Booking Date</label>
            <input type="date" name="booking_date" class="form-control" id="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Type:</label>
            <select name="destination" id="destination" class="form-select">
                <option value="Hotel" {{ old('destination', $booking->destination) == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                <option value="Flight" {{ old('destination', $booking->destination) == 'Flight' ? 'selected' : '' }}>Flight</option>
                <option value="Travel" {{ old('destination', $booking->destination) == 'Travel' ? 'selected' : '' }}>Travel</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="number_of_people" class="form-label">Number of People</label>
            <input type="number" name="number_of_people" class="form-control" id="number_of_people" value="{{ old('number_of_people', $booking->number_of_people) }}" min="1" required>
        </div>

        {{-- Peletakan tombol di dalam div untuk align yang baik --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('booking.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </div>
    </form>
</div>
@endsection
