<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    // public function destroy($id)
    // {

    //     $user = User::findOrFail($id);
    //     // $user = User::find($id);
    //     // if ($user->posts()->exists()) {
    //     //     return redirect()->route('users.index')->with('Error','Existen posts asociados al usuario');
    //     // }
    //     $user->posts()->delete();
    //     $user->comments()->delete();
    //     $user->delete();
    //     return redirect()->route('users.index')->with('success', 'Usuario eliminado');

    // }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->posts()->each(function ($post) {
            $post->comments()->delete();
        });

        $user->posts()->delete();
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');

    }
}