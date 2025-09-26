<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Skill;
use App\Models\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $userAgency = Auth::user()->load('agency');
        return view('agency.index', [
            'userAgency' => $userAgency
        ]);
    }

    public function show(Agency $agency){
        return view('agency.show', [
            'agency' => $agency
        ]);
    }
    
    public function update($id)
    {
        dd($id);
    }
}
