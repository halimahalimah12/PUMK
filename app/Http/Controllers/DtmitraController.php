<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_ush;
use App\Models\Data_mitra;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class DtmitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = User::where('id', Auth::user()->id)->first();
        $mitra  = Data_Mitra::all();
        $notification= Notification::where('id_tujuan','=','1')->get();
        $countnotifikasi = Notification::where('id_tujuan','=','1')->count();
        
        return view('dashboard.data_mitra.index' ,compact('user','mitra','notification','countnotifikasi') );
    }

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
    public function show($id)
    {
        $user   = User::where('id', Auth::user()->id)->first();
        $mitra  = Data_Mitra::find($id);
        $notification= Notification::where('id_tujuan','=','1')->get();
        $countnotifikasi = Notification::where('id_tujuan','=','1')->count();
        
        return view('dashboard.data_mitra.view' ,compact('user','mitra','notification','countnotifikasi') );
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
