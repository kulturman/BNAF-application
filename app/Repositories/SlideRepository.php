<?php

namespace App\Repositories;

use App\Models\Slide;
use App\Repositories\BaseRepository;

/**
 * Class SlideRepository
 * @package App\Repositories
 * @version September 13, 2023, 2:46 am UTC
*/

class SlideRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        'image',
        'order'
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
        return Slide::class;
    }
}
