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
        return view('checkTime' , ['waitTable' => $waitTable , 'time' => $time] );
    }   


    public function addproject()
    {
        $project= DB::table('project')->get();
            
        $users= DB::table('users')->get();
        return view('adminaddproject' , ['users' => $users , 'project' => $project] );
    }   


    public function addproject_db(Request $request)
    {
        $t1 =$request->get('users');
        $t2 = $request->get('project');

        DB::table('users')
        ->where('id', $t1)
        ->update(['project_id' => $t2]);

        $project= DB::table('project')->get();
            
        $users= DB::table('users')->get();
        return view('adminaddproject' , ['users' => $users , 'project' => $project] );
    }   
    
    public function forEdit($id)
    {
        $users = DB::table('users')
            ->where('project_id',$id)->first();
        $waitTable= DB::table('waitconfirm')
            ->where('project_id',$id)->first();
        $time= DB::table('timebooking')->get();
        $datatimeUser = DB::table('timebooking')
            ->where('booking_id',$users->booking_id)->first();
        return view('checkTime' , ['users' => $users , 'waitTable' => $waitTable , 'time' => $time,'datatimeUser'=>$datatimeUser] );
    }  

    public function confirm($id,$p_id)
    {
        DB::table('users')
            ->where('project_id', $p_id)
            ->update(['booking_id' => $id]);
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['status_confirm' => 1]);
        return view('warning/afterConfirm'); 
    }   

    

    public function cancel($p_id)
    {
        DB::table('users')
            ->where('project_id', $p_id)
            ->update(['booking_id' => null]);
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['status_confirm' => null]);
        return view('warning/afterCancel'); 
    } 

   
}
