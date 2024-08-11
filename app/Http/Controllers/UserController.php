<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all(); // Mengambil semua data pengguna
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:user,admin,super_admin'
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        User::create($validatedData);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil di buat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::with('topics')->findOrFail($id);
        return view('admin.user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = user::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin,super_admin',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data user
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Redirect kembali ke halaman index atau show dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil di update.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);

        // Hapus pengguna dari database
        $user->delete();

        // Redirect kembali ke daftar pengguna dengan pesan sukses
        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
