<?php

namespace App\Http\Controllers;


use App\Models\Siswaa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataSiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswaa::all();
        return view('datasiswa.index', compact('siswa'));
    }


    public function create()
    {

        return view('datasiswa.tambahdatasiswa');
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->namalengkap;
        $user->email = $request->nis;
        $user->password = Hash::make($request->nis);
        $user->role = "ortu";

        try {
            if ($user->save()) {
                $siswa = new Siswaa;
                $siswa->nis = $request->nis;
                $siswa->namalengkap = $request->namalengkap;
                $siswa->alamat = $request->alamat;
                $siswa->tempatlahir = $request->tempatlahir;
                $siswa->tanggallahir = $request->tanggallahir;
                $siswa->jeniskelamin = $request->jeniskelamin;
                $siswa->sekolahumum = $request->sekolahumum;
                $siswa->namaortu = $request->namaortu;
                $siswa->status = $request->status;
                $siswa->angkatan = $request->angkatan;
                $siswa->userid = $user->id;
                if ($siswa->save()) {
                    return redirect('/datasiswa')->with("sukses", "Sukses menambah siswa!");
                } else {
                    $user->delete();
                }
            }
        } catch (\Exception $e) {
            return redirect('/datasiswa')->with("gagal", "Gagal menambah siswa!");
        }
    }

    public function edit($nis)
    {
        $siswa = Siswaa::where("nis", $nis)->first();
        return view('datasiswa/ubahdatasiswa', ["siswa" => $siswa]);
    }


    public function update(Request $request, $nis)
    {
        $siswa = Siswaa::where("nis", $nis)->first();
        $siswa->where("nis", $nis)->update($request->except(['_token']));
        return redirect('/datasiswa')->with("sukses", "berhasil mengupdate data Siswa");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datasiswa = Siswaa::where('nis', $id);
        $id = $datasiswa->first()->userid;
        try {
            if ($datasiswa->delete()) {
                $user = User::where('id', $id)->where('role', 'ortu');
                if ($user->delete()) {
                    return redirect('/datasiswa')->with('sukses', "Sukses menghapus data!");
                } else {
                    $user->delete();
                }
            }
        } catch (\Throwable $th) {
        }
        return redirect('/datasiswa')->with('gagal', "Gagal menghapus Data");
    }
}
