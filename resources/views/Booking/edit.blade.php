@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-8 font-poppins">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 text-primary rounded-2xl mb-4">
                <i class="fas fa-edit text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Booking</h1>
            <p class="text-gray-600">Update the booking details below</p>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('booking.index') }}" class="hover:text-primary transition-colors">
                <i class="fas fa-home mr-1"></i>Bookings
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-700">Edit #{{ $booking->id }}</span>
        </nav>

        <!-- Error Alert -->
        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-xl text-red-500"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-red-800 font-semibold mb-2">Please correct the following errors:</h3>
                    <ul class="text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center">
                                <i class="fas fa-circle text-xs mr-2"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Booking Summary Card -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6 mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-semibold mr-4">
                        {{ strtoupper(substr($booking->user_name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $booking->user_name }}</h3>
                        <p class="text-sm text-gray-600">{{ $booking->user_email }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 text-sm">
                    <div class="text-center">
                        <p class="text-gray-500">Type</p>
                        <p class="font-semibold">{{ $booking->destination }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-500">Date</p>
                        <p class="font-semibold">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-500">Travelers</p>
                        <p class="font-semibold">{{ $booking->number_of_people }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                <h2 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-pencil-alt mr-3"></i>
                    Update Booking Information
                </h2>
                <p class="text-blue-100 mt-1">Modify the booking details as needed</p>
            </div>

            <form action="{{ route('booking.update', $booking->id) }}" method="POST" class="p-8">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="user_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-primary mr-2"></i>
                                Full Name *
                            </label>
                            <input type="text"
                                   id="user_name"
                                   name="user_name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('user_name') border-red-300 @enderror"
                                   value="{{ old('user_name', $booking->user_name) }}"
                                   placeholder="Enter full name"
                                   required>
                            @error('user_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="user_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-primary mr-2"></i>
                                Email Address *
                            </label>
                            <input type="email"
                                   id="user_email"
                                   name="user_email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('user_email') border-red-300 @enderror"
                                   value="{{ old('user_email', $booking->user_email) }}"
                                   placeholder="Enter email address"
                                   required>
                            @error('user_email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Booking Date -->
                        <div class="form-group">
                            <label for="booking_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-primary mr-2"></i>
                                Booking Date *
                            </label>
                            <input type="date"
                                   id="booking_date"
                                   name="booking_date"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('booking_date') border-red-300 @enderror"
                                   value="{{ old('booking_date', $booking->booking_date) }}"
                                   min="{{ date('Y-m-d') }}"
                                   required>
                            @error('booking_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Booking Type -->
                        <div class="form-group">
                            <label for="destination" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tag text-primary mr-2"></i>
                                Booking Type *
                            </label>
                            <div class="relative">
                                <select name="destination"
                                        id="destination"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white appearance-none @error('destination') border-red-300 @enderror"
                                        required>
                                    <option value="Hotel" {{ old('destination', $booking->destination) == 'Hotel' ? 'selected' : '' }}>
                                        🏨 Hotel Reservation
                                    </option>
                                    <option value="Flight" {{ old('destination', $booking->destination) == 'Flight' ? 'selected' : '' }}>
                                        ✈️ Flight Booking
                                    </option>
                                    <option value="Travel" {{ old('destination', $booking->destination) == 'Travel' ? 'selected' : '' }}>
                                        🎒 Travel Package
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('destination')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Number of People -->
                        <div class="form-group">
                            <label for="number_of_people" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-users text-primary mr-2"></i>
                                Number of Travelers *
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="number_of_people"
                                       name="number_of_people"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('number_of_people') border-red-300 @enderror"
                                       value="{{ old('number_of_people', $booking->number_of_people) }}"
                                       min="1"
                                       max="20"
                                       placeholder="Enter number of travelers"
                                       required>
                            </div>
                            @error('number_of_people')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Maximum 20 travelers per booking</p>
                        </div>

                        <!-- Update Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <h4 class="text-blue-800 font-semibold text-sm mb-2">
                                <i class="fas fa-info-circle mr-2"></i>
                                Update Information
                            </h4>
                            <ul class="text-blue-700 text-xs space-y-1">
                                <li>• Changes will be saved immediately</li>
                                <li>• Updated confirmation will be sent via email</li>
                                <li>• Original booking: {{ $booking->created_at->format('M d, Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('booking.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 w-full sm:w-auto justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancel Changes
                    </a>

                    <div class="flex space-x-3 w-full sm:w-auto">
                        <button type="button"
                                onclick="resetForm()"
                                class="inline-flex items-center px-6 py-3 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-xl transition-all duration-200 flex-1 sm:flex-initial justify-center">
                            <i class="fas fa-undo mr-2"></i>
                            Reset
                        </button>

                        <button type="submit"
                                class="inline-flex items-center px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 flex-1 sm:flex-initial justify-center">
                            <i class="fas fa-save mr-2"></i>
                            Update Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Additional Actions -->
        <div class="mt-6 text-center">
            <p class="text-gray-500 text-sm mb-4">Need help? Contact our support team</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium">
                    <i class="fas fa-phone mr-1"></i>
                    Call Support
                </a>
                <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium">
                    <i class="fas fa-envelope mr-1"></i>
                    Email Help
                </a>
                <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium">
                    <i class="fas fa-question-circle mr-1"></i>
                    FAQ
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const originalValues = {
        user_name: document.querySelector('input[name="user_name"]').value,
        user_email: document.querySelector('input[name="user_email"]').value,
        booking_date: document.querySelector('input[name="booking_date"]').value,
        destination: document.querySelector('select[name="destination"]').value,
        number_of_people: document.querySelector('input[name="number_of_people"]').value
    };

    window.resetForm = function() {
        if (confirm('Are you sure you want to reset all changes?')) {
            document.querySelector('input[name="user_name"]').value = originalValues.user_name;
            document.querySelector('input[name="user_email"]').value = originalValues.user_email;
            document.querySelector('input[name="booking_date"]').value = originalValues.booking_date;
            document.querySelector('select[name="destination"]').value = originalValues.destination;
            document.querySelector('input[name="number_of_people"]').value = originalValues.number_of_people;
            hasChanges = false;
            updateSubmitButton();
        }
    };

    const peopleInput = document.querySelector('input[name="number_of_people"]');
    if (peopleInput) {
        peopleInput.addEventListener('input', function() {
            let value = parseInt(this.value) || 0;
            if (value > 20) this.value = 20;
            else if (value < 1) this.value = 1;
        });
    }

    const formInputs = document.querySelectorAll('input, select');
    let hasChanges = false;

    formInputs.forEach(input => {
        input.addEventListener('change', function() {
            hasChanges = true;
            updateSubmitButton();
        });
    });

    function updateSubmitButton() {
        const submitBtn = document.querySelector('button[type="submit"]');
        if (hasChanges) {
            submitBtn.classList.add('ring-2', 'ring-blue-300');
        } else {
            submitBtn.classList.remove('ring-2', 'ring-blue-300');
        }
    }

    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
            return e.returnValue;
        }
    });
});
</script>
@endsection
