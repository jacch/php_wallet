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

     public function checked()
     {
         $all=walletbook::all();
         return json_encode($all);
     }

     public function update()
     {


     $t=walletbook::all()->last();
     //echo $t["created_at"];
     $last_update=strtotime($t["created_at"]);
     if((time()-20)>$last_update){

      $wallet = new walletbook();
      $wallet->id=null;
      $wallet->comment=$REQUEST["text"];
      $wallet->price=preg_replace("/[^0-9]/", '', $REQUEST["text"]);
      $wallet->paytype="食";
      $wallet->paydate=date("Y-m-d");
      $wallet->updated_at=date("Y-m-d H:i:s");
      $wallet->created_at=date("Y-m-d H:i:s");
      $wallet->save();
      //var_dump($wallet );

        $reply="ok!";
     }else{
        $reply="send to fast!";
     }
   }

    public function index()
    {

        return view('home');

    }
}
