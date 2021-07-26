<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Siswaa;
use App\Models\Tenagapendidik;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DataAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "admin") {
            $absensi = Absensi::all();
        } else if (auth()->user()->role == "guru") {
            $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
            $absensi = Absensi::whereHas("mapel", function ($query) {
                $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                $query->where("nip", $guru->nip);
            })->get();
        }
        return view('dataabsensi.index', compact('absensi'));
    }
    public function indexsiswa()
    {
        if (auth()->user()->role == "ortu") {
            $siswa = Siswaa::where("userid", auth()->user()->id)->first();
            $absen = Absensi::where('nis', $siswa->nis)->get();
        }
        return view('dataabsensi.indexsiswa', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Pesertakelas::all();
        $absensi = [];
        foreach ($mapel as $value) {
            $dataabsen = Absensi::where(["id_absensi" => $value->id])->get();
            if (count($dataabsen) == 0) {
                $baru = new Absensi();
                $baru->id = $value->id;
                array_push($absensi, $baru);
            }
        }
        return view('dataabsensi.tambahabsensi', compact('absensi'));
    }


    public function store(Request $request)
    {
        if (isset($request->id_absensi)) {
            foreach ($request->id_absensi as $key => $value) {
                $absensi = new Absensi;
                $absensi->id_absensi = $value;
                $absensi->id = $request->id_peserta[$key];
                $absensi->nis = $request->nis[$key];
                $absensi->id_kelas = $request->id_kelas[$key];
                $absensi->id_mapel = $request->id_mapel[$key];
                $absensi->nip = $request->nip[$key];
                $absensi->ijin = $request->ijin[$key] == null ? 0 : $request->ijin[$key];
                $absensi->hadir = $request->hadir[$key] == null ? 0 : $request->hadir[$key];
                $absensi->alpha = $request->alpha[$key] == null ? 0 : $request->alpha[$key];

                $absensi->save();
            }
        }
        return redirect('/dataabsensi')->with('sukses', "sukses menambahkan data!");
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


    public function edit($id)
    {
        $absensi = Absensi::where("id_absensi", $id)->first();
        return view('dataabsensi/ubahabsensi', ["absensi" => $absensi]);
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
        $absensi = Absensi::where("id_absensi", $id)->first();
        $absensi->where("id_absensi", $id)->update($request->except(['_token']));
        return redirect('dataabsensi')->with("sukses", "berhasil mengupdate data absen!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = Absensi::where('id_absensi', $id)->first();
        if ($absensi->delete()) {
            return redirect('/dataabsensi')->with('sukses', "Sukses menghapus data!");
        }
    }
}
