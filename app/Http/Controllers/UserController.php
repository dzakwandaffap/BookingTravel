<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('account.index', compact('users'));
    }

    public function create()
    {
        return view('account.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('manage-account.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable|min:8', // Optional password without confirmation
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
    
        // Update password only if it is filled
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('manage-account.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('manage-account.index')->with('success', 'User deleted successfully.');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the intended page
            return redirect()->intended('home')->with('success', 'Login successful');
        }
    
        // Authentication failed
        return redirect()->back()->with('failed', 'Invalid credentials');
    }

            public function logout()
                    {
                        //menghapus session Auth
                        Auth::logout();
                        //mengarahkan halaman setelah menghapus session
                        return redirect('/');
                    }
}

    
  
