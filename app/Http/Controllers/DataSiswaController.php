<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswaa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswaa::all();
        return view('datasiswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('datasiswa.tambahdatasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswaa;
        $siswa->nis = $request->nis;
        $siswa->namalengkap = $request->namalengkap;
        $siswa->alamat = $request->alamat;
        $siswa->tempatlahir = $request->tempatlahir;
        $siswa->tanggallahir = $request->tanggallahir;
        $siswa->jeniskelamin = $request->jeniskelamin;
        $siswa->sekolahumum = $request->sekolahumum;
        $siswa->kodekelas = $request->kodekelas;
        $siswa->save();

        return redirect('/datasiswa');
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
