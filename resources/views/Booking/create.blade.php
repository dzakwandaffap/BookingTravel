@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-8 font-poppins">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 text-primary rounded-2xl mb-4">
                <i class="fas fa-plus-circle text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Booking</h1>
            <p class="text-gray-600">Fill in the details to create a new travel booking</p>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('booking.index') }}" class="hover:text-primary transition-colors">
                <i class="fas fa-home mr-1"></i>Bookings
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-700">Create New</span>
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

        <!-- Main Form -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-primary to-primary-dark p-6 text-white">
                <h2 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-edit mr-3"></i>
                    Booking Information
                </h2>
                <p class="text-white  mt-1">Enter the booking details below</p>
            </div>

            <form action="{{ route('booking.store') }}" method="POST" class="p-8">
                @csrf

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
                                   value="{{ old('user_name') }}"
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
                                   value="{{ old('user_email') }}"
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
                                   value="{{ old('booking_date') }}"
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
                                    <option value="" disabled selected>Select booking type</option>
                                    <option value="Hotel" {{ old('destination') == 'Hotel' ? 'selected' : '' }}>
                                        🏨 Hotel Reservation
                                    </option>
                                    <option value="Flight" {{ old('destination') == 'Flight' ? 'selected' : '' }}>
                                        ✈️ Flight Booking
                                    </option>
                                    <option value="Travel" {{ old('destination') == 'Travel' ? 'selected' : '' }}>
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
                                       value="{{ old('number_of_people', 1) }}"
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

                        <!-- Additional Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <h4 class="text-blue-800 font-semibold text-sm mb-2">
                                <i class="fas fa-info-circle mr-2"></i>
                                Booking Information
                            </h4>
                            <ul class="text-blue-700 text-xs space-y-1">
                                <li>• All fields marked with * are required</li>
                                <li>• Booking date must be in the future</li>
                                <li>• You will receive confirmation via email</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('booking.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 w-full sm:w-auto justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Cancel & Go Back
                    </a>

                    <button type="submit"
                            class="inline-flex items-center px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 w-full sm:w-auto justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Create Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Form enhancements
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-focus first input
        const firstInput = document.querySelector('input[name="user_name"]');
        if (firstInput) {
            firstInput.focus();
        }

        // Update number of people display
        const peopleInput = document.querySelector('input[name="number_of_people"]');
        if (peopleInput) {
            peopleInput.addEventListener('input', function() {
                const value = parseInt(this.value) || 0;
                if (value > 20) {
                    this.value = 20;
                } else if (value < 1) {
                    this.value = 1;
                }
            });
        }

        // Booking type selection enhancement
        const typeSelect = document.querySelector('select[name="destination"]');
        if (typeSelect) {
            typeSelect.addEventListener('change', function() {
                this.style.color = this.value ? '#1f2937' : '#9ca3af';
            });
        }
    });
</script>
@endsection
