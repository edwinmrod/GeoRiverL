<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	//$role=1;
	  //     if($role=1){
 return view('home');
                
      //      }
		//	else{
        //return view('homeD');
    
	//}
	}
	
	    public function indexD()
    {
	
 return view('homeD');
    
	}
	
	    public function indexE()
    {
	
 return view('homeE');
    
	}
}
