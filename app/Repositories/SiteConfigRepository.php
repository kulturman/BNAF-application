<?php

namespace App\Repositories;

use App\Models\SiteConfig;
use App\Repositories\BaseRepository;

/**
 * Class SiteConfigRepository
 * @package App\Repositories
 * @version September 13, 2023, 2:39 am UTC
*/

class SiteConfigRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'director_word',
        'director_photo',
        'director_name',
        'phone',
        'email',
        'address',
        'facebook',
        'linkedin',
        'twitter',
        'youtube'
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
        return SiteConfig::class;
    }
}
