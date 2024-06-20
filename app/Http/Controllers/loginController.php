<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
        return redirect('/room');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $task)
    {
        // return view('room.register');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $task)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');

    }

    public function registerPost(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:12',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
            'address' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->save();

        return redirect('/login');
    }
    

    
}
