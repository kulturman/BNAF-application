<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\SiteConfigRepository;
use App\Repositories\SlideRepository;

class FrontendController extends Controller
{
    private SiteConfigRepository $siteConfigRepository;
    private SlideRepository $slideRepository;
    private ArticleRepository $articleRepository;

    public function __construct(
        SiteConfigRepository $siteConfigRepository,
        SlideRepository $slideRepository,
        ArticleRepository $articleRepository
    )
    {
        $this->siteConfigRepository = $siteConfigRepository;
        $this->slideRepository = $slideRepository;
        $this->articleRepository = $articleRepository;
    }

    public function index() {
        $config = $this->siteConfigRepository->get();
        $sliders = $this->slideRepository->all();
        $articles = $this->articleRepository->lastArticles();

        return view('frontend', compact('config', 'sliders', 'articles'));
    }
}
