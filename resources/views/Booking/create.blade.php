@extends('layout.nav')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Booking</h2>

    <form action="{{ route('booking.store') }}" method="POST" class="card p-5">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="user_name" class="form-label">User Name:</label>
            <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name') }}">
        </div>

        <div class="mb-3">
            <label for="user_email" class="form-label">User Email:</label>
            <input type="email" id="user_email" name="user_email" class="form-control" value="{{ old('user_email') }}">
        </div>

        <div class="mb-3">
            <label for="booking_date" class="form-label">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" class="form-control" value="{{ old('booking_date') }}">
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Type:</label>
            <select name="destination" id="destination" class="form-select">
                <option value="Hotel" {{ old('destination') == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                <option value="Flight" {{ old('destination') == 'Flight' ? 'selected' : '' }}>Flight</option>
                <option value="Travel" {{ old('destination') == 'Travel' ? 'selected' : '' }}>Travel</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="number_of_people" class="form-label">Number of People:</label>
            <input type="number" id="number_of_people" name="number_of_people" class="form-control" value="{{ old('number_of_people') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
