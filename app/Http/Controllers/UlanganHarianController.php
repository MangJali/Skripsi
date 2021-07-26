<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Siswaa;
use App\Models\Tenagapendidik;
use App\Models\Ulanganharian;
use Illuminate\Http\Request;

class UlanganHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        if (auth()->user()->role == "admin") {
            $nilaiuh = Ulanganharian::all();
        } else {
            $nilaiuh = Ulanganharian::whereHas("mapel", function ($query) {
                $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                $query->where("nip", $guru->nip);
            })->get();
            // $nilaitugas->mapel()->wherePivot("nip",$guru->nip)->get();
            // print_r($nilaitugas);
        }
        return view('datanilaisiswa/ulanganharian', ['nilaiuh' => $nilaiuh], ['kelas' => $kelas]);
    }

    public function filter_kelas(Request $request)
    {
        if ($request->has('kelas')) {
            $tugas = Ulanganharian::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
                ->join("kelases", "tugassiswas.id_kelas", "=", "kelases.id_kelas")
                ->join("siswas", "tugassiswas.nis", "=", "siswas.nis")
                ->join("matapelajarans", "tugassiswas.id_mapel", "=", "matapelajarans.id_mapel")
                ->where('kelases.id_kelas', '=', $request->kelas)
                ->get();
        }


        return response()->json($tugas);
    }

    public function create()
    {
        $kelas = Pesertakelas::all();
        $array = [];
        foreach ($kelas as $key1 => $value) {
            $tugassiswa = Ulanganharian::where(["id_uh" => $value->id])->get();
            if (count($tugassiswa) == 0) {
                $uhbaru = new Ulanganharian();
                $uhbaru->id = $value->id;
                array_push($array, $uhbaru);
            }
        }
        return view('datanilaisiswa/tambahulanganharian', ['uhbaru' => $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->id_uh)) {
            foreach ($request->id_uh as $key => $value) {
                $nilaiuh = new Ulanganharian;
                $nilaiuh->id_uh = $value;
                $nilaiuh->id = $request->id_peserta[$key];
                $nilaiuh->nis = $request->nis[$key];
                $nilaiuh->id_kelas = $request->id_kelas[$key];
                $nilaiuh->id_mapel = $request->id_mapel[$key];
                $nilaiuh->nip = $request->nip[$key];
                $nilaiuh->ulanganharian1 = $request->uh1[$key] == null ? 0 : $request->uh1[$key];
                $nilaiuh->Ulanganharian2 = $request->uh2[$key] == null ? 0 : $request->uh1[$key];
                $nilaiuh->save();
            }
        }
        return redirect('datanilaisiswa/ulanganharian')->with('sukses', 'Sukses menambahkan data!');
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
        $uh = Ulanganharian::where("id_uh", $id)->first();
        return view('datanilaisiswa/ubahulanganharian', ["uh" => $uh]);
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
        $uh = Ulanganharian::where("id_uh", $id)->first();
        $uh->where("id_uh", $id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/ulanganharian')->with("sukses", "berhasil mengupdate data tugas!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ulangan = Ulanganharian::where('id_uh', $id)->first();
        if ($ulangan->delete()) {
            return redirect('/datanilaisiswa/ulanganharian')->with('sukses', "Sukses menghapus data!");
        }
    }
}
