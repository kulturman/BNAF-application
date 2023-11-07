<?php

namespace App\Repositories;

use App\Models\Report;
use App\Models\User;
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

    public function getUserAssignedReports(int $userId) {
        return $this->model->where('owner_id', $userId)->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getCurrentUserViewableReports() {
        $qb = $this->model->newQuery()->orderBy('created_at', 'DESC');
        $user = auth()->user();

        if (!$user->super_admin) {
            $qb->where('agent_code', $user->agent_code);
            $qb->orWhereNull('agent_code')
            ->orWhere('owner_id', $user->id);
        }
        return $qb;
    }

}
