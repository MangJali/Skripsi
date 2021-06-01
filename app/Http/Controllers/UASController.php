<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Siswaa;
use App\Models\Ujianakhirsemester;
use Illuminate\Http\Request;

class UASController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaiuas = Ujianakhirsemester::all();
        return view('datanilaisiswa.ujianakhirsemester', compact('nilaiuas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Matapelajaran::all();
        $siswa = Siswaa::all();
        return view('datanilaisiswa/ubahujianakhirsemester', ['mapel' => $mapel], ['siswa' => $siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilaiuas = new Ujianakhirsemester;
        $nilaiuas->nis = $request->nis;
        $nilaiuas->kodemapel = $request->kodemapel;
        $nilaiuas->ujianakhirsemester = $request->uas;
        $nilaiuas->save();

        return redirect('datanilaisiswa/ujianakhirsemester');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
