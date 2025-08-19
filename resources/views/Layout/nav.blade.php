<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyTrip</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': '#005eb8',
                        'primary-dark': '#004a96',
                        'primary-light': '#1a6ec8',
                    }
                }
            }
        }
    </script>


</head>
<body class="font-poppins bg-gray-50 min-h-screen">
    <!-- Modern Navbar -->
    <nav class="bg-gradient-to-r from-primary via-primary-light to-primary-dark shadow-xl sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ auth()->check() ? route('pages.home') : route('login') }}" class="flex items-center space-x-2 text-white">
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg backdrop-blur-sm">
                            <i class="fas fa-plane text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold ">EasyTrip.com</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-1">
                        @auth
                            <!-- Menu untuk user yang sudah login -->
                            <a href="{{ route('pages.home') }}" class="group relative px-4 py-2 text-white hover:text-blue-100 rounded-lg transition-all duration-300 hover:bg-white hover:bg-opacity-10">
                                <i class="fas fa-home mr-2"></i>
                                <span class="font-medium">Home</span>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></div>
                            </a>

                            @if(Auth::user()->role === 'admin')
                            <a href="{{ route('account.index') }}" class="group relative px-4 py-2 text-white hover:text-blue-100 rounded-lg transition-all duration-300 hover:bg-white hover:bg-opacity-10">
                                <i class="fas fa-users-cog mr-2"></i>
                                <span class="font-medium">Account Management</span>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></div>
                            </a>
                            @endif

                                <a href="{{ route('account.profile') }}" class="group relative px-4 py-2 text-white hover:text-blue-100 rounded-lg transition-all duration-300 hover:bg-white hover:bg-opacity-10">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-medium">Profile</span>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></div>
                            </a>

                            <a href="{{ route('booking.index') }}" class="group relative px-4 py-2 text-white hover:text-blue-100 rounded-lg transition-all duration-300 hover:bg-white hover:bg-opacity-10">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span class="font-medium">Booking</span>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></div>
                            </a>

                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="group relative px-4 py-2 text-white hover:text-red-200 rounded-lg transition-all duration-300 hover:text-red-400 hover:bg-opacity-20 ml-2">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    <span class="font-medium">Logout</span>
                                </button>
                            </form>
                        @else
                            <!-- Menu untuk guest (belum login) -->
                            <a href="{{ route('login') }}" class="group relative px-6 py-2 text-white hover:text-blue-100 rounded-lg transition-all duration-300 hover:bg-white hover:bg-opacity-10">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <span class="font-medium">Login</span>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></div>
                            </a>
                            <a href="{{ route('pages.register') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-medium px-6 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 backdrop-blur-sm">
                                <i class="fas fa-user-plus mr-2"></i>
                                <span>Register</span>
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="text-white hover:text-blue-100 focus:outline-none focus:text-blue-100 transition-colors duration-300 p-2 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-primary-dark bg-opacity-95 backdrop-blur-sm">
            <div class="px-2 pt-2 pb-3 space-y-1 border-t border-white border-opacity-20">
                @auth
                    <!-- Mobile menu untuk user yang sudah login -->
                    <a href="{{ route('pages.home') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-home mr-3 w-5"></i>
                        <span class="font-medium">Home</span>
                    </a>

                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('account.index') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-users-cog mr-3 w-5"></i>
                        <span class="font-medium">Account Management</span>
                    </a>
                    @endif

                        <a href="{{ route('account.profile') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-circle mr-3 w-5"></i>
                        <span class="font-medium">Profile</span>
                    </a>

                    <a href="{{ route('booking.index') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-calendar-alt mr-3 w-5"></i>
                        <span class="font-medium">Booking</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-3 py-3 text-white hover:text-red-200 hover:bg-red-500 hover:bg-opacity-20 rounded-lg transition-all duration-300 text-left">
                            <i class="fas fa-sign-out-alt mr-3 w-5"></i>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                @else
                    <!-- Mobile menu untuk guest (belum login) -->
                    <a href="{{ route('login') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-3 w-5"></i>
                        <span class="font-medium">Login</span>
                    </a>
                    <a href="{{ route('pages.register') }}" class="flex items-center px-3 py-3 text-white hover:text-blue-100 hover:bg-white hover:bg-opacity-10 rounded-lg transition-all duration-300">
                        <i class="fas fa-user-plus mr-3 w-5"></i>
                        <span class="font-medium">Register</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>



    @if (session('failed'))
        <div class="alert bg-red-500 text-white text-center px-6 py-4 shadow-lg">
            <div class="flex items-center justify-center space-x-2">
                <i class="fas fa-exclamation-circle"></i>
                <span class="font-medium">{{ session('failed') }}</span>
            </div>
        </div>
    @endif

    <!-- Content Area -->
    <main>
        @yield('content')
    </main>

    <script>
        // Toggle mobile menu
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileButton = event.target.closest('[onclick="toggleMobileMenu()"]');

            if (!mobileMenu.contains(event.target) && !mobileButton) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
