<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\FlashInfoRepository;
use App\Repositories\SiteConfigRepository;
use App\Repositories\SlideRepository;
use App\Repositories\StatRepository;

class FrontendController extends Controller
{
    private SiteConfigRepository $siteConfigRepository;
    private SlideRepository $slideRepository;
    private ArticleRepository $articleRepository;
    private StatRepository $statRepository;
    private FlashInfoRepository $flashInfoRepository;

    public function __construct(
        SiteConfigRepository $siteConfigRepository,
        SlideRepository $slideRepository,
        ArticleRepository $articleRepository,
        StatRepository $statRepository,
        FlashInfoRepository  $flashInfoRepository
    )
    {
        $this->siteConfigRepository = $siteConfigRepository;
        $this->slideRepository = $slideRepository;
        $this->articleRepository = $articleRepository;
        $this->statRepository = $statRepository;
        $this->flashInfoRepository = $flashInfoRepository;
    }

    public function index() {
        $config = $this->siteConfigRepository->get();
        $sliders = $this->slideRepository->all();
        $articles = $this->articleRepository->lastArticles();
        $stats = $this->statRepository->all();
        $flashInfos = $this->flashInfoRepository->all();

        return view('frontend.index', compact('config', 'sliders', 'articles', 'stats', 'flashInfos'));
    }

    public function showArticle(Article $article) {
        $relatedArticles = $this->articleRepository->relatedArticles($article->id);
        return view('frontend.article', compact('article', 'relatedArticles'));
    }

    public function form() {
        return view('frontend.form');
    }
}
