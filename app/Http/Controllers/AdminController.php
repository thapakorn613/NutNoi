<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $waitTable = DB::table('waitconfirm')->get();

        return view('admin', ['waitTable' => $waitTable]);
    }
    public function toCheck($id)
    {
        $waitTable= DB::table('waitconfirm')
        ->where('project_id',$id)->first();

        $time= DB::table('timebooking')->get();
        

       return view('checkTime' , ['waitTable' => $waitTable] , ['time' => $time] );
    }   

    public function ok($id,$p_id)
    {
        
      
        DB::table('users')
            ->where('project_id', $p_id)
            ->update(['booking_id' => $id]);
          return view('warning'); 
    }   
   
}
