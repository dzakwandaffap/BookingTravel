<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan halaman home/dashboard setelah login
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Tampilkan list user (butuh auth)
     */
   public function index(Request $request)
{
    $query = User::query();

    // Search filter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    $users = $query->paginate(5);

    return view('account.index', compact('users'));
}

    /**
     * Tampilkan form register
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Simpan user baru (register)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);
        if(Auth::check()) {
            return redirect()->route('account.index')->with('success', 'Successfully registered.');
        }else{
        return redirect()->route('login')->with('success', 'Registration successful. Please sign in.');
        }
    }

    /**
     * Tampilkan form edit user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('account.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'role'     => 'required|string',
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('account.index')->with('success', 'User updated successfully.');
    }

    /**
     * Hapus user
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('account.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke home
        if (Auth::check()) {
            return redirect()->route('pages.home');
        }
        return view('pages.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            // Redirect ke pages.home setelah login berhasil
            return redirect()->intended(route('pages.home'))->with('success', 'Login successful.');
        }

        return back()->with('failed', 'Login failed');
    }

    /**
     * Logout (POST /logout)
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Tampilkan halaman profile user yang sedang login
     */
    public function profile()
    {
        $user = Auth::user();
        return view('account.profile', compact('user'));
    }

    /**
     * Update profile user yang sedang login
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Jika user ingin mengubah password
        if ($request->filled('current_password') || $request->filled('password')) {
            // Validasi password lama
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
        }

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('account.profile')->with('success', 'Profile updated successfully.');
    }
}
