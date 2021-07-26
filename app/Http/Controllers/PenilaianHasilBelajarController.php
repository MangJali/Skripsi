<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matapelajaran;
use App\Models\Siswaa;
use App\Models\Tugaskedua;
use App\Models\Tugaspertama;
use App\Models\Ujianakhirsemeseter;
use App\Models\Ujiantengahsemeseter;
use App\Models\Ulanganharian;
use App\Models\Penilaianhasilbelajar;
use App\Models\Pesertakelas;
use App\Models\Tenagapendidik;
use App\Models\Tugaskeempat;
use App\Models\Tugasketiga;
use App\Models\TugasSiswa;
use App\Models\Ujianakhirsemester;
use App\Models\Ujiantengahsemester;
use Illuminate\Http\Request;

class PenilaianHasilBelajarController extends Controller
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
            $array = $this->getData(TugasSiswa::all(), Ulanganharian::all(), Ujiantengahsemester::all(), Ujianakhirsemester::all());
        } else if (auth()->user()->role == "guru") {
            $array = $this->getData(
                TugasSiswa::whereHas("mapel", function ($query) {
                    $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                    $query->where("nip", $guru->nip);
                })->get(),
                Ulanganharian::whereHas("mapel", function ($query) {
                    $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                    $query->where("nip", $guru->nip);
                })->get(),
                Ujiantengahsemester::whereHas("mapel", function ($query) {
                    $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                    $query->where("nip", $guru->nip);
                })->get(),
                Ujianakhirsemester::whereHas("mapel", function ($query) {
                    $guru = Tenagapendidik::where("userid", auth()->user()->id)->first();
                    $query->where("nip", $guru->nip);
                })->get()
            );
        } else {
            $siswa = Siswaa::where("userid", auth()->user()->id)->first();
            $array = $this->getData($siswa->tugassiswa()->get(), $siswa->ulanganharian()->get(), $siswa->uts()->get(), $siswa->uas()->get());
        }
        return view('penilaianhasilbelajar.index', ["rapor" => $array], ['kelas' => $kelas]);
    }

    public function getData($tugas, $uh, $uts, $uas)
    {
        if (count($tugas) > 0 || count($uh) > 0 || count($uts) > 0 || count($uas) > 0) {
            $array = [];
            foreach ($tugas as $key => $value) {
                $array[$value->nis][$value->id]["namalengkap"] = Siswaa::where("nis", $value->nis)->first()->namalengkap;
                $array[$value->nis][$value->id]["id"] = Pesertakelas::where("id", $value->id)->first()->masterkelas->kelas->kelas;
                $array[$value->nis][$value->id]["mapel"] = Pesertakelas::where("id", $value->id)->first()->masterkelas->mapel->namamapel;
                $array[$value->nis][$value->id]["tugas1"] = $value->tugas1;
                $array[$value->nis][$value->id]["tugas2"] = $value->tugas2;
                $array[$value->nis][$value->id]["tugas3"] = $value->tugas3;
            }
            foreach ($uh as $key => $value) {
                $array[$value->nis][$value->id]["namalengkap"] = Siswaa::where("nis", $value->nis)->first()->namalengkap;
                $array[$value->nis][$value->id]["id"] = Pesertakelas::where("id", $value->id)->first()->masterkelas->kelas->kelas;
                $array[$value->nis][$value->id]["uh1"] = $value->ulanganharian1;
                $array[$value->nis][$value->id]["uh2"] = $value->ulanganharian2;
            }
            foreach ($uts as $key => $value) {
                $array[$value->nis][$value->id]["namalengkap"] = Siswaa::where("nis", $value->nis)->first()->namalengkap;
                $array[$value->nis][$value->id]["id"] = Pesertakelas::where("id", $value->id)->first()->masterkelas->kelas->kelas;
                $array[$value->nis][$value->id]["uts"] = $value->ujiantengahsemester;
            }
            foreach ($uas as $key => $value) {
                $array[$value->nis][$value->id]["namalengkap"] = Siswaa::where("nis", $value->nis)->first()->namalengkap;
                $array[$value->nis][$value->id]["id"] = Pesertakelas::where("id", $value->id)->first()->masterkelas->kelas->kelas;
                $array[$value->nis][$value->id]["uas"] = $value->ujianakhirsemester;
            }
            return $array;
        } else {
            return array();
        }
    }

    // public function tugasharian()
    // {
    //     $siswa = Siswaa::all();
    //     $tugas1 = new Tugaspertama();
    //     return view('datanilaisiswa.tugasharian', compact('siswa'));
    // }

    // public function ulanganharian()
    // {
    //     return view('datanilaisiswa.ulanganharian');
    // }
    // public function ujiantengahsemester()
    // {
    //     return view('datanilaisiswa.ujiantengahsemester');
    // }
    // public function ujianakhirsemester()
    // {
    //     return view('datanilaisiswa.ujianakhirsemester');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penilaianhasilbelajar.masukkannilai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = new Penilaianhasilbelajar();
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
