<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matapelajaran;
use App\Models\Pesertakelas;
use App\Models\Tenagapendidik;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasSiswaController extends Controller
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
            $nilaitugas = TugasSiswa::all();
        } else {
            $nilaitugas = TugasSiswa::whereHas("mapel", function ($query) {
                $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                $query->where("nip", $guru->nip);
            })->get();
            // $nilaitugas->mapel()->wherePivot("nip",$guru->nip)->get();
            // print_r($nilaitugas);
        }
        return view('datanilaisiswa/tugasharian',   ['nilaitugas' => $nilaitugas],  ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filter_kelas(Request $request)
    {
        if ($request->has('kelas')) {
            $tugas = TugasSiswa::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
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
        if ($request->has('namamapel')) {
            $tugas = TugasSiswa::select("siswas.namalengkap", "kelases.kelas", "matapelajarans.namamapel", "tugassiswas.*")
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
            $tugassiswa = TugasSiswa::where(["id_tugas" => $value->id])->get();
            if (count($tugassiswa) == 0) {
                $tugasbaru = new TugasSiswa();
                $tugasbaru->id = $value->id;
                array_push($array, $tugasbaru);
            }
        }

        return view('datanilaisiswa/tambahtugasharian', ["tugasbaru" => $array]);
    }


    public function store(Request $request)
    {
        if (isset($request->id_tugas)) {
            foreach ($request->id_tugas as $key => $value) {
                $nilaisiswa = new TugasSiswa;
                $nilaisiswa->id_tugas = $value;
                $nilaisiswa->id = $request->id_peserta[$key];
                $nilaisiswa->nis = $request->nis[$key];
                $nilaisiswa->id_kelas = $request->id_kelas[$key];
                $nilaisiswa->id_mapel = $request->id_mapel[$key];
                $nilaisiswa->nip = $request->nip[$key];
                $nilaisiswa->tugas1 = $request->tugas1[$key] == null ? 0 : $request->tugas1[$key];
                $nilaisiswa->tugas2 = $request->tugas2[$key] == null ? 0 : $request->tugas2[$key];
                $nilaisiswa->tugas3 = $request->tugas3[$key] == null ? 0 : $request->tugas3[$key];
                $nilaisiswa->save();
            }
        }

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = TugasSiswa::where("id_tugas", $id)->first();
        return view('datanilaisiswa/ubahtugasharian', ["tugas" => $tugas]);
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
        $tugas = TugasSiswa::where("id_tugas", $id)->first();
        $tugas->where("id_tugas", $id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/tugasharian')->with("sukses", "berhasil mengupdate data tugas!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = TugasSiswa::where('id_tugas', $id)->first();
        if ($tugas->delete()) {
            return redirect('/datanilaisiswa/tugasharian')->with('sukses', "Sukses menghapus data!");
        }
    }
}
