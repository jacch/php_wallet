<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\walletbook;
use App\User;

class walletpost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $REQUEST)
    {
        //

        $all=walletbook::all();
        //var_dump($all);
        foreach($all as $v)
          echo  preg_replace("/[^0-9]/", '', $v["comment"]);

        return "";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $REQUEST)
    {
        //
        //$posts = DB::table('walletbooks')->get();
        //var_dump($posts);
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


        return $reply;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}