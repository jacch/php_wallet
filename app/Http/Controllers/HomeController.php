<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\walletbook;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function loadjson()
     {
         $all=walletbook::all();
         return json_encode($all);
     }


    public function index()
    {
        
        return view('home');

    }
}
