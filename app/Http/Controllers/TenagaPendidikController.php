<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Tenagapendidik;
use Illuminate\Http\Request;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tenagapendidiks = Tenagapendidik::all();
        return view('dataguru.index', compact('tenagapendidiks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matapelajarans = Matapelajaran::all();
        return view('dataguru.tambahguru', compact('matapelajarans'));
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
        $tenagapendidiks = new Tenagapendidik;
        $tenagapendidiks->nip = $request->nip;
        $tenagapendidiks->namapendidik = $request->namalengkap;
        $tenagapendidiks->alamat = $request->alamat;
        $tenagapendidiks->jeniskelamin = $request->jeniskelamin;
        $tenagapendidiks->save();

        return redirect('/tenagapendidik');
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
