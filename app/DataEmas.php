<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataEmas extends Model
{
	//table name
	protected $table = 'data_emas';
	
    //disable timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bulan', 'hargaemas', 'inflasi', 'kursdollar', 'sukubunga'
    ];
}