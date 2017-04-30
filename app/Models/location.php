<?php

namespace GeoRiver\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class location
 * @package GeoRiver\Models
 * @version November 15, 2016, 3:14 pm UTC
 */
class location extends Model
{
    use SoftDeletes;

    public $table = 'locations';
    
    protected $dates = ['deleted_at'];


    public $fillable = [
        'nameLocation',
        'latitude',
        'longitude'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nameLocation' => 'string',
        'latitude'=>'number',
        'longitude'=>'number',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nameLocation' => 'required',
        'latitude'=>'required',
        'longitude'=>'required',
    ];
    
}
