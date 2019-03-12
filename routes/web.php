<?php

//index
Route::get('/', 'HomeController@index')->name('home');

//login - register
Auth::routes();

//Data emas
Route::resource('/pages/dataemas', 'DataEmasController')->except([
	'create', 'show'
]);

//rlb
Route::resource('pages/rlb', "RLBController")->only('index', 'store');

//prediksi
Route::resource('pages/prediksi', "HasilPrediksiController")->except([
	'create', 'show'
]);

//Datatables data emas
Route::get('/table/emas', 'DataEmasController@datatables')->name('data.emas');
//Datatables prediksi
Route::get('/table/prediksi', 'HasilPrediksiController@datatables')->name('prediksi.emas');

//about
Route::get('pages/about', 'HomeController@about')->name('about.index');

// Semua laporan
Route::get('pages/semua-laporan', 'HasilPrediksiController@semuaLaporan')->name('semua.laporan');

// Cetak by id
Route::get('pages/laporan/{id}', 'HasilPrediksiController@laporan')->name('laporan');