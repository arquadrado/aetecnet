<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;

class DashboardController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

    public function submit()
    {
        $request = request();
        $files = $request->file('images');
        $destinationPath = base_path().'/public/img';
        foreach ($files as $file) {
            $imageTempName = $file->getPathname();
            $imageName = $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);
        }
        $project = new Project;
        $project->name = $request->name;
        $project->category_id = $request->category_id;

        $project->save();
    }
}