<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class user
 * @package App\Models
 * @version November 15, 2016, 2:28 pm UTC
 */
class user extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    public $primaryKey = ('id');
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'role' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required'
    ];

    

        public function travels()
    {
        return $this->belongsToMany('App\Models\travel','travel_users')->withPivot('travel_id');
    }
     
}
