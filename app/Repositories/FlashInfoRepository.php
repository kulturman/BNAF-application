<?php

namespace App\Repositories;

use App\Models\FlashInfo;
use App\Repositories\BaseRepository;

/**
 * Class FlashInfoRepository
 * @package App\Repositories
 * @version November 3, 2023, 12:35 am UTC
 */
class FlashInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content'
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
        return FlashInfo::class;
    }
}
