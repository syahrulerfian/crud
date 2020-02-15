<?php

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
    return view('welcome');
});

//Relasi
Route::get('penulis',function(){
      $penulis = \App\User::find(1);

      foreach ($penulis->$artikel as $data) {
          echo "Judul : $data->judul<br>";
          echo "Deskripsi : $data->deskripsi<br>";
          echo "Slug : $data->slug<br>";
          echo "<hr>";
      }
});

// Relasi
use App\dosen;
use App\hobi;
use App\Mahasiswa;

Route::get('relasi-1' , function () {
    # Mencari mahasiswa dengan NIM 1010101
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();

    # Menampilkan nama wali dari mahasiswa tsb
    return $mahasiswa->wali->nama;
});

Route::get('relasi-2' , function () {
    # Mencari mahasiswa dengan NIM 1010101
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();

    # Menampilkan nama dosen pembimbing dari mahasiswa tsb
    return $mahasiswa->dosen->nama;
});

Route::get('relasi-3' , function () {
    # Mencari dosen dengan yang bernama Abdul Musthafa
    $dosen = Dosen::where('nama', '=', 'Abdul Musthafa')->first();

    # Menampilkan seluruh data mahasiswa dari Dosen Abdul Musthafa
    foreach ($dosen->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama . 
        ' <strong> ' . $temp->$nim . '</strong></li>';
});

Route::get('relasi-4' , function () {
    # Mencari data Mahasiswa yang memiliki nama Syahrul
    $novay = Mahasiswa::where('nama', '=', 'Syahrul')->first();

    # Menampilkan seluruh data mahasiswa yang bernama Syahrul
    foreach ($novay->hobi as $temp)
        echo '<li>' . $temp->$hobi . '</li>';
});

Route::get('relasi-5' , function () {
    # Mencari data hobi Mandi Hujan
    $mandi_hujan = Hobi::where('hobi', '=', 'Mandi Hujan')->first();

    # Menampilkan semua mahasiswa yang mempunyai
    foreach ($mandi_hujan->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama . 
        ' <strong> ' . $temp->$nim . '</strong></li>';
});

// Siswa

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Tabungan
Route::resource('siswa', 'SiswaController');
Route::get('tabungan/report', 'TabunganController@jumlah_tabungan');
Route::resource('tabungan', 'TabunganController');
Route::resource('hobi', 'HobiController');

