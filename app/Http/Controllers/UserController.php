<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $users = User::all()->toArray();

        return view('admin.manager' , compact('users'));

    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    /*
    public function show($id)
    {
        //
        
      $users = User::all()->toArray();
       return view('admin.manager' , compact('users'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function firstAddBooking()
    {
        $users = Auth::user();
        DB::table('users')
            ->where('project_id', $users->project_id)
            ->update(['haveWaitTable' => 1]);
        $projectWait = DB::table('waitconfirm')
            ->where('project_id',$users->project_id)->first();

        if($projectWait==null)
        {
            DB::table('waitconfirm')->insert(
                ['project_id' => $users->project_id]
            );
        }
        $timebookingTable = DB::table('timebooking')->get();
        $users = Auth::user();
        $waitTable = DB::table('waitconfirm')
            ->where('project_id',$users->project_id)->first();
        $project = DB::table('project')
            ->where('id',$users->project_id)->first();
        $timeUser = DB::table('timebooking')
            ->where('project_id',$users->project_id)->first();
        return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
   
    }

    public function showTable()
    {
        
        $timebookingTable = DB::table('timebooking')->get();
        $users = Auth::user();
        $waitTable = DB::table('waitconfirm')
            ->where('project_id',$users->project_id)->first();
        $project = DB::table('project')
            ->where('id',$users->project_id)->first();
        $timeUser = DB::table('timebooking')
            ->where('project_id',$users->project_id)->first();
        return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_to_database(Request $request, $id)

    {
        //
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->birthday = $request->get('birthday');
        $user->blood_group = $request->get('blood_group');
        $user->age = $request->get('age');
        $user->gender = $request->get('gender');
        $user->patient_type_id = $request->get('patient_type_id');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->operation_id = $request->get('operation_id');
     
        $user->save();
        $users = User::all()->toArray();

        return view('admin.manager' , compact('users'));

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
       // return view('create');
       $user = User::find($id);
       $user->delete();
      $users = User::all()->toArray();

       return view('admin.manager' , compact('users'));

      //dd($id);

    }
    public function profile()
    {
        $user = Auth::user();
        $_booking_id = Auth::user()->booking_id;
        $booking = DB::table('timebooking')
            ->where('booking_id',$_booking_id)->get();
        $timebookingTable = DB::table('timebooking')->get();
        $waitTable = DB::table('waitconfirm')
            ->where('project_id',$user->project_id)->first();
        $project = DB::table('project')
            ->where('id',$user->project_id)->first();
        return view('profile',['project'=>$project,'timebookingTable' => $timebookingTable,'booking'=>$booking,'user'=>$user,'waitTable' => $waitTable]);
    }

    public function showproject()
    {
        $project = DB::table('project')->get();
        $user = DB::table('users')->get();
        $teacher = DB::table('teacher')->get();
        return view('showallproject', ['project' => $project,'teacher'=>$teacher,'user'=>$user]);
    }


    public function addproject()
    {
        $users = Auth::user();
        if($users->project_id !=null)
        {
            $users = Auth::user();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            return view('warning/afterAddBooking',['project'=>$project,'users'=>$users] );
        }
        $teacher = DB::table('teacher')->get();
        return view('addproject',['teacher' => $teacher] );
    }

    public function addproject_db(Request $request)
    {
        $t1 =$request->get('teacher1');
        $t2 = $request->get('teacher2');
        $t3 = $request->get('teacher3');
        $name = $request->get('name');
        
        echo $t2;

        if($t1==$t2 || $t1==$t3 || $t2==$t3)
        {
            $teacher = DB::table('teacher')->get();
       
            return view('addproject',['teacher' => $teacher] );
        }
        $user = Auth::user();
        $check = Auth::user()->project_id;
        if($check==null)
        {
            DB::table('project')->insert(
                ['project_name' => $name, 'teacher_id1' => $t1, 'teacher_id2' => $t2, 'teacher_id3' => $t3]
            );


        $p_id =     DB::table('project')
        ->where('project_name',$name)->first();


            DB::table('users')
                ->where('id', $user->id)
                ->update(['project_id' => $p_id->id]);
        }

            $user = Auth::user();
            $_booking_id = Auth::user()->booking_id;
            $booking = DB::table('timebooking')
                ->where('booking_id',$_booking_id)->get();
            return view('profile',compact('user','booking') );
        
    }



    public function setBooking($id)
    {
        $_id = Auth::user()->id;
        $users = DB::table('users')
            ->where('id',$_id)->first();

        $project = DB::table('waitconfirm')
            ->where('project_id',$users->project_id)->first();
        
        if($project==null)
        {
            DB::table('waitconfirm')->insert(
                ['project_id' => $users->project_id, 'booking_id1' => $id]
            );
        }
        else if(($project->booking_id1)==null)
        {
            DB::table('waitconfirm')
            ->where('project_id', $users->project_id)
            ->update(['booking_id1' => $id]);
        }
        else if(($project->booking_id2)==null)
        {
            DB::table('waitconfirm')
            ->where('project_id', $users->project_id)
            ->update(['booking_id2' => $id]);
        }
        else if(($project->booking_id3)==null)
        {
            DB::table('waitconfirm')
            ->where('project_id', $users->project_id)
            ->update(['booking_id3' => $id]);
        }
        else{
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
        }
        
        $timebookingTable = DB::table('timebooking')->get();
        $users = Auth::user();
        $waitTable = DB::table('waitconfirm')
            ->where('project_id',$users->project_id)->first();
        $project = DB::table('project')
            ->where('id',$users->project_id)->first();
        $timeUser = DB::table('timebooking')
            ->where('project_id',$users->project_id)->first();
        return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
   
    }

    

    public function setbooking2($booking_id,$id)
    {

        $_id = Auth::user()->id;
        $user = DB::table('users')
        ->where('id',$_id)->first();

        $project = DB::table('waitconfirm')
        ->where('project_id',$user->project_id)->first();

        if($id == 0)
        {
            DB::table('waitconfirm')
            ->where('project_id', $user->project_id)
            ->update(['booking_id1' => $booking_id]);
        }
        if($id == 1)
        {
            DB::table('waitconfirm')
            ->where('project_id', $user->project_id)
            ->update(['booking_id2' => $booking_id]);
        }
        if($id == 2)
        {
            DB::table('waitconfirm')
            ->where('project_id', $user->project_id)
            ->update(['booking_id3' => $booking_id]);
        }
        
        return view('warning/afterConfirm'); 
    }   


    public function manager()
    {
        $users = User::all()->toArray();
        return view('admin.manager' , compact('users'));

    }

    public function edittime2($id2)
    {
        $timebookingTable = DB::table('timebooking')->get();
        $id = Auth::user()->project_id;
        $users = Auth::user();
        $project = DB::table('project')
            ->where('id',$id)->first();
        return view('showTable2', ['timebookingTable' => $timebookingTable,'id' => $id,'project'=>$project,'users'=>$users,'id2'=>$id2]);

    }

    public function mywaittime()
    {
        $_id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id',$_id)->first();

        $project = DB::table('waitconfirm')
            ->where('project_id',$user->project_id)->first();
        
        if($project==null)
        {
            $timebookingTable = DB::table('timebooking')->get();
            $id = Auth::user()->project_id;
            $users = Auth::user();
            $project = DB::table('project')
                ->where('id',$id)->first();
            return view('showTable', ['timebookingTable' => $timebookingTable,'id' => $id,'project'=>$project,'users'=>$users]);
        }
        else{
            $project = DB::table('waitconfirm')
            ->where('project_id',$user->project_id)->first();
    
            $booking = DB::table('waitconfirm')
                ->where('project_id',$user->project_id)->first();
    
            $time = DB::table('timebooking')
                ->where('project_id',$user->project_id)->get();
           return view('mywaittime' , ['booking' => $booking],['time' => $time]);
        }
    }

    public function admincheck($id)
    {
        $waitTable= DB::table('waitconfirm')
        ->where('project_id',$id)->first();
       return view('checkTime' , ['waitTable' => $waitTable]);

    }

    public function update($id)
    {
        $user = User::find($id);
        return view('update' , compact('user','id'));
    }

    public function submitted($p_id)
    {
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['status_submit' => 1]);
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
      
    }
    public function deleteBookingID1()
    {
        $p_id = Auth::user()->project_id;
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['booking_id1' => null]);
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
    } 
    public function deleteBookingID2()
    {
        $p_id = Auth::user()->project_id;
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['booking_id2' => null]);
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
    } 
    public function deleteBookingID3()
    {
        $p_id = Auth::user()->project_id;
        DB::table('waitconfirm')
            ->where('project_id', $p_id)
            ->update(['booking_id3' => null]);
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
    } 

    
    public function sliding($type,$num)
    {
        $p_id = Auth::user()->project_id;
        if ($type == "8"){
           if ($num == "1"){
            $bookingid_target = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            $bookingid_target_temp = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id2' => $bookingid_target->booking_id1]);
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id1' => $bookingid_target_temp->booking_id2]);
            
                $timebookingTable = DB::table('timebooking')->get();
                $users = Auth::user();
                $waitTable = DB::table('waitconfirm')
                    ->where('project_id',$users->project_id)->first();
                $project = DB::table('project')
                    ->where('id',$users->project_id)->first();
                $timeUser = DB::table('timebooking')
                    ->where('project_id',$users->project_id)->first();
                return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
           
           }
           else if ($num == "2"){
            $bookingid_target = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            $bookingid_target_temp = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id2' => $bookingid_target_temp->booking_id3]);
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id3' => $bookingid_target->booking_id2]);
                $timebookingTable = DB::table('timebooking')->get();
                $users = Auth::user();
                $waitTable = DB::table('waitconfirm')
                    ->where('project_id',$users->project_id)->first();
                $project = DB::table('project')
                    ->where('id',$users->project_id)->first();
                $timeUser = DB::table('timebooking')
                    ->where('project_id',$users->project_id)->first();
                return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
           
           }
           else {
            echo "Error ";
            }
        }
        else if ($type == "9"){
            if ($num == "2"){
                $bookingid_target = DB::table('waitconfirm')
                    ->where('project_id', $p_id)->first();
                $bookingid_target_temp = DB::table('waitconfirm')
                    ->where('project_id', $p_id)->first();
                DB::table('waitconfirm')
                    ->where('project_id', $p_id)
                    ->update(['booking_id2' => $bookingid_target_temp->booking_id1]);
                DB::table('waitconfirm')
                    ->where('project_id', $p_id)
                    ->update(['booking_id1' => $bookingid_target->booking_id2]);
                    $timebookingTable = DB::table('timebooking')->get();
                    $users = Auth::user();
                    $waitTable = DB::table('waitconfirm')
                        ->where('project_id',$users->project_id)->first();
                    $project = DB::table('project')
                        ->where('id',$users->project_id)->first();
                    $timeUser = DB::table('timebooking')
                        ->where('project_id',$users->project_id)->first();
                    return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
               
           }
           else if ($num == "3"){
            $bookingid_target = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            $bookingid_target_temp = DB::table('waitconfirm')
                ->where('project_id', $p_id)->first();
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id3' => $bookingid_target_temp->booking_id2]);
            DB::table('waitconfirm')
                ->where('project_id', $p_id)
                ->update(['booking_id2' => $bookingid_target->booking_id3]);
                $timebookingTable = DB::table('timebooking')->get();
                $users = Auth::user();
                $waitTable = DB::table('waitconfirm')
                    ->where('project_id',$users->project_id)->first();
                $project = DB::table('project')
                    ->where('id',$users->project_id)->first();
                $timeUser = DB::table('timebooking')
                    ->where('project_id',$users->project_id)->first();
                return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
           
       }
           else {
               echo "Error ";
           }
        }
        else {
            echo "Error ";
            $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
        }
        $timebookingTable = DB::table('timebooking')->get();
            $users = Auth::user();
            $waitTable = DB::table('waitconfirm')
                ->where('project_id',$users->project_id)->first();
            $project = DB::table('project')
                ->where('id',$users->project_id)->first();
            $timeUser = DB::table('timebooking')
                ->where('project_id',$users->project_id)->first();
            return view('showTable', ['timeUser'=>$timeUser,'timebookingTable' => $timebookingTable,'project'=>$project,'users'=>$users,'waitTable' => $waitTable]);
       
    }

}

