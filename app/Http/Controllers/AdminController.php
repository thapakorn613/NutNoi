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
       return view('checkTime' , ['waitTable' => $waitTable]);
    }   
}
