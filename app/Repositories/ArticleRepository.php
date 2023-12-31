<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\BaseRepository;

/**
 * Class ArticleRepository
 * @package App\Repositories
 * @version September 13, 2023, 2:45 am UTC
 */
class ArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'cover_image'
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
        return Article::class;
    }

    public function lastArticles()
    {
        return $this->model->orderBy('created_at', 'desc')->limit(5)->get();
    }

    public function relatedArticles(int $articleId)
    {
        return $this->model->orderBy('created_at', 'desc')->where('id', '<>', $articleId)->limit(5)->get();
    }
}
