<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $admins = User::orderBy('name', 'ASC')->get();
    return view('pages.admin.index', compact('admins'));    
}

public function create()
{
    return view('pages.admin.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

    User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password'=> bcrypt($request->password),
    ]);

    return redirect()->route('admin.index');
}

public function show(string $id)
{
    $admin = User::find($id);
    return view('pages.admin.show', compact('admin'));
}

public function edit(string $id)
{
    $admin = User::find($id);
    return view('pages.admin.edit', compact('admin'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    $admin = User::find($id);
    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->filled('password')) {
        $admin->password = bcrypt($request->password);
    }
    
    $admin->save();

    return redirect()->route('ubah-profil')
       ->with('success', 'Profil berhasil diubah');
    }

    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admin.index');
    }
}