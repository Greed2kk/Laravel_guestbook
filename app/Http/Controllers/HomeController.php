<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\message;
class HomeController extends GuestController
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

    public function index()
    {
        $a=GuestController::data();
        
        return view('home', $a);
        
    }
    
}
