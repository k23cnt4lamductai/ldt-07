<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LDTKhoaController extends Controller
{
    public function ldtGetAllKhoa()
    {
        // truy van doc du lieu tu bang khoa 
        $ldtkhoa = DB::select("Select * from ldtkhoa ");
        // chuyen du lieu len view de hien thi
        return view('ldtKhoa.ldtList',['ldtkhoa' => $ldtkhoa]);
    }
    public function ldtGetKhoa($makh)
    {
        $khoa = DB::select("Select * from ldtkhoa where ldtmakh=?",[$makh][0]);
        return view ('ldtKhoa.ldtDetail',['khoa'=>$khoa]);
    }

    public function ldtEdit($makh)
    {
        $khoa = DB::select("Select * from ldtkhoa where ldtmakh=?",[$makh][0]);
        return view ('ldtKhoa.ldtEdit',['khoa'=>$khoa]);
    }
    public function ldtEditSummit($makh, Request $request)
    {
        $makh = $request->input('ldtmakh');
        $tenkh = $request->input('ldttenkh');
        DB::update("UPDATE ldtkhoa SET ldttenkh = ? WHERE ldtmakh = ?",[$tenkh,$makh]);
        return redirect('/khoa');
    }
    public function ldtInsert()
    {
        return view('ldtKhoa.ldtInsert');
    }

    public function ldtInsertSubmit(Request $request)
    {
        // kiem tra du kieu nhap
        $validate = $request->validate([
                'ldtmakh' => 'required|max:2',
                'ldttenkh' => 'required|max:50'
            ],
            [
                'ldtmakh.required' => 'Vui long nhap ma khoa.',
                'ldtmakh.max' => 'Ma khoa toi da nhap 2 ky tu.',
                'ldttenkh.required' => 'Vui long nhap ten khoa.',
                'ldttenkh.max' => 'Ten khoa toi da nhap 50 ky tu.',
            ]
        );
        // lay du lieu tren form
        $makh = $request->input('ldtmakh');
        $tenkh = $request->input('ldttenkh');
        // ghi du lieu xuong database
        DB::insert("INSERT INTO ldtkhoa(ldtmakh,ldttenkh) VALUES (?,?) ",[$makh,$tenkh]);
        // chuyen sang trang danh sach
        return redirect('/khoa');
    }
    // #Delete
    public function ldtDelete($makh)
    {
        DB::delete("DELETE FROM ldtkhoa WHERE ldtmakh = ?",[$makh]);
        //chuyen sang danh sach
        return redirect('/khoa');
    }
}