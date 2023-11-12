<?php

namespace App\Repositories;

use App\Models\Stat;
use App\Repositories\BaseRepository;

/**
 * Class StatRepository
 * @package App\Repositories
 * @version September 13, 2023, 4:30 am UTC
 */
class StatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'chiffres',
        'text',
        'icon'
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
        return Stat::class;
    }
}
