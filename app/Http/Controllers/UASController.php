<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
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
        $nilaiuas = Ujianakhirsemester::all();
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
        return view('datanilaisiswa.ujianakhirsemester', compact('nilaiuas'));
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
        $array = [];
        foreach ($siswa as $key => $value) {
            foreach ($mapel as $key1 => $value1) {
                $tugassiswa = Ujianakhirsemester::where(["kodemapel" => $value1->kodemapel, "nis" => $value->nis])->get();
                if (count($tugassiswa) == 0) {
                    $uasbaru = new Ujianakhirsemester();
                    $uasbaru->nis = $value->nis;
                    $uasbaru->kodemapel = $value1->kodemapel;
                    array_push($array, $uasbaru);
                }
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
        if (isset($request->nis)) {
            foreach ($request->nis as $key => $value) {
                $nilaiuas = new Ujianakhirsemester;
                $nilaiuas->nis = $value;
                $nilaiuas->kodemapel = $request->kodemapel[$key];
                $nilaiuas->ujianakhirsemester = $request->uas[$key];
                $nilaiuas->save();
            }
        }
        return redirect('datanilaisiswa/ujianakhirsemester')->with('sukses','Sukses menambahkan data!');
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
        //
    }
}
