<?php

namespace GeoRiver\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
/**
 * Class activity
 * @package GeoRiver\Models
 * @version November 15, 2016, 4:13 am UTC
 */
class activity extends Model
{
    use SoftDeletes;
    use PostgisTrait;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nameActivity',
        'description',
    ];

    protected $postgisFields = [
        'coordinateActivity',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nameActivity' => 'string',
        'description'=>'string',
        'lat'=>'number',
        'long'=>'number',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nameActivity' => 'required',
        'description'=>'required',
        'lat'=>'required',
        'long'=>'required',
    ];
    
}
