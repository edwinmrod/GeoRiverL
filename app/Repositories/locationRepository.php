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
        'coordinate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return location::class;
    }
}
