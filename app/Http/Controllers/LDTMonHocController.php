<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LDTMonHocController extends Controller
{
    // #1List mon hoc
    public function ldtList()
    {
        $ldtMonHocs = DB::table('ldtmonhoc')->get();
        return view('ldtMonHoc.ldtList',['ldtMonHocs'=>$ldtMonHocs]);
    }
}