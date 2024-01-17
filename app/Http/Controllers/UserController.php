<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login','logout']]);


    }
    public function add(Request $request ){
        if (session('user_type') == "customer") {
            return view('pages.home');
        }else{
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'type' => 'required|string|min:8',
        ]);
    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
            'type' =>$data['type'],
            'company_id'=>$request->company_id,
        ]);
        Event::dispatch(new Registered($user));
    
        return response()->json($user, 201);
    }
    }


    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Store user information in the session
            session()->put('user', $user);
            session(['user_name' => $user->name]);
            session(['user_type' => $user->type]);
            Auth::login($user);

            // Redirect based on user type
            if ($user->type == "customer") {
                return view('pages.home');
            } else {
                return view('admin.dashbord');
            }
        } else {
            // Invalid credentials, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success','You have been logged out!');
    }


    
}
