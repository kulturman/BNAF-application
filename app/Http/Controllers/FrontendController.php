<?php

namespace App\Http\Controllers;

use App\Repositories\SiteConfigRepository;

class FrontendController extends Controller
{
    private SiteConfigRepository $siteConfigRepository;

    public function __construct(SiteConfigRepository $siteConfigRepository)
    {
        $this->siteConfigRepository = $siteConfigRepository;
    }

    public function index() {
        $config = $this->siteConfigRepository->get();
        return view('frontend', compact('config'));
    }
}
