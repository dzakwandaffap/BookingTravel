@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-6 font-poppins">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-4">
        <div>
            <div class="flex items-center mb-2">
                @if(auth()->user()->role === 'admin')
                    <span class="inline-flex items-center px-3 py-2 rounded-xl bg-primary/10 text-primary text-sm font-medium mr-3">
                        <i class="fas fa-list-alt mr-2"></i>
                        Admin Panel
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-2 rounded-xl bg-green-100 text-green-700 text-sm font-medium mr-3">
                        <i class="fas fa-calendar-check mr-2"></i>
                        My Dashboard
                    </span>
                @endif
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                @if(auth()->user()->role === 'admin')
                    All Bookings
                @else
                    My Bookings
                @endif
            </h1>
            <p class="text-gray-600">
                @if(auth()->user()->role === 'admin')
                    Monitor and manage customer travel bookings
                @else
                    Track your upcoming adventures
                @endif
            </p>
        </div>
        <div>
            <a href="{{ route('booking.create') }}" class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-plus-circle mr-2"></i>
                New Booking
            </a>
        </div>
    </div>

    <!-- Quick Stats (Admin Only) -->
    @if(auth()->user()->role === 'admin')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Bookings -->
        <div class="bg-gray-800 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm mb-1">Total Bookings</p>
                    <p class="text-3xl font-bold">{{ $bookings->total() }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-calendar-alt text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Travelers -->
        <div class="bg-gray-800 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-cyan-100 text-sm mb-1">Total Travelers</p>
                    <p class="text-3xl font-bold">{{ $bookings->sum('number_of_people') }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-users text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Destinations -->
        <div class="bg-gray-800 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm mb-1">Destinations</p>
                    <p class="text-3xl font-bold">{{ $bookings->groupBy('destination')->count() }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-map-marked-alt text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Upcoming -->
        <div class="bg-gray-800 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm mb-1">Upcoming</p>
                    <p class="text-3xl font-bold">{{ $bookings->where('booking_date', '>=', now())->count() }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Search & Filter Card -->
   <div class="bg-white rounded-2xl shadow-lg border border-gray-100 mb-8">
    <div class="px-6 py-4 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-search text-primary mr-2"></i>
            Search & Filter
        </h3>
    </div>
    <div class="p-6">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text"
                           id="searchInput"
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition duration-200"
                           placeholder="Search destinations, customer names..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('booking.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                    <i class="fas fa-refresh mr-2"></i>
                    Reset
                </a>
            </div>
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

    <!-- Bookings Content -->
    @if($bookings->count() > 0)

    <!-- Desktop Table View -->
    <div class="hidden md:block bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-16">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Bookings Overview</h3>
                <span class="px-4 py-2 bg-primary/10 text-primary text-sm font-medium rounded-full">
                    {{ $bookings->total() }} total
                </span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        @if(auth()->user()->role === 'admin')
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Customer</th>
                        @endif
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Booking Date</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Destination</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Travelers</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Created</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        @if(auth()->user()->role === 'admin')
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center font-semibold mr-3">
                                    {{ strtoupper(substr($booking->user_name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $booking->user_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $booking->user_email }}</div>
                                </div>
                            </div>
                        </td>
                        @endif
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->booking_date)->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $booking->destination }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-user-friends mr-1"></i>
                                {{ $booking->number_of_people }} {{ Str::plural('person', $booking->number_of_people) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">{{ $booking->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('booking.edit', $booking->id) }}"
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-700 bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200"
                                   title="Edit Booking">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if(auth()->user()->role === 'admin')
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200"
                                            onclick="return confirm('Are you sure you want to delete this booking?')"
                                            title="Delete Booking">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden space-y-4">
        @foreach ($bookings as $booking)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
            @if(auth()->user()->role === 'admin')
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-semibold mr-3">
                    {{ strtoupper(substr($booking->user_name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold text-gray-900">{{ $booking->user_name }}</div>
                    <div class="text-sm text-gray-500">{{ $booking->user_email }}</div>
                </div>
            </div>
            @endif

            <div class="mb-4">
                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800 mb-3">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    {{ $booking->destination }}
                </span>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="text-center">
                    <div class="text-xs text-gray-500 mb-1">Date</div>
                    <div class="font-semibold">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-xs text-gray-500 mb-1">Travelers</div>
                    <div class="font-semibold">{{ $booking->number_of_people }}</div>
                </div>
                <div class="text-center">
                    <div class="text-xs text-gray-500 mb-1">Created</div>
                    <div class="font-semibold">{{ $booking->created_at->format('M d') }}</div>
                </div>
            </div>

            <div class="flex space-x-3">
                <a href="{{ route('booking.edit', $booking->id) }}"
                   class="flex-1 px-4 py-2 text-center text-sm font-medium text-yellow-700 bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                @if(auth()->user()->role === 'admin')
                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full px-4 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200"
                            onclick="return confirm('Delete this booking?')">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($bookings->hasPages())
    <div class="flex justify-center mt-8">
        <div class="flex items-center space-x-2">
            {{ $bookings->withQueryString()->links('pagination::tailwind') }}
        </div>
    </div>
    @endif

    @else
    <!-- Empty State -->
    <div class="text-center py-16">
        <div class="mb-6">
            <i class="fas fa-calendar-times text-6xl text-gray-300"></i>
        </div>
        <h3 class="text-2xl font-semibold text-gray-700 mb-3">No bookings found</h3>
        <p class="text-gray-500 mb-8 max-w-md mx-auto">
            @if(request('search'))
                No bookings match your search criteria. Try adjusting your search terms.
            @else
                Start your travel journey by creating your first booking.
            @endif
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-3">
            @if(request('search'))
            <a href="{{ route('booking.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                View All Bookings
            </a>
            @endif
            <a href="{{ route('booking.create') }}" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create New Booking
            </a>
        </div>
    </div>
    @endif
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

    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    let timeout = null;

    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const query = searchInput.value.trim();
            const url = new URL(window.location.href);
            if(query){
                url.searchParams.set('search', query);
            } else {
                url.searchParams.delete('search');
            }
            window.location.href = url.toString();
        }, 500); // delay 500ms sebelum search
    });
});
</script>
@endsection
