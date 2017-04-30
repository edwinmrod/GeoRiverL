<?php

namespace GeoRiver\Repositories;

use GeoRiver\Models\location;
use InfyOm\Generator\Common\BaseRepository;

class locationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nameLocation',
        'latitude',
        'longitude',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return location::class;
    }
}
