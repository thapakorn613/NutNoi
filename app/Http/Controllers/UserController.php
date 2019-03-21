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
       
        
        return view('profile',compact('user','booking') );
    }


    public function setBooking($id)
    {
        $_id = Auth::user()->id;
        DB::table('users')
        ->where('id', $_id)
        ->update(['booking_id' => $id]);
       return view('warning');
    }


    public function manager()
    {
      $users = User::all()->toArray();
       return view('admin.manager' , compact('users'));

    }

    public function doctor()
    {
        return view('admin.manager');
    }



    public function update($id)
    {
        $user = User::find($id);
       return view('update' , compact('user','id'));
      }
}

