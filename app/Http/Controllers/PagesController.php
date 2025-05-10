<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PagesController extends Controller
{
    
    function dashboard(){
        return view('dashboard');
    }
      
    function service(){
        return view('services');
    }
    function contact(){
        return view('contact');
    }
    function profile(){
        return view('profile');
    } 
    function controlStructure($grade=''){

        
        return view('ControlStructurePage');
    }

function maintenance_down(){
    return view ('maintenance_mw');
}


public function showLogs()
{
    // Get today's date in the format Y-m-d
    $todayDate = Carbon::today()->toDateString();  // Example: 2025-04-10

    // Get the contents of the Laravel log file
    $logFile = storage_path('logs/laravel.log');

    // Check if the file exists
    if (File::exists($logFile)) {
        // Get all lines from the log file and filter for today's date and 'production.INFO'
        $logs = File::lines($logFile)->filter(function ($log) use ($todayDate) {
            // Only keep logs that contain today's date and 'production.INFO'
            return strpos($log, $todayDate) !== false && strpos($log, 'production.INFO') !== false;
        });
    } else {
        $logs = [];
    }

    // Pass the filtered logs to the view
    return view('ShowLogs', compact('logs'));
}












    function test(){

        $employee = [
            "name" => "Napoleon",
            "age" => 30,
            "department" => "IT Department"
        ];
        $grade = 100;

        $client = array(
            array("name"=> "Mark George","address" => "San Carlos City"),
            array("name"=> "Niger Paul","address" => "San Carlos City")
        );
        return view('ControlStructure')->with('grade',$grade)->with('employee',$employee)->with('client',$client);
    }


}
