<?php

namespace App\Http\Controllers;

use App\Member;
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
        return view('main-content', ['members' => $members] );
    }

    public function showProject($slug = null)
    {
        if($slug === 'aetec-mo'){
            dd('hey');    
        } elseif ($slug === 'stepaetec') {
            dd('ho');
        }
        
        return view('project');
    }
}