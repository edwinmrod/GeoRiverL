<?php

namespace GeoRiver\Repositories;

use GeoRiver\Models\travelLocation;
use InfyOm\Generator\Common\BaseRepository;

class travelLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idTravel',
        'idLocation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return travelLocation::class;
    }
}
