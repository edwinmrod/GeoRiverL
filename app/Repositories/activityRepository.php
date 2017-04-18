<?php

namespace GeoRiver\Repositories;

use GeoRiver\Models\activity;
use InfyOm\Generator\Common\BaseRepository;

class activityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nameActivity',
        'nameMember',
        'coordinateActivity',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return activity::class;
    }
}
