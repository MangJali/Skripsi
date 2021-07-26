<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Masterkelas;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Rombel;
use App\Models\Siswaa;
use App\Models\Tenagapendidik;
use Illuminate\Http\Request;

class PesertaKelasController extends Controller
{

    public function index()
    {
        $masterkelas = Masterkelas::all();
        return view('datakelas.index', compact('masterkelas'));
    }


    public function pesertakelas()
    {
        $pesertakelas = Pesertakelas::all();
        $masterkelas = Masterkelas::all();
        return view('pesertakelas.index', ['pesertakelas' => $pesertakelas], ['masterkelas' => $masterkelas]);
    }

    public function create()
    {
        $masterkelas = Masterkelas::all();
        $kelas = Kelas::all();
        $rombel = Rombel::all();
        return view('datakelas.tambahkelas',  ['kelas' => $kelas], ['rombel' => $rombel], ['masterkelas' => $masterkelas]);
    }


    public function tambahpesertakelas()
    {

        $kelas = kelas::all();
        return view('pesertakelas.tambahpesertakelas', compact('kelas'));
    }




    public function autocomplete(Request $request)
    {

        $guru = [];

        if ($request->has('q')) {
            $search = $request->q;
            $guru = Tenagapendidik::select("nip", "namapendidik")
                ->where('namapendidik', 'LIKE', "%$search%")
                ->get();
        }


        return response()->json($guru);
    }


    public function autocomplete_mapel(Request $request)
    {

        $mapel = [];

        if ($request->has('q')) {
            $search = $request->q;
            $mapel = Matapelajaran::select("id_mapel", "namamapel")
                ->where('namamapel', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($mapel);
    }

    public function autocomplete_siswa(Request $request)
    {

        $mapel = [];

        if ($request->has('q')) {
            $search = $request->q;
            $mapel = Siswaa::select("nis", "namalengkap")
                ->where('namalengkap', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($mapel);
    }

    public function autocomplete_kelas(Request $request)
    {

        $kelas = [];

        if ($request->has('q')) {
            $search = $request->q;
            $kelas = Masterkelas::select("id_masterkelas", "kelas")
                ->where('id_masterkelas', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($kelas);
    }


    public function store(Request $request)
    {
        $kelas = new Masterkelas();
        $kelas->id_kelas = $request->id_kelas;
        $kelas->id_mapel = $request->id_mapel;
        $kelas->nip = $request->nip;
        $kelas->thnakademik = $request->thnakademik;
        $kelas->semester = $request->semester;
        $kelas->id_rombel = $request->rombel;

        $kelas->save();

        return redirect('/datakelas')->with('sukses', "Sukses menambahkan data");
    }

    public function datapesertakelas(Request $request)
    {
        $kelas = new Pesertakelas();
        $kelas->id_master = $request->id_master;
        $kelas->nis = $request->nis;

        $kelas->save();

        return redirect('/pesertakelas')->with('sukses', "Sukses menambahkan data");
    }




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
    public function edit($id_master)
    {
        $kelas = Masterkelas::where("id_master", $id_master)->first();
        return view('datakelas.ubahkelas', ["kelas" => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_master)
    {
        $kelas = Kelas::all();
        $kelas = Masterkelas::where("id_master", $id_master)->first();
        $kelas->where("id_master", $id_master)->update($request->except(['_token']));
        return redirect('/datakelas')->with("sukses", "berhasil mengupdate data Kelas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datakelas = Masterkelas::where('id_master', $id)->first();
        if ($datakelas->delete()) {
            return redirect('/datakelas')->with('sukses', "Sukses menghapus data!");
        }
    }
}
