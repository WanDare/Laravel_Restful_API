<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // {URL}/user
    public function index(Request $request)
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }
    public function create(Request $request)
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'email' => 'required|max:20|unique:users,email' // Fixed typo here
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('user.index');
    }
    public function show($id)
    {
        return view('users.show');
    }
    public function edit($id)
    {   
        $user = User::where('id',$id)->first();
        return view('users.edit', compact('user'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|max:20|unique:users,email,' . $id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('user.index');
    }
}
