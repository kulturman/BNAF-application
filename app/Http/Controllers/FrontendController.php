<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\SiteConfigRepository;
use App\Repositories\SlideRepository;
use App\Repositories\StatRepository;

class FrontendController extends Controller
{
    private SiteConfigRepository $siteConfigRepository;
    private SlideRepository $slideRepository;
    private ArticleRepository $articleRepository;
    private StatRepository $statRepository;

    public function __construct(
        SiteConfigRepository $siteConfigRepository,
        SlideRepository $slideRepository,
        ArticleRepository $articleRepository,
        StatRepository $statRepository
    )
    {
        $this->siteConfigRepository = $siteConfigRepository;
        $this->slideRepository = $slideRepository;
        $this->articleRepository = $articleRepository;
        $this->statRepository = $statRepository;
    }

    public function index() {
        $config = $this->siteConfigRepository->get();
        $sliders = $this->slideRepository->all();
        $articles = $this->articleRepository->lastArticles();
        $stats = $this->statRepository->all();

        return view('frontend.index', compact('config', 'sliders', 'articles', 'stats'));
    }
}
