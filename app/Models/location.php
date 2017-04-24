<?php

namespace GeoRiver\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
/**
 * Class location
 * @package GeoRiver\Models
 * @version November 15, 2016, 3:14 pm UTC
 */
class location extends Model
{
    use SoftDeletes;
    use PostgisTrait;

    public $table = 'locations';
    
    protected $dates = ['deleted_at'];


    public $fillable = [
        'nameLocation',
        
    ];
    protected $postgisFields = [
        'coordinate',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nameLocation' => 'string',
        'lat'=>'number',
        'long'=>'number',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nameLocation' => 'required',
        'lat'=>'required',
        'long'=>'required',
    ];
    
}
