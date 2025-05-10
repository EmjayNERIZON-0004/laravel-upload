<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function greet($name = "Employee")
    {
        return "HELLO , GREETINGS FOR YOU ".$name;
    }
    
   public function employee($grade = "Enter Your Grade"){

        $employee = array(
            array("name"=> "Mark George","address" => "San Carlos City", "age"=>22),
            array("name"=> "Niger Paul","address" => "Alaminos City","age"=>23),
            array("name"=> "Tom Smith","address" => "Dagupan City","age"=>24),
            array("name"=> "Lebron Jeyms","address" => "Bayambang","age"=>25),
            array("name"=> "Michael Jordan","address" => "Infanta","age"=>26),
            array("name"=> "Niger Paul","address" => "Sta. Maria","age"=>27),
            array("name"=> "Ace Hachiminoto","address" => "Binmaley","age"=>28),
            array("name"=> "Jeff Eminson","address" => "Lingayen","age"=>29),
            array("name"=> "Blake Cliff","address" => "San Carlos City","age"=>30),
            array("name"=> "George Washington Paul","address" => "Urdaneta City","age"=>31),
        );
        return view('ControlStructurePage')->with('emp',$employee)
        ->with('grade',$grade);

        ;
    }
}
