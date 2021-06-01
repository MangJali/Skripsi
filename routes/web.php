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
use App\Models\Tugaspertama;
use App\Models\TugasSiswa;
use App\Models\Ujianakhirsemeseter;
use App\Models\Ujiantengahsemeseter;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/home', function () {
    return view('dashboard');
});

// Controller Data Siswa
Route::get('/datasiswa', [DataSiswaController::class, 'index']);
Route::get('/datasiswa/tambahdatasiswa', [DataSiswaController::class, 'create']);

// Controller Tenaga Pendidik
Route::get('/tenagapendidik', [TenagaPendidikController::class, 'index']);
Route::get('/dataguru/tambahguru', [TenagaPendidikController::class, 'create']);
Route::post('/tenagapendidik', [TenagaPendidikController::class, 'store']);

// Controller Data Mapel
Route::get('/datamapel', [DataMapelController::class, 'index']);
Route::get('/datamapel/tambahmapel', [DataMapelController::class, 'create']);
Route::post('/datamapel', [DataMapelController::class, 'store']);

// Controller Data Sekolah Umum
Route::get('/datasekolahumum', [DataSekolahUmumController::class, 'index']);
Route::get('/datasekolahumum/tambahsekolahumum', [DataSekolahUmumController::class, 'create']);
Route::post('/datasekolahumum', [DataSekolahUmumController::class, 'store']);

// Controller Data Absensi Siswa
Route::get('/dataabsensi', [DataAbsensiController::class, 'index']);
Route::get('/dataabsensi/tambahabsensi', [DataAbsensiController::class, 'create']);
Route::post('/datasiswa', [DataSiswaController::class, 'store']);

// Controller Data Penilain Hasil Belajar
Route::get('/penilaianhasilbelajar', [PenilaianHasilBelajarController::class, 'index']);

// Controller Penilain Hasil Belajar
Route::get('/datanilaisiswa/tugasharian', [TugasSiswaController::class, 'index']);
Route::get('/datanilaisiswa/ulanganharian', [UlanganHarianController::class, 'index']);
Route::get('/datanilaisiswa/ujiantengahsemester', [UTSController::class, 'index']);
Route::get('/datanilaisiswa/ujianakhirsemester', [UASController::class, 'index']);

Route::get('/datanilaisiswa/ubahtugasharian', [TugasSiswaController::class, 'create']);
Route::get('/datanilaisiswa/ubahulanganharian', [UlanganHarianController::class, 'create']);
Route::get('/datanilaisiswa/ubahujiantengahsemester', [UTSController::class, 'create']);
Route::get('/datanilaisiswa/ubahujianakhirsemester', [UASController::class, 'create']);

Route::post('/datanilaisiswa/tugasharian', [TugasSiswaController::class, 'store']);
Route::post('/datanilaisiswa/ulanganharian', [UlanganHarianController::class, 'store']);
Route::post('/datanilaisiswa/ujiantengahsemester', [UTSController::class, 'store']);
