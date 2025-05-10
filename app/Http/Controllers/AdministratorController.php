<?php

namespace App\Http\Controllers;

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
 
}
