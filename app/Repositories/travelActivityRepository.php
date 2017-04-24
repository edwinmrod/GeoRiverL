<?php

namespace App\Repositories;

use App\Models\travelActivity;
use InfyOm\Generator\Common\BaseRepository;

class travelActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_activity',
        'id_travel'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return travelActivity::class;
    }
}
