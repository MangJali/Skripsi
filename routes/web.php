<?php

use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\DataMapelController;
use App\Http\Controllers\DataSekolahUmumController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\PenilaianHasilBelajarController;
use App\Http\Controllers\TenagaPendidikController;
use App\Http\Controllers\TugasPertamaController;
use App\Http\Controllers\TugasSiswaController;
use App\Http\Controllers\UASController;
use App\Http\Controllers\UlanganHarianController;
use App\Http\Controllers\UTSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaKelasController;
use App\Models\Pesertakelas;
use App\Models\Tenagapendidik;
use App\Models\Tugaspertama;
use App\Models\TugasSiswa;
use App\Models\Ujianakhirsemeseter;
use App\Models\Ujiantengahsemeseter;
use App\Models\Ulanganharian;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/logout', [HomeController::class, 'logout']);

// Controller Data Siswa

Route::get('/datasiswa', [DataSiswaController::class, 'index'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datasiswa/tambahdatasiswa', [DataSiswaController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datasiswa/ubahdatasiswa/{nis}/edit', [DataSiswaController::class, 'edit'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datasiswa/{nis}/update', [DataSiswaController::class, 'update'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datasiswa', [DataSiswaController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datasiswa/{id}/delete', [DataSiswaController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin']);


// Controller Tenaga Pendidik
Route::get('/tenagapendidik', [TenagaPendidikController::class, 'index'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/dataguru/tambahguru', [TenagaPendidikController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/dataguru/ubahguru/{nip}/edit', [TenagaPendidikController::class, 'edit'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/dataguru/{nip}/update', [TenagaPendidikController::class, 'update'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/tenagapendidik', [TenagaPendidikController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/dataguru/{id}/delete', [TenagaPendidikController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin']);

// Controller Data Mapel
Route::get('/datamapel', [DataMapelController::class, 'index'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datamapel/tambahmapel', [DataMapelController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datamapel/ubahmapel/{id}/edit', [DataMapelController::class, 'edit'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datamapel/{id}/edit', [DataMapelController::class, 'edit'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datamapel', [DataMapelController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datamapel/{id}/delete', [DataMapelController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin']);

// Controller Kelas
Route::get('/datakelas', [PesertaKelasController::class, 'index'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/pesertakelas', [PesertaKelasController::class, 'pesertakelas'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datakelas/tambahkelas', [PesertaKelasController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/pesertakelas/tambahpesertakelas', [PesertaKelasController::class, 'tambahpesertakelas'])->middleware(['auth', 'Checkrole:admin']);
Route::get('autocomplete', [PesertaKelasController::class, 'autocomplete'])->name('autocomplete');
Route::get('autocomplete-mapel', [PesertaKelasController::class, 'autocomplete_mapel'])->name('autocomplete-mapel');
Route::get('autocomplete-siswa', [PesertaKelasController::class, 'autocomplete_siswa'])->name('autocomplete-siswa');
Route::get('autocomplete-id_kelas', [PesertaKelasController::class, 'autocomplete_kelas'])->name('autocomplete-id_kelas');
Route::get('/datakelas/ubahkelas/{id_kelas}/edit', [PesertaKelasController::class, 'edit'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datakelas/{id_kelas}/update', [PesertaKelasController::class, 'update'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datakelas', [PesertaKelasController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/pesertakelas', [PesertaKelasController::class, 'datapesertakelas'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datakelas/{id}/delete', [PesertaKelasController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin']);

// Controller Data Sekolah Umum
Route::get('/datasekolahumum', [DataSekolahUmumController::class, 'index'])->middleware('auth');
Route::get('/datasekolahumum/tambahsekolahumum', [DataSekolahUmumController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datasekolahumum', [DataSekolahUmumController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);

// Controller Data Absensi Siswa
Route::get('/dataabsensi', [DataAbsensiController::class, 'index'])->middleware('auth');
Route::get('/dataabsensi/indexsiswa', [DataAbsensiController::class, 'indexsiswa'])->middleware(['auth', 'Checkrole:ortu']);
Route::get('/dataabsensi/add', [DataAbsensiController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/dataabsensi/ubahabsensi/{id}/edit', [DataAbsensiController::class, 'edit'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/dataabsensi/{id}/update', [DataAbsensiController::class, 'update'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/dataabsensi/store', [DataAbsensiController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/dataabsensi/{id}/delete', [DataAbsensiController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin,guru']);

// Controller Data Penilain Hasil Belajar
Route::get('/penilaianhasilbelajar', [PenilaianHasilBelajarController::class, 'index'])->middleware('auth');

// Controller Penilain Hasil Belajar
Route::get('/datanilaisiswa/filter-kelas', [TugasSiswaController::class, 'filter_kelas'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/filter-namamapel', [TugasSiswaController::class, 'filter_mapel'])->middleware(['auth', 'Checkrole:admin,guru']);

Route::get('/datanilaisiswa/tugasharian', [TugasSiswaController::class, 'index'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ulanganharian', [UlanganHarianController::class, 'index'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ujiantengahsemester', [UTSController::class, 'index'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ujianakhirsemester', [UASController::class, 'index'])->middleware(['auth', 'Checkrole:admin,guru']);

Route::get('/datanilaisiswa/tugasharian/add', [TugasSiswaController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datanilaisiswa/ulanganharian/add', [UlanganHarianController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datanilaisiswa/ujiantengahsemester/add', [UTSController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);
Route::get('/datanilaisiswa/ujianakhirsemester/add', [UASController::class, 'create'])->middleware(['auth', 'Checkrole:admin']);

Route::get('/datanilaisiswa/tugasharian/{id}/edit', [TugasSiswaController::class, 'edit'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ulanganharian/{id}/edit', [UlanganHarianController::class, 'edit'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ujiantengahsemester/{id}/edit', [UTSController::class, 'edit'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::get('/datanilaisiswa/ujianakhirsemester/{id}/edit', [UASController::class, 'edit'])->middleware(['auth', 'Checkrole:admin,guru']);

Route::post('/datanilaisiswa/tugasharian/{id}/update', [TugasSiswaController::class, 'update'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ulanganharian/{id}/update', [UlanganHarianController::class, 'update'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ujiantengahsemester/{id}/update', [UTSController::class, 'update'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ujianakhirsemester/{id}/update', [UASController::class, 'update'])->middleware(['auth', 'Checkrole:admin,guru']);

Route::post('/datanilaisiswa/tugasharian', [TugasSiswaController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datanilaisiswa/ulanganharian', [UlanganHarianController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datanilaisiswa/ujiantengahsemester', [UTSController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);
Route::post('/datanilaisiswa/ujianakhirsemester', [UASController::class, 'store'])->middleware(['auth', 'Checkrole:admin']);

Route::post('/datanilaisiswa/tugasharian/{id}/delete', [TugasSiswaController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ulanganharian/{id}/delete', [UlanganHarianController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ujiantengahsemester/{id}/delete', [UTSController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin,guru']);
Route::post('/datanilaisiswa/ujianakhirsemester/{id}/delete', [UASController::class, 'destroy'])->middleware(['auth', 'Checkrole:admin,guru']);
