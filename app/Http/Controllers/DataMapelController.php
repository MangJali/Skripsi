<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Tenagapendidik;
use Illuminate\Http\Request;

class DataMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mapels = Matapelajaran::all();
        return view('datamapel.index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Tenagapendidik::all();
        return view('datamapel.tambahmapel', compact('guru'));
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
        $mapels = new Matapelajaran;
        $mapels->id_mapel = $request->kodematapelajaran;
        $mapels->namamapel = $request->matapelajaran;
        $mapels->tahunkurikulum = $request->thnkurikulum;
        $mapels->save();

        return redirect('/datamapel')->with('sukses', "Sukses menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Matapelajaran::where("id_mapel", $id)->first();
        return view('datamapel/ubahmapel', compact('mapel'));
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
        $mapel = Matapelajaran::where("id_mapel", $id)->first();
        $mapel->where("id_mapel", $id)->update($request->except(['_token']));
        return redirect('/datamapel')->with("sukses", "berhasil mengupdate data absen!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Matapelajaran::where('id_mapel', $id)->first();
        if ($mapel->delete()) {
            return redirect('/datamapel')->with('sukses', "Sukses menghapus data!");
        }
    }
}
