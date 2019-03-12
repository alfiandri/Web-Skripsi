<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPrediksi extends Model
{
	//table name
	protected $table = 'hasil_prediksis';
	
   	//disable timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bulan', 'inflasi', 'kursdollar', 'sukubunga'
    ];
}
