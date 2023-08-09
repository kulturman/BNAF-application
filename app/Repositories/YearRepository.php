<?php

namespace App\Repositories;

use App\Models\Year;
use App\Repositories\BaseRepository;

/**
 * Class YearRepository
 * @package App\Repositories
 * @version May 15, 2022, 11:12 am UTC
*/

class YearRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start',
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Year::class;
    }
}
