<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUser;

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
            $users = DB::table('users')
            ->where('project_id',$p_id)->first();
        $waitTable= DB::table('waitconfirm')
            ->where('project_id',$p_id)->first();
        $time= DB::table('timebooking')->get();
        $datatimeUser = DB::table('timebooking')
            ->where('booking_id',$users->booking_id)->first();
        return view('checkTime' , ['users' => $users , 'waitTable' => $waitTable , 'time' => $time,'datatimeUser'=>$datatimeUser] );

    }   

    public function cancel($p_id)
    {
        DB::table('users')
            ->where('project_id', $p_id)
            ->update(['booking_id' => null]);
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['status_confirm' => null]);
            $users = DB::table('users')
            ->where('project_id',$p_id)->first();
        $waitTable= DB::table('waitconfirm')
            ->where('project_id',$p_id)->first();
        $time= DB::table('timebooking')->get();
        $datatimeUser = DB::table('timebooking')
            ->where('booking_id',$users->booking_id)->first();
        return view('checkTime' , ['users' => $users , 'waitTable' => $waitTable , 'time' => $time,'datatimeUser'=>$datatimeUser] );
    } 

    public function toSendEmail($p_id)
    {
        $users = DB::table('users')
            ->where('project_id',$p_id)->first();
        $tProject = DB::table('project')
            ->where('id',$p_id)->first();
        $teacher1 = DB::table('teacher')
            ->where('id',$tProject->teacher_id1)->first();
        $teacher2 = DB::table('teacher')
            ->where('id',$tProject->teacher_id2)->first();
        $teacher3 = DB::table('teacher')
            ->where('id',$tProject->teacher_id3)->first();
        $users = DB::table('users')
            ->where('project_id', $p_id)->first();
        $waitTable= DB::table('waitconfirm')
            ->where('project_id',$p_id)->first();
        return view('sendEmail',['users'=> $users
            ,'project' => $tProject
            ,'teacher1' => $teacher1
            ,'waitTable'=>$waitTable
            ,'teacher1'=>$teacher1
            ,'teacher2'=>$teacher2
            ,'teacher3'=>$teacher3]); 
    } 
    public function sendEmail($p_id)
    {
        DB::table('project')
            ->where('id',$p_id)
            ->update(['send_email' => 1]);


        /*$user_name = 'John Anderson';
        $to = 'nutnoicpe@gmail.com';
        Mail::to($to)->send(new WelcomeUser($user_name));
        //return 'Mail sent successfully';*/


        return view('warning/afterSendEmail'); 
    } 

    public function send_email()
    {
    $user_name = 'Artronin';
    $to = 'nutnoicpe@gmail.com';
    Mail::to($to)->send(new WelcomeUser($user_name));
    return 'Mail sent successfully';
    }

   
}
