<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccount;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
   
    public function dashboard()
    {
       return "this is dashboard section";

    }
    public function profile()
    {
       return "this is profile section";
       
    }
    public function contact()
    {
       return "this is contact section";
       
    }

public function toggleStatus($id)
{
    $user = UserAccount::findOrFail($id);
    $user->status = $user->status === 'active' ? 'inactive' : 'active';
    $user->save();

    return redirect()->back()->with('status', 'User status updated.');
}

 
}
