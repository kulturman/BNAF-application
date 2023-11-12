<?php

namespace App\Http\Controllers;


use App\Repositories\ReportRepository;
use App\Repositories\UserRepository;

class HomeController extends Controller
{
    private ReportRepository $reportRepository;
    private UserRepository $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ReportRepository $reportRepository,
        UserRepository   $userRepository
    )
    {
        $this->middleware('auth');
        $this->reportRepository = $reportRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $usersCount = $this->userRepository->count();
        $waitingReportsCount = $this->reportRepository->count(['validated' => false]);

        return view('home', compact('usersCount', 'waitingReportsCount'));
    }
}
