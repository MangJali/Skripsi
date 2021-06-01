<?php

namespace App\Http\Controllers;

use App\Models\Siswaa;
use App\Models\Tugaskedua;
use App\Models\Tugaspertama;
use App\Models\Ujianakhirsemeseter;
use App\Models\Ujiantengahsemeseter;
use App\Models\Ulanganharian;
use App\Models\Penilaianhasilbelajar;
use App\Models\Tugaskeempat;
use App\Models\Tugasketiga;
use Illuminate\Http\Request;

class PenilaianHasilBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('penilaianhasilbelajar.index');
    }

    // public function tugasharian()
    // {
    //     $siswa = Siswaa::all();
    //     $tugas1 = new Tugaspertama();
    //     return view('datanilaisiswa.tugasharian', compact('siswa'));
    // }

    // public function ulanganharian()
    // {
    //     return view('datanilaisiswa.ulanganharian');
    // }
    // public function ujiantengahsemester()
    // {
    //     return view('datanilaisiswa.ujiantengahsemester');
    // }
    // public function ujianakhirsemester()
    // {
    //     return view('datanilaisiswa.ujianakhirsemester');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penilaianhasilbelajar.masukkannilai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = new Penilaianhasilbelajar();
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
