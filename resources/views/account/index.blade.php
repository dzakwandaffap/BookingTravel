@extends('layout.nav')

@section('content')
<div class="container mx-auto px-4 py-6 font-poppins">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Manage Users</h1>
            <p class="text-gray-600">View, edit, or delete users in the system</p>
        </div>
        <div>
            <a href="{{ route('account.create') }}" class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-plus-circle mr-2"></i>
                Add User
            </a>
        </div>
    </div>

    {{-- total user --}}
    <div class="bg-gray-800 rounded-2xl p-6 text-white shadow-lg mb-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 ">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm mb-1">Total Users</p>
                    <p class="text-3xl font-bold">{{ $users->total() }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-user-alt text-2xl"></i>
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

    <!-- Search & Filter -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 mb-8">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-search text-primary mr-2"></i>
                Search Users
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
                           placeholder="Search customer names..."
                           value="{{ request('search') }}">
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('account.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                        <i class="fas fa-refresh mr-2"></i>
                        Reset
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    @if($users->count() > 0)
    <div class="hidden md:block bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Role</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                {{ $user->role === 'admin' ? 'bg-primary/10 text-primary' : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('account.edit', $user->id) }}"
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-700 bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('account.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200"
                                            onclick="return confirm('Delete this user?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
        @foreach ($users as $user)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-semibold mr-3">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold text-gray-900">{{ $user->name }}</div>
                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                </div>
            </div>
            <div class="mb-4">
                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium
                    {{ $user->role === 'admin' ? 'bg-primary/10 text-primary' : 'bg-green-100 text-green-700' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('account.edit', $user->id) }}"
                   class="flex-1 px-4 py-2 text-center text-sm font-medium text-yellow-700 bg-yellow-100 hover:bg-yellow-200 rounded-lg transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form action="{{ route('account.destroy', $user->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full px-4 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200"
                            onclick="return confirm('Delete this user?')">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
    <div class="flex justify-center mt-8">
        {{ $users->withQueryString()->links('pagination::tailwind') }}
    </div>
    @endif

    @else
    <!-- Empty State -->
    <div class="text-center py-16">
        <div class="mb-6">
            <i class="fas fa-user-slash text-6xl text-gray-300"></i>
        </div>
        <h3 class="text-2xl font-semibold text-gray-700 mb-3">No users found</h3>
        <p class="text-gray-500 mb-8 max-w-md mx-auto">
            @if(request('search'))
                No users match your search criteria. Try adjusting your search terms.
            @else
                Start by adding new users to the system.
            @endif
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-3">
            @if(request('search'))
            <a href="{{ route('account.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                View All Users
            </a>
            @endif
            <a href="{{ route('account.create') }}" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add New User
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

    // Auto-search on typing
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
            }, 500);
        });
    });
</script>
@endsection
