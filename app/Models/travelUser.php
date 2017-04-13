<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class activityUser
 * @package App\Models
 * @version November 15, 2016, 4:03 am UTC
 */
class travelUser extends Model
{
    use SoftDeletes;

    public $table = 'travel_users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'idTravel',
        'idUser'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idTravel' => 'integer',
        'idUser' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idTravel' => 'required',
        'idUser' => 'required'
    ];

    
}
