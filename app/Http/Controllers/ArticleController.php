<?php

namespace App\Http\Controllers;

use App\DataTables\ArticleDataTable;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the Article.
     *
     * @param ArticleDataTable $articleDataTable
     * @return Response
     */
    public function index(ArticleDataTable $articleDataTable)
    {
        return $articleDataTable->render('articles.index');
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateArticleRequest $request)
    {
        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->articleRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/articles.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Display the specified Article.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param int $id
     * @param UpdateArticleRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/articles.singular')]));
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->articleRepository->update($inputs, $id);
        $message = __('messages.updated', ['model' => __('models/articles.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/articles.singular')]));
        }

        $this->articleRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/articles.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
