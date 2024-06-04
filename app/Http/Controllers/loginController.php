<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();
 
        return view('auth.login', ['users' => $users]);
    }

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

    public function create()
    {
        return view('room.register');

    }
    public function register(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:12|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
        ]);

      
       
        // $users = new User;
        // $users->name = $request->title;
        // $users->nim = $request->numeric;
        // $users->email = $request->string;
        // $users->password = Hash::make($request->password);
        // $users->address = $request->string;
        // $users->save();

        $user = User::create([
            'name'=> $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        Log::info('User registered successfully: ' . $user->id);
        
        return redirect('/room');
        
    }

    
}
