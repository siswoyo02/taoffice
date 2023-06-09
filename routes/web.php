<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\RekapDataController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratkeluarController;
use App\Http\Controllers\JobdeskController;
use App\Http\Controllers\ProjectController;
use Carbon\Carbon;
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
Route::middleware('auth','log.activity')->group(function () {
    Route::post('/logout', [authController::class, 'logout']);
    Route::put('/karyawan/proses-edit-shift/{id}', [karyawanController::class, 'prosesEditShift']);
    Route::get('/my-location', [AbsenController::class, 'myLocation']);
    Route::get('/absen', [AbsenController::class, 'index']);
    Route::put('/absen/masuk/{id}', [AbsenController::class, 'absenMasuk']);
    Route::put('/absen/pulang/{id}', [AbsenController::class, 'absenPulang']);
    Route::get('/maps/{lat}/{long}', [AbsenController::class, 'maps']);
    Route::get('/my-absen', [AbsenController::class, 'myAbsen']);
    Route::get('/lembur', [LemburController::class, 'index']);
    Route::post('/lembur/masuk', [LemburController::class, 'masuk']);
    Route::put('/lembur/pulang/{id}', [LemburController::class, 'pulang']);
    Route::get('/my-lembur', [LemburController::class, 'myLembur']);
    Route::get('/cuti', [CutiController::class, 'index']);
    Route::post('/cuti/tambah', [CutiController::class, 'tambah']);
    Route::delete('/cuti/delete/{id}', [CutiController::class, 'delete']);
    Route::get('/cuti/edit/{id}', [CutiController::class, 'edit']);
    Route::put('/cuti/proses-edit/{id}', [CutiController::class, 'editProses']);
    Route::get('/my-profile', [KaryawanController::class, 'myProfile']);
    Route::put('/my-profile/update/{id}', [KaryawanController::class, 'myProfileUpdate']);
    Route::get('/my-profile/edit-password', [KaryawanController::class, 'editPassMyProfile']);
    Route::put('/my-profile/edit-password-proses/{id}', [KaryawanController::class, 'editPassMyProfileProses']);
    Route::get('/my-dokumen', [DokumenController::class, 'myDokumen']);
    Route::get('/my-dokumen/tambah', [DokumenController::class, 'myDokumenTambah']);
    Route::post('/my-dokumen/tambah-proses', [DokumenController::class, 'myDokumenTambahProses']);
    Route::get('/my-dokumen/edit/{id}', [DokumenController::class, 'myDokumenEdit']);
    Route::put('/my-dokumen/edit-proses/{id}', [DokumenController::class, 'myDokumenEditProses']);
    Route::delete('/my-dokumen/delete/{id}', [DokumenController::class, 'myDokumenDelete']);
});
Route::get('/', [authController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [authController::class, 'register'])->middleware('guest');
Route::post('/register-proses', [authController::class, 'registerProses'])->middleware('guest');
Route::post('/login-proses', [authController::class, 'loginProses'])->middleware('guest');
Route::get('/dashboard', [dashboardController::class, 'index']);
Route::get('/activity-logs', 'App\Http\Controllers\ActivityLogController@index')->name('activity-logs.index');
Route::post('/logout', [authController::class, 'logout'])->middleware('auth');
Route::get('/karyawan', [karyawanController::class, 'index'])->middleware('admin');
Route::get('/karyawan/tambah-karyawan', [karyawanController::class, 'tambahKaryawan'])->middleware('admin');
Route::post('/karyawan/tambah-karyawan-proses', [karyawanController::class, 'tambahKaryawanProses'])->middleware('admin');
Route::get('/karyawan/detail/{id}', [karyawanController::class, 'detail'])->middleware('admin');
Route::put('/karyawan/proses-edit/{id}', [karyawanController::class, 'editKaryawanProses'])->middleware('admin');
Route::delete('/karyawan/delete/{id}', [karyawanController::class, 'deleteKaryawan'])->middleware('admin');
Route::get('/karyawan/edit-password/{id}', [karyawanController::class, 'editPassword'])->middleware('admin');
Route::put('/karyawan/edit-password-proses/{id}', [karyawanController::class, 'editPasswordProses'])->middleware('admin');
Route::resource('/shift', ShiftController::class)->middleware('admin');
Route::get('/karyawan/shift/{id}', [karyawanController::class, 'shift'])->middleware('admin');
Route::post('/karyawan/shift/proses-tambah-shift', [karyawanController::class, 'prosesTambahShift'])->middleware('admin');
Route::delete('/karyawan/delete-shift/{id}', [karyawanController::class, 'deleteShift'])->middleware('admin');
Route::get('/karyawan/edit-shift/{id}', [karyawanController::class, 'editShift'])->middleware('admin');
Route::put('/karyawan/proses-edit-shift/{id}', [karyawanController::class, 'prosesEditShift'])->middleware('auth');
//absen
Route::get('/absen', [AbsenController::class, 'index'])->middleware('auth');
Route::get('/my-location', [AbsenController::class, 'myLocation'])->middleware('auth');
Route::put('/absen/masuk/{id}', [AbsenController::class, 'absenMasuk'])->middleware('auth');
Route::put('/absen/pulang/{id}', [AbsenController::class, 'absenPulang'])->middleware('auth');
Route::get('/data-absen', [AbsenController::class, 'dataAbsen'])->middleware('admin');
Route::get('/data-absen/{id}/edit-masuk', [AbsenController::class, 'editMasuk'])->middleware('admin');
Route::get('/maps/{lat}/{long}', [AbsenController::class, 'maps'])->middleware('auth');
Route::put('/data-absen/{id}/proses-edit-masuk', [AbsenController::class, 'prosesEditMasuk'])->middleware('admin');
Route::get('/data-absen/{id}/edit-pulang', [AbsenController::class, 'editPulang'])->middleware('admin');
Route::put('/data-absen/{id}/proses-edit-pulang', [AbsenController::class, 'prosesEditPulang'])->middleware('admin');
Route::delete('/data-absen/{id}/delete', [AbsenController::class, 'deleteAdmin'])->middleware('admin');
Route::get('/my-absen', [AbsenController::class, 'myAbsen'])->middleware('auth');
Route::get('/lembur', [LemburController::class, 'index'])->middleware('auth');
Route::post('/lembur/masuk', [LemburController::class, 'masuk'])->middleware('auth');
Route::put('/lembur/pulang/{id}', [LemburController::class, 'pulang'])->middleware('auth');
Route::get('/data-lembur', [LemburController::class, 'dataLembur'])->middleware('admin');
Route::get('/my-lembur', [LemburController::class, 'myLembur'])->middleware('auth');
Route::get('/rekap-data', [RekapDataController::class, 'index'])->middleware('admin');
//cuti
Route::get('/cuti', [CutiController::class, 'index'])->middleware('auth');
Route::post('/cuti/tambah', [CutiController::class, 'tambah'])->middleware('auth');
Route::delete('/cuti/delete/{id}', [CutiController::class, 'delete'])->middleware('auth');
Route::get('/cuti/edit/{id}', [CutiController::class, 'edit'])->middleware('auth');
Route::put('/cuti/proses-edit/{id}', [CutiController::class, 'editProses'])->middleware('auth');
Route::get('/data-cuti', [CutiController::class, 'dataCuti'])->middleware('admin');
Route::get('/data-cuti/tambah', [CutiController::class, 'tambahAdmin'])->middleware('admin');
Route::post('/data-cuti/getuserid', [CutiController::class, 'getUserId'])->middleware('admin');
Route::post('/data-cuti/proses-tambah', [CutiController::class, 'tambahAdminProses'])->middleware('admin');
Route::delete('/data-cuti/delete/{id}', [CutiController::class, 'deleteAdmin'])->middleware('admin');
Route::get('/data-cuti/edit/{id}', [CutiController::class, 'editAdmin'])->middleware('admin');
Route::put('/data-cuti/edit-proses/{id}', [CutiController::class, 'editAdminProses'])->middleware('admin');
///profil
Route::get('/my-profile', [KaryawanController::class, 'myProfile'])->middleware('auth');
Route::put('/my-profile/update/{id}', [KaryawanController::class, 'myProfileUpdate'])->middleware('auth');
Route::get('/my-profile/edit-password', [KaryawanController::class, 'editPassMyProfile'])->middleware('auth');
Route::put('/my-profile/edit-password-proses/{id}', [KaryawanController::class, 'editPassMyProfileProses'])->middleware('auth');
Route::get('/lokasi-kantor', [LokasiController::class, 'index'])->middleware('admin');
Route::put('/lokasi-kantor/{id}', [LokasiController::class, 'updateLokasi'])->middleware('admin');
Route::put('/lokasi-kantor/radius/{id}', [LokasiController::class, 'updateRadiusLokasi'])->middleware('admin');
Route::get('/reset-cuti', [KaryawanController::class, 'resetCuti'])->middleware('admin');
Route::put('/reset-cuti/{id}', [KaryawanController::class, 'resetCutiProses'])->middleware('admin');
//jabatan
Route::get('/jabatan', [jabatanController::class, 'index'])->middleware('admin');
Route::get('/jabatan/create', [jabatanController::class, 'create'])->middleware('admin');
Route::post('/jabatan/insert', [jabatanController::class, 'insert'])->middleware('admin');
Route::get('/jabatan/edit/{id}', [jabatanController::class, 'edit'])->middleware('admin');
Route::put('/jabatan/update/{id}', [jabatanController::class, 'update'])->middleware('admin');
Route::delete('/jabatan/delete/{id}', [jabatanController::class, 'delete'])->middleware('admin');
//dokumen
Route::get('/dokumen', [DokumenController::class, 'index'])->middleware('admin');
Route::get('/dokumen/tambah', [DokumenController::class, 'tambah'])->middleware('admin');
Route::post('/dokumen/tambah-proses', [DokumenController::class, 'tambahProses'])->middleware('admin');
Route::get('/dokumen/edit/{id}', [DokumenController::class, 'edit'])->middleware('admin');
Route::put('/dokumen/edit-proses/{id}', [DokumenController::class, 'editProses'])->middleware('admin');
Route::delete('/dokumen/delete/{id}', [DokumenController::class, 'delete'])->middleware('admin');
//my dokumen
Route::get('/my-dokumen', [DokumenController::class, 'myDokumen'])->middleware('auth');
Route::get('/my-dokumen/tambah', [DokumenController::class, 'myDokumenTambah'])->middleware('auth');
Route::post('/my-dokumen/tambah-proses', [DokumenController::class, 'myDokumenTambahProses'])->middleware('auth');
Route::get('/my-dokumen/edit/{id}', [DokumenController::class, 'myDokumenEdit'])->middleware('auth');
Route::put('/my-dokumen/edit-proses/{id}', [DokumenController::class, 'myDokumenEditProses'])->middleware('auth');
Route::delete('/my-dokumen/delete/{id}', [DokumenController::class, 'myDokumenDelete'])->middleware('auth');
//client
Route::get('/client', [ClientController::class, 'index'])->middleware('auth');
Route::get('/client/create', [ClientController::class, 'create'])->middleware('auth');
Route::post('/client/insert', [ClientController::class, 'insert'])->middleware('auth');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->middleware('auth');
Route::put('/client/update/{id}', [ClientController::class, 'update'])->middleware('auth');
Route::delete('/client/delete/{id}', [ClientController::class, 'delete'])->middleware('auth');
//aset
Route::get('/aset', [AsetController::class, 'index'])->middleware('auth');
Route::get('/aset/create', [AsetController::class, 'create'])->middleware('auth');
Route::post('/aset/insert', [AsetController::class, 'insert'])->middleware('auth');
Route::get('/aset/edit/{id}', [AsetController::class, 'edit'])->middleware('auth');
Route::put('/aset/update/{id}', [AsetController::class, 'update'])->middleware('auth');
Route::delete('/aset/delete/{id}', [AsetController::class, 'delete'])->middleware('auth');
//surat
Route::get('/surat', [SuratController::class, 'index'])->middleware('auth');
Route::get('/surat/create', [SuratController::class, 'create'])->middleware('auth');
Route::post('/surat/insert', [SuratController::class, 'insert'])->middleware('auth');
Route::get('/surat/edit/{id}', [SuratController::class, 'edit'])->middleware('auth');
Route::put('/surat/update/{id}', [SuratController::class, 'update'])->middleware('auth');
Route::delete('/surat/delete/{id}', [SuratController::class, 'delete'])->middleware('auth');
//surat keluar
Route::get('/srtkeluar', [SuratkeluarController::class, 'index'])->middleware('auth');
Route::get('/srtkeluar/create', [SuratkeluarController::class, 'create'])->middleware('auth');
Route::post('/srtkeluar/insert', [SuratkeluarController::class, 'insert'])->middleware('auth');
Route::get('/srtkeluar/edit/{id}', [SuratkeluarController::class, 'edit'])->middleware('auth');
Route::put('/srtkeluar/update/{id}', [SuratkeluarController::class, 'update'])->middleware('auth');
Route::delete('/srtkeluar/delete/{id}', [SuratkeluarController::class, 'delete'])->middleware('auth');
//jobdesk
Route::get('/jobdesk', [JobdeskController::class, 'index'])->middleware('auth');
Route::get('/jobdesk/create', [JobdeskController::class, 'create'])->middleware('auth');
Route::post('/jobdesk/insert', [JobdeskController::class, 'insert'])->middleware('auth');
Route::get('jobdesk/edit/{id}', [JobdeskController::class, 'edit'])->middleware('auth');
Route::put('/jobdesk/update/{id}', [JobdeskController::class, 'update'])->middleware('auth');
Route::delete('/jobdesk/delete/{id}', [JobdeskController::class, 'delete'])->middleware('auth');
//project
Route::get('/project', [ProjectController::class, 'index'])->middleware('auth');
Route::get('/project/create', [ProjectController::class, 'create'])->middleware('auth');
Route::post('/project/insert', [ProjectController::class, 'insert'])->middleware('auth');
Route::get('project/edit/{id}', [ProjectController::class, 'edit'])->middleware('auth');
Route::put('/project/update/{id}', [ProjectController::class, 'update'])->middleware('auth');
Route::delete('/project/delete/{id}', [ProjectController::class, 'delete'])->middleware('auth');
