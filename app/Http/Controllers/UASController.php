<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Siswaa;
use App\Models\Tenagapendidik;
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
        $kelas = Kelas::all();
        if (auth()->user()->role == "admin") {
            $nilaiuas = Ujianakhirsemester::all();
        } else {
            $nilaiuas = Ujianakhirsemester::whereHas("mapel", function ($query) {
                $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                $query->where("nip", $guru->nip);
            })->get();
            // $nilaitugas->mapel()->wherePivot("nip",$guru->nip)->get();
            // print_r($nilaitugas);
        }
        return view('datanilaisiswa.ujianakhirsemester', ['nilaiuas' => $nilaiuas], ['kelas' => $kelas]);
    }


    public function filter_kelas(Request $request)
    {
        if ($request->has('kelas')) {
            $tugas = Ujianakhirsemester::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
                ->join("kelases", "tugassiswas.id_kelas", "=", "kelases.id_kelas")
                ->join("siswas", "tugassiswas.nis", "=", "siswas.nis")
                ->join("matapelajarans", "tugassiswas.id_mapel", "=", "matapelajarans.id_mapel")
                ->where('kelases.id_kelas', '=', $request->kelas)
                ->get();
        }


        return response()->json($tugas);
    }
    public function filter_mapel(Request $request)
    {
        if ($request->has('mapel')) {
            $tugas = Ujianakhirsemester::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
                ->join("kelases", "tugassiswas.id_kelas", "=", "kelases.id_kelas")
                ->join("siswas", "tugassiswas.nis", "=", "siswas.nis")
                ->join("matapelajarans", "tugassiswas.id_mapel", "=", "matapelajarans.id_mapel")
                ->where('matapelajarans.id_mapel', '=', $request->namamapel)
                ->get();
        }


        return response()->json($tugas);
    }

    public function create()
    {
        $kelas = Pesertakelas::all();
        $array = [];
        foreach ($kelas as $value) {
            $tugassiswa = Ujianakhirsemester::where(["id_uas" => $value->id])->get();
            if (count($tugassiswa) == 0) {
                $uasbaru = new Ujianakhirsemester();
                $uasbaru->id = $value->id;
                array_push($array, $uasbaru);
            }
        }
        return view('datanilaisiswa/tambahujianakhirsemester', ['uasbaru' => $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->id_uas)) {
            foreach ($request->id_uas as $key => $value) {
                $nilaiuas = new Ujianakhirsemester;
                $nilaiuas->id_uas = $value;
                $nilaiuas->id = $request->id_peserta[$key];
                $nilaiuas->nis = $request->nis[$key];
                $nilaiuas->id_kelas = $request->id_kelas[$key];
                $nilaiuas->id_mapel = $request->id_mapel[$key];
                $nilaiuas->nip = $request->nip[$key];
                $nilaiuas->ujianakhirsemester = $request->uas[$key] == null ? 0 : $request->tugas1[$key];
                $nilaiuas->save();
            }
        }
        return redirect('datanilaisiswa/ujianakhirsemester')->with('sukses', 'Sukses menambahkan data!');
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
        $uas = Ujianakhirsemester::where("id_uas", $id)->first();
        return view('datanilaisiswa/ubahujianakhirsemester', ["uas" => $uas]);
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
        $uas = Ujianakhirsemester::where("id_uas", $id)->first();
        $uas->where("id_uas", $id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/ujianakhirsemester')->with("sukses", "berhasil mengupdate data tugas!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Ujianakhirsemester::where('id_uas', $id)->first();
        if ($uas->delete()) {
            return redirect('/datanilaisiswa/ujianakhirsemester')->with('sukses', "Sukses menghapus data!");
        }
    }
}
