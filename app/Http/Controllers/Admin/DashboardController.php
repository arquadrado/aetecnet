<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\ProjectImage;

class DashboardController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

    public function submit()
    {
        

    }
}