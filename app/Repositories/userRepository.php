<?php

namespace GeoRiver\Repositories;

use GeoRiver\Models\user;
use InfyOm\Generator\Common\BaseRepository;

class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return user::class;
    }
}
