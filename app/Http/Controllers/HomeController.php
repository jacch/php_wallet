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

     public function loadjsonfalse()
     {
         $all=walletbook::where("pay_checked","!=","true")->get();
         return json_encode($all);
     }

     public function checked(Request $REQUEST)
     {

       $wallet = walletbook::find($REQUEST["id"]);
       switch($REQUEST["item"]){
       case "pay_checked":
         $wallet->pay_checked = $REQUEST["value"];
         $wallet->save();
         break;
       }
     }




     public function update(Request $REQUEST)
     {


     //$t=walletbook::all();
     //echo $t["created_at"];
     //$last_update=strtotime($t["created_at"]);
     //echo  $REQUEST["id"];
     $wallet = walletbook::find($REQUEST["id"]);

     if($wallet["pay_checked"]!="false"){
       //return view('home');
       exit;
     }
     switch($REQUEST["item"]){
       case "price":
        if($REQUEST["value"]>0){
          $wallet->price = $REQUEST["value"];
          $wallet->save();
        }
      break;
      case "comment":
         $wallet->comment = $REQUEST["value"];
         $wallet->save();
      break;
      case "paytype":
        $wallet->paytype = $REQUEST["value"];
        $wallet->save();
      break;
      case "paydate":
       $wallet->paydate = $REQUEST["value"];
       $wallet->save();
      break;

     }




   }
   public function edit()
   {
       return view('edit');

   }
    public function index()
    {
        return view('home');

    }
}
