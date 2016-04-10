<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use App\Category;
use App\Company;
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
        
        $aetecProjects = Project::where([
                                    'selected' => 1,
                                    'company'  => 'aetec-mo'
                                ])->get();

        $stepaetecProjects = Project::where([
                                    'selected' => 1,
                                    'company'  => 'stepaetec'
                                ])->get();
        return view('main-content', [
            'members'           => $members,
            'companies'         => $this->getCompanies(),
            'stepaetecProjects' => $stepaetecProjects,
            'aetecProjects'     => $aetecProjects,
            'url'               => url()->current().'/',
        ]);
    }

    public function showProjects($company, $projectId = null)
    {
        $this->prepareProjects($company);
        $urlComponents = explode('projects', url()->current());
        $baseURL = $urlComponents[0];
        $categories = $this->prepareProjects($company);
        $categoriesIndexes = [];

        foreach ($categories as $name => $projects) {
            array_push($categoriesIndexes, $name);
        }

        $current_company = $company;

        if(is_null($projectId)){

            return view('company-projects', [
                'categories' => $categories,
                'categoriesIndexes' => $categoriesIndexes,
                'companies'  => $this->getCompanies(),
                'current_company' => $current_company,
                'url'        => $baseURL,
            ]);
        }

        $project = Project::find($projectId);
        return view('project', [
            'companies'  => $this->getCompanies(), 
            'current_company' => $current_company,
            'project' => $project,
            'url'        => $baseURL,
        ]);
    }

    public function prepareProjects($company)
    {
        $companies = $this->getCompanies();
        foreach ($companies as $db_company) {
            if($db_company['slug'] === $company){
                $currentCompany = Company::where('name', $db_company['name'])->first();
            }
        }
        $categories = Category::where('company_id', $currentCompany->id )->get();
        $data = [];

        foreach ($categories as $category) {
            $data[$category->name] = $category->projects->where('company', $company);
        }
        return $data;
    }

    public function getCompanies()
    {
        return $companies = [
            [
                'name' => 'Aetec-Mo',
                'slug' => 'aetec-mo'
            ],
            [
                'name' => 'Stepaetec',
                'slug' => 'stepaetec'
            ],
        ];
    }
}