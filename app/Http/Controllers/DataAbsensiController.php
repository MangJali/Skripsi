<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Matapelajaran;
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
        } else {
            $siswa = Siswaa::where("userid", auth()->user()->id)->first();
            $absensi = Absensi::where('nis', $siswa->nis)->get();
        }
        return view('dataabsensi.index', compact('absensi'));
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
        $absensi = [];
        foreach ($siswa as $key => $value) {
            foreach ($mapel as $key1 => $value1) {
                $tugassiswa = Absensi::where(["kodemapel" => $value1->kodemapel, "nis" => $value->nis])->get();
                if (count($tugassiswa) == 0) {
                    $baru = new Absensi();
                    $baru->nis = $value->nis;
                    $baru->kodemapel = $value1->kodemapel;
                    array_push($absensi, $baru);
                }
            }
        }
        return view('dataabsensi.tambahabsensi', compact('absensi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->nis)) {
            foreach ($request->nis as $key => $value) {
                $nilaiuts = new Absensi();
                $nilaiuts->nis = $value;
                $nilaiuts->kodemapel = $request->kodemapel[$key];
                $nilaiuts->ijin = $request->ijin[$key] == null ? 0 : $request->ijin[$key];
                $nilaiuts->hadir = $request->hadir[$key] == null ? 0 : $request->hadir[$key];
                $nilaiuts->alpha = $request->alpha[$key] == null ? 0 : $request->alpha[$key];
                // print_r($nilaiuts);
                $nilaiuts->save();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
