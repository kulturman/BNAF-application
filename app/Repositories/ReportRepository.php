<?php

namespace App\Repositories;

use App\Models\Report;
use App\Repositories\BaseRepository;

/**
 * Class ReportRepository
 * @package App\Repositories
 * @version October 18, 2023, 1:04 pm UTC
*/

class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'localite',
        'validated',
        'structure',
        'photo',
        'photoInput',
        'text',
        'repere',
        'nip',
        'region',
        'province',
        'commune'
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
        return Report::class;
    }
}
