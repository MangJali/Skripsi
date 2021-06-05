<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Siswaa;
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
        if(auth()->user()->role=="admin"){
            $nilaitugas = TugasSiswa::all();
        }else{
            $nilaitugas = TugasSiswa::whereHas("mapel",function($query){
                $guru=Tenagapendidik::where("userid",auth()->user()->id)->first();
                $query->where("nip",$guru->nip);
            })->get();
            // $nilaitugas->mapel()->wherePivot("nip",$guru->nip)->get();
            // print_r($nilaitugas);
        }
        return view('datanilaisiswa/tugasharian', compact('nilaitugas'));
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
                $tugassiswa = TugasSiswa::where(["kodemapel" => $value1->kodemapel, "nis" => $value->nis])->get();
                if (count($tugassiswa) == 0) {
                    $tugasbaru = new TugasSiswa();
                    $tugasbaru->nis = $value->nis;
                    $tugasbaru->kodemapel = $value1->kodemapel;
                    array_push($array, $tugasbaru);
                }
            }
        }
        return view('datanilaisiswa/tambahtugasharian', ["tugasbaru" => $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->nis != null){
            foreach ($request->nis as $key => $value) {
                $nilaisiswa = new TugasSiswa;
                $nilaisiswa->nis = $value;
                $nilaisiswa->kodemapel = $request->kodemapel[$key];
                $nilaisiswa->tugas1 = $request->tugas1[$key];
                $nilaisiswa->tugas2 = $request->tugas2[$key];
                $nilaisiswa->tugas3 = $request->tugas3[$key];
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
        $tugas=TugasSiswa::where("id_tugas",$id)->first();
        return view('datanilaisiswa/ubahtugasharian',["tugas"=>$tugas]);
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
        $tugas=TugasSiswa::where("id_tugas",$id)->first();
        $tugas->where("id_tugas",$id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/tugasharian')->with("sukses","berhasil mengupdate data tugas!");
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
