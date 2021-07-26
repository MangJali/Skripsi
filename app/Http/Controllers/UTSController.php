<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Siswaa;
use App\Models\Tenagapendidik;
use App\Models\Ujiantengahsemester;
use Illuminate\Http\Request;

class UTSController extends Controller
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
            $nilaiuts = Ujiantengahsemester::all();
        } else {
            $nilaiuts = Ujiantengahsemester::whereHas("mapel", function ($query) {
                $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                $query->where("nip", $guru->nip);
            })->get();
            // $nilaitugas->mapel()->wherePivot("nip",$guru->nip)->get();
            // print_r($nilaitugas);
        }
        return view('datanilaisiswa.ujiantengahsemester', ['nilaiuts' => $nilaiuts], ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Pesertakelas::all();
        $array = [];
        foreach ($kelas as $value) {
            $tugassiswa = Ujiantengahsemester::where(["id_uts" => $value->id])->get();
            if (count($tugassiswa) == 0) {
                $utsbaru = new Ujiantengahsemester();
                $utsbaru->id = $value->id;
                array_push($array, $utsbaru);
            }
        }
        return view('datanilaisiswa/tambahujiantengahsemester', ['utsbaru' => $array]);
    }

    public function filter_kelas(Request $request)
    {
        if ($request->has('kelas')) {
            $tugas = Ujiantengahsemester::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
                ->join("kelases", "tugassiswas.id_kelas", "=", "kelases.id_kelas")
                ->join("siswas", "tugassiswas.nis", "=", "siswas.nis")
                ->join("matapelajarans", "tugassiswas.id_mapel", "=", "matapelajarans.id_mapel")
                ->where('kelases.id_kelas', '=', $request->kelas)
                ->get();
        }


        return response()->json($tugas);
    }

    public function store(Request $request)
    {
        if (isset($request->id_uts)) {
            foreach ($request->id_uts as $key => $value) {
                $nilaiuts = new Ujiantengahsemester;
                $nilaiuts->id_uts = $value;
                $nilaiuts->id = $request->id_peserta[$key];
                $nilaiuts->nis = $request->nis[$key];
                $nilaiuts->id_kelas = $request->id_kelas[$key];
                $nilaiuts->id_mapel = $request->id_mapel[$key];
                $nilaiuts->nip = $request->nip[$key];
                $nilaiuts->ujiantengahsemester = $request->uts[$key] == null ? 0 : $request->tugas1[$key];
                $nilaiuts->save();
            }
        }
        return redirect('datanilaisiswa/ujiantengahsemester')->with('sukses', "Sukses menambahkan data");
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
        $uts = Ujiantengahsemester::where("id_uts", $id)->first();
        return view('datanilaisiswa/ubahujiantengahsemester', ["uts" => $uts]);
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
        $uts = Ujiantengahsemester::where("id_uts", $id)->first();
        $uts->where("id_uts", $id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/ujiantengahsemester')->with("sukses", "berhasil mengupdate data tugas!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uts = Ujiantengahsemester::where('id_uts', $id)->first();
        if ($uts->delete()) {
            return redirect('/datanilaisiswa/ujiantengahsemester')->with('sukses', "Sukses menghapus data!");
        }
    }
}
