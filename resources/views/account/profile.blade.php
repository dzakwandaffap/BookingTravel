@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-6 font-poppins">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">My Profile</h1>
            <p class="text-gray-600">Manage your personal information and account settings</p>
        </div>
        <div class="flex items-center space-x-2">
            <div class="w-16 h-16 bg-gray-800 to-white-dark text-white rounded-full flex items-center justify-center text-2xl font-bold shadow-lg">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>

    <!-- User Info Card -->
    <div class="bg-gray-800  rounded-2xl p-8 text-white shadow-xl mb-8 transform hover:scale-[1.02] transition-all duration-300">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
            <div class="flex items-center space-x-6 mb-4 md:mb-0">
                <div class="w-20 h-20 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center text-3xl font-bold">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-2">{{ $user->name }}</h2>
                    <p class="text-blue-100 mb-1">
                        <i class="fas fa-envelope mr-2"></i>
                        {{ $user->email }}
                    </p>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white bg-opacity-20 backdrop-blur-sm">
                        <i class="fas fa-user-tag mr-2"></i>
                        {{ ucfirst($user->role) }}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <p class="text-blue-100 text-sm mb-1">Member since</p>
                <p class="text-lg font-semibold">{{ $user->created_at->format('M Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
    <div id="success-alert" class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-6 shadow-sm">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-check-circle text-xl text-green-500"></i>
            </div>
            <div class="ml-3 flex-1">
                <p class="font-medium">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 text-green-400 hover:text-green-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- Edit Profile Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-edit text-primary mr-2"></i>
                Edit Profile
            </h3>
        </div>
        <div class="p-6">
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-primary"></i>
                        Full Name
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200 @error('name') border-red-500 @enderror"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-primary"></i>
                        Email Address
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200 @error('email') border-red-500 @enderror"
                           required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Section -->
                <div class="border-t border-gray-200 pt-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-lock mr-2 text-primary"></i>
                        Change Password (Optional)
                    </h4>

                    <!-- Current Password -->
                    <div class="mb-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Current Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   id="current_password"
                                   name="current_password"
                                   class="block w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200 @error('current_password') border-red-500 @enderror">
                            <button type="button"
                                    onclick="togglePassword('current_password')"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-eye" id="current_password_icon"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            New Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="block w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200 @error('password') border-red-500 @enderror">
                            <button type="button"
                                    onclick="togglePassword('password')"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-eye" id="password_icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   class="block w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200">
                            <button type="button"
                                    onclick="togglePassword('password_confirmation')"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-eye" id="password_confirmation_icon"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <button type="submit"
                            class="flex-1 bg-primary hover:bg-primary-dark text-white font-medium px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Profile
                    </button>
                    <a href="{{ route('pages.home') }}"
                       class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-8 py-3 rounded-xl transition-colors duration-200 flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Account Info -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 mt-8">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-info-circle text-primary mr-2"></i>
                Account Information
            </h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Account Created</p>
                        <p class="font-semibold text-gray-800">{{ $user->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Last Updated</p>
                        <p class="font-semibold text-gray-800">{{ $user->updated_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-hide success alert after 5 seconds
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => alert.style.display = 'none', 300);
        }
    }, 5000);

    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '_icon');

        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
