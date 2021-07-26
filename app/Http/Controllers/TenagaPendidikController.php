<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Tenagapendidik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tenagapendidiks = Tenagapendidik::all();
        return view('dataguru.index', compact('tenagapendidiks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matapelajarans = Matapelajaran::all();
        return view('dataguru.tambahguru', compact('matapelajarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->namalengkap;
        $user->email = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->role = "guru";
        try {
            if ($user->save()) {
                $tenagapendidiks = new Tenagapendidik;
                $tenagapendidiks->nip = $request->nip;
                $tenagapendidiks->namapendidik = $request->namalengkap;
                $tenagapendidiks->alamat = $request->alamat;
                $tenagapendidiks->jeniskelamin = $request->jeniskelamin;
                $tenagapendidiks->userid = $user->id;;
                if ($tenagapendidiks->save()) {
                    return redirect('/tenagapendidik')->with('sukses', "Sukses menambah tenaga kerja");
                } else {
                    $user->delete();
                }
            }
        } catch (\Exception $e) {
        }
        return redirect('/tenagapendidik')->with('gagal', "Gagal menambah tenaga kerja");
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
    public function edit($nip)
    {
        $tenagapendidik = Tenagapendidik::where("nip", $nip)->first();
        return view('dataguru/ubahguru', ["tenagapendidik" => $tenagapendidik]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $tenagapendidik = Tenagapendidik::where("nip", $nip)->first();
        $tenagapendidik->where("nip", $nip)->update($request->except(['_token']));
        return redirect('/tenagapendidik')->with("sukses", "berhasil mengupdate data absen!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenagapendidik = Tenagapendidik::where('nip', $id);
        $id = $tenagapendidik->first()->userid;
        try {
            if ($tenagapendidik->delete()) {
                $user = User::where('id', $id)->where('role', 'guru');
                if ($user->delete()) {
                    return redirect('/tenagapendidik')->with('sukses', "Sukses menghapus data!");
                } else {
                    $user->delete();
                }
            }
        } catch (\Throwable $th) {
        }
        return redirect('/tenagapendidik')->with('gagal', "Gagal menghapus tenaga pendidik");
    }
}
