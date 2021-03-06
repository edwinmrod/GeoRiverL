<?php

namespace GeoRiver\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class travel
 * @package GeoRiver\Models
 * @version November 15, 2016, 3:56 am UTC
 */
class travel extends Model
{
    use SoftDeletes;

    public $table = 'travels';
    
    public $primaryKey = ('id');
    
    protected $dates = ['deleted_at'];


    public $fillable = [
        'nameTravel',
        'description',
        'course',
        'password',
        'state',
        'programme'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nameTravel' => 'string',
        'description' => 'string',
        'course' => 'string',
        'password' => 'string',
        'state' => 'string',
        'programme' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nameTravel' => 'required',
        'description' => 'required',
        'course' => 'required',
        'password' => 'required',
        'state' => 'required',
        'programme' => 'required'
    ];



     public function users()
    {
        return $this->belongsToMany('GeoRiver\Models\user','travel_users')->withPivot('user_id');
    }
    
}
