<?php

namespace GeoRiver\Repositories;

use GeoRiver\Models\variable;
use InfyOm\Generator\Common\BaseRepository;

class variableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nameVariable',
        'value',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return variable::class;
    }
}
