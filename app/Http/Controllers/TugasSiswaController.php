<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Siswaa;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;

class TugasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaitugas = TugasSiswa::all();
        return view('datanilaisiswa/tugasharian', compact('nilaitugas'));
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
        return view('datanilaisiswa/ubahtugasharian', ['mapel' => $mapel], ['siswa' => $siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilaisiswa = new TugasSiswa;
        $nilaisiswa->nis = $request->nis;
        $nilaisiswa->kodemapel = $request->kodemapel;
        $nilaisiswa->tugas1 = $request->tugas1;
        $nilaisiswa->tugas2 = $request->tugas2;
        $nilaisiswa->tugas3 = $request->tugas3;
        $nilaisiswa->save();

        return redirect('datanilaisiswa/tugasharian');
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
