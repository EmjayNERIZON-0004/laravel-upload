<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{

    public function admin()
{
    $users = UserAccount::all();
    return view('admin_dashboard', compact('users'));
}
    public function create_new_user_form(){
        return redirect('new_user');
    }
    public function login_form(){
        return redirect('login');
        
    }
    public function logout(){
        Session::forget('user_id');
        return redirect()->route('login-form') ;

    }
    public function dashboard()
    {
        $user = UserAccount::where('username', Session::get('user_id'))->first();

        if (!$user) {
            return redirect()->route('login-form')->withErrors(['Please login again.']);
        }

        return view('user_dashboard', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_accounts,username',
        ]);

        $defaultPassword = (string) random_int(10000000, 99999999);

        UserAccount::create([
            'username' => $request->username,
            'password' => Hash::make($defaultPassword),
            'default_password' => $defaultPassword,
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);


    
    // First, try to find the user by username
    $user = UserAccount::where('username', $request->username)->first();

    // If user is not found, return an error message
    if (!$user) {
        return back()->withErrors(['username' => 'Username not found'])->withInput(); ;
    }

    // If password does not match the hashed password, return a different error
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Incorrect password'])->withInput(); ;
    }

    // If credentials are valid, simulate login and check if password needs to be updated
    Session::put('user_id', $user->username); // Simulate login

    if ($request->password === $user->default_password) {
        // Same as default → force update password
        
        
        return redirect()->route('password.update.form');



    } else {
         if($request->username === "admin123"){
    Session::put('user_id', $user->username); // Simulate login
            
            return redirect()->route('admin.dashboard');

         }
        return redirect()->route('user-dashboard');
    }
}

    
    public function showUpdateForm()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login-form');
        }
    
        return view('updatePassword');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);
    
        $user = UserAccount::where('username', Session::get('user_id'))->first();
        if (!$user) return redirect()->route('login-form');
  
        $user->password = Hash::make($request->new_password);
        $user->save();
     
        if($user->username === "admin123"){
            return redirect()->route('admin.dashboard');
         }
        return redirect()->route('user-dashboard')->with('success', 'Password updated! Please log in again.');
    }
    
}
