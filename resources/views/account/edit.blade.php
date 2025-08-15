@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-8 font-poppins">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 text-primary rounded-2xl mb-4">
                <i class="fas fa-edit text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit User</h1>
            <p class="text-gray-600">Update the user account details below</p>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('account.index') }}" class="hover:text-primary transition-colors">
                <i class="fas fa-home mr-1"></i>Users
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-700">Edit #{{ $user->id }}</span>
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

        <!-- Main Form Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                <h2 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-user-edit mr-3"></i>
                    Update User Account
                </h2>
                <p class="text-blue-100 mt-1">Modify the user details as needed</p>
            </div>

            <form action="{{ route('account.update', $user->id) }}" method="POST" class="p-8">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-primary mr-2"></i>
                                Name *
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('name') border-red-300 @enderror"
                                   value="{{ old('name', $user->name) }}"
                                   placeholder="Enter full name"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-primary mr-2"></i>
                                Email *
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white @error('email') border-red-300 @enderror"
                                   value="{{ old('email', $user->email) }}"
                                   placeholder="Enter email address"
                                   required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Role -->
                        <div class="form-group">
                            <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user-tag text-primary mr-2"></i>
                                Role *
                            </label>
                            <select name="role" id="role"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 @error('role') border-red-300 @enderror"
                                    required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="pengguna" {{ old('role', $user->role) == 'pengguna' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock text-primary mr-2"></i>
                                Password
                            </label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white"
                                   placeholder="Leave blank to keep current password">
                        </div>

                        <!-- Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <h4 class="text-blue-800 font-semibold text-sm mb-2">
                                <i class="fas fa-info-circle mr-2"></i>
                                Update Information
                            </h4>
                            <ul class="text-blue-700 text-xs space-y-1">
                                <li>• Password will only change if a new one is entered</li>
                                <li>• Changes will be applied immediately after updating</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('account.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 w-full sm:w-auto justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>

                    <div class="flex space-x-3 w-full sm:w-auto">
                        <button type="reset"
                                class="inline-flex items-center px-6 py-3 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-xl transition-all duration-200 flex-1 sm:flex-initial justify-center">
                            <i class="fas fa-undo mr-2"></i>
                            Reset
                        </button>

                        <button type="submit"
                                class="inline-flex items-center px-8 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 flex-1 sm:flex-initial justify-center">
                            <i class="fas fa-save mr-2"></i>
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
