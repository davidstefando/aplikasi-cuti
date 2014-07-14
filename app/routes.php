<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//handle login & logout
Route::post('login', function(){
    if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
        return Redirect::intended('pengajuan');
    } else {
        return Redirect::to('/');
    }
});

Route::get('login', function(){
	return Redirect::to('/');
});

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
});


//public view
Route::get('/', array('uses' => 'SiteController@showHomePage'));

Route::group(array('before' => 'auth'), function(){
	Route::get('pengajuan', array('uses' => 'PengajuanController@showPengajuanForm'));
	Route::post('pengajuan', array('uses' => 'PengajuanController@showVerifikasi'));
	Route::get('pengajuan/ajukan', array('uses' => 'PengajuanController@ajukanCuti'));

	Route::get('status', array('uses' => 'PengajuanController@getStatusPengajuan'));
	Route::get('status/cetak/{id}', array('uses' => 'PengajuanCuti@showSuratCuti'));
	Route::get('status/batalkan/{id}', array('uses' => 'PengajuanController@batalkanPengajuan'));

	Route::get('saldo', array('uses' => 'CutiController@showSaldoCuti'));

	Route::get('history', array('uses' => 'CutiController@showHistoryCuti'));
});

Route::get('konfirmasi', array('uses' => 'KonfirmasiController@showDataKonfirmasi'));
Route::get('konfirmasi/setuju/{id}', array('as' => 'setuju', 'uses' => 'KonfirmasiController@setuju'));
Route::get('konfirmasi/tolak/{id}', array('as' => 'tolak', 'uses' => 'KonfirmasiController@tolak'));
Route::get('konfirmasi/notifikasi', array('uses' => 'KonfirmasiController@getNotification'));

Route::resource('karyawan', 'KaryawanController');
Route::get('karyawan/username-password/{id}', array('as' => 'detail', 'uses' => 'KaryawanController@showUsernameAndPassword'));

Route::resource('bagian', 'BagianController');

Route::resource('pimpinan', 'PimpinanController');

Route::resource('hr', 'HrController');

Route::get('laporan', array('uses' => 'CutiController@showFormKriteriaLaporan'));
Route::post('laporan/{jenis}', array('uses' => 'CutiController@showLaporan'));

Route::get('cetak/{id}', array('as' => 'cetak', 'uses' => 'PengajuanController@showSuratCuti'));

//sugesti autocomplete data karyawan berdasarkan "nik"
Route::get('autocomplete/{id}', array('uses' => 'KaryawanController@getAutocompleteSuggestion'));

require "menu.php";
