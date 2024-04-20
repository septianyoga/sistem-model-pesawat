<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.user.index', [
            'title' => 'Kelola User',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        User::create($data);
        Alert::success('Berhasil', 'User Berhasil Ditambahkan!');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        //
        $data = [
            'id' => $id,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        if ($request->password == null) {
            unset($data['password']);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        Alert::success('Berhasil', 'User Berhasil Diedit!');
        return redirect()->to('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if ($id == Auth::user()->id) {
            Alert::warning('Peringatan', 'Anda tidak bisa nonaktifkan akun sendiri!');
            return redirect()->to('/users');
        }

        $user = User::findOrFail($id);
        $user->update(['active' => !$user->active]);
        Alert::success('Berhasil', 'User Berhasil Dinonaktifkan!');
        return redirect('users');
    }
}
