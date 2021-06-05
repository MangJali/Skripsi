<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
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
        return view('datanilaisiswa.ujiantengahsemester', compact('nilaiuts'));
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
                $tugassiswa = Ujiantengahsemester::where(["kodemapel" => $value1->kodemapel, "nis" => $value->nis])->get();
                if (count($tugassiswa) == 0) {
                    $utsbaru = new Ujiantengahsemester();
                    $utsbaru->nis = $value->nis;
                    $utsbaru->kodemapel = $value1->kodemapel;
                    array_push($array, $utsbaru);
                }
            }
        }
        return view('datanilaisiswa/tambahujiantengahsemester', ['utsbaru' => $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->nis)){
            foreach ($request->nis as $key => $value) {
                $nilaiuts = new Ujiantengahsemester;
                $nilaiuts->nis = $value;
                $nilaiuts->kodemapel = $request->kodemapel[$key];
                $nilaiuts->ujiantengahsemester = $request->uts[$key];
                $nilaiuts->save();
            }
            
        }
        return redirect('datanilaisiswa/ujiantengahsemester')->with('sukses',"Sukses menambahkan data");
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
        $uts=Ujiantengahsemester::where("id_uts",$id)->first();
        return view('datanilaisiswa/ubahujiantengahsemester',["uts"=>$uts]);
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
        $uts=Ujiantengahsemester::where("id_uts",$id)->first();
        $uts->where("id_uts",$id)->update($request->except(['_token']));
        return redirect('datanilaisiswa/ujiantengahsemester')->with("sukses","berhasil mengupdate data tugas!");
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
