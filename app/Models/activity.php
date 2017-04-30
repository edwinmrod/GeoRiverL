<?php

namespace GeoRiver\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class activity
 * @package GeoRiver\Models
 * @version November 15, 2016, 4:13 am UTC
 */
class activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nameActivity',
        'description',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nameActivity' => 'string',
        'description'=>'string',
        'latitude'=>'number',
        'longitude'=>'number',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nameActivity' => 'required',
        'description'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
    ];
    
}
