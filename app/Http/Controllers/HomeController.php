<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Job\JobPostingService;
use App\Services\Agency\AgencyService;
use Spatie\Crawler\Crawler;

class HomeController extends Controller
{
    public function index(JobPostingService $job, AgencyService $agency)
    {
        return view('home.index',[ //replace with home/maintenance.blade.php when in maintenance mode
            'jobs' => $job->recentJobs(2),
            'agencies' => $agency->featured(2),
        ]);
    }
}
