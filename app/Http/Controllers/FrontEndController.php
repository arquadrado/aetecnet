<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use App\Category;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function mainPage()
    {   
        $members =  Member::orderBy('name', 'asc')->get();
        $companies = [
            'Aetec-Mo'  => 'aetec-mo',
            'Stepaetec' => 'stepaetec',
        ];
        
        return view('main-content', [
            'members'          => $members,
            'companies'        => $companies,
        ]);
    }

    public function showProjects($company, $projectId = null)
    {
        $urlComponents = explode('projects', url()->current());
        $baseURL = $urlComponents[0];
        $categories = Category::all();
        $companies = [
            'Aetec-Mo'  => 'aetec-mo',
            'Stepaetec' => 'stepaetec',
        ];

        $current_company = $company;

        if(is_null($projectId)){

            return view('company-projects', [
                'categories' => $categories,
                'companies'  => $companies, 
                'current_company' => $current_company,
                'url'        => $baseURL,
            ]);
        }

        $project = Project::find($projectId);
        return view('project', [
            'companies'  => $companies, 
            'current_company' => $current_company,
            'project' => $project,
            'url'        => $baseURL,
        ]);
    }
}