<?php

namespace App\Repositories;

use App\Models\travelUser;
use InfyOm\Generator\Common\BaseRepository;

class travelUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idTravel',
        'idUser'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return travelUser::class;
    }
}
