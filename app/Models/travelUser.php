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
    public $primaryKey = ('id');

    protected $dates = ['deleted_at'];


    public $fillable = [
        'travel_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'travel_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'travel_id' => 'required',
        'user_id' => 'required'
    ];

    
}
