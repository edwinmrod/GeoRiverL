<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class travelActivity
 * @package App\Models
 * @version April 24, 2017, 11:43 am COT
 */
class travelActivity extends Model
{
    use SoftDeletes;

    public $table = 'travel_activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_activity',
        'id_travel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_activity' => 'integer',
        'id_travel' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_activity' => 'required',
        'id_travel' => 'required'
    ];

    
}
