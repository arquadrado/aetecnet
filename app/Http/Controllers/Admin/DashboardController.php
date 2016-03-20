<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Member;
use App\ProjectImage;

use File;

class DashboardController extends Controller
{
    public function show()
    {
        $projects = Project::all();
        return view('admin.dashboard', [ 'projects' => $projects ]);
    }

    public function submitProject()
    {
        $request = request();
        //dd($request);
        $id = request()->id;
        $project = $id === '' || is_null($id) ? new Project : Project::find($id);

        //dd($request->imagesToDelete);
        if(!is_null($request->imagesToDelete)){
                foreach ($request->imagesToDelete as $image) {
                    $imgToDel = ProjectImage::find($image);
                    File::Delete(base_path().'/public/'.$imgToDel->path);
                    $imgToDel->delete();
                }
        }

        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->save();
        $files = $request->file('images');
        $destinationPath = base_path().'/public/img/projects';
        if(!is_null(head($files))){
            foreach ($files as $file) {
                $imageName = $this->checkImageName($file->getClientOriginalName());
                $file->move($destinationPath, $imageName);
                $projectImage = new ProjectImage;
                $projectImage->name = $imageName; 
                $projectImage->project_id = $project->id;
                $projectImage->path = 'img/projects/'.$imageName;
                $projectImage->save();
            }
        }
        return redirect(route('projects'));
    }

    public function checkImageName($name){
        $imageIndex = ProjectImage::orderBy('id', 'desc')->first()->id + 1;
        $nameExploded = explode('.', $name);
        $imgName = $nameExploded[0];
        $imgExtension = $nameExploded[1];
        return $imgName.'-'.$imageIndex.'.'.$imgExtension;

    }

    public function projects()
    {
        $projects = Project::all();
        return view('admin.project.table', [ 'projects' => $projects ]);
    }

    public function editProject($id = null)
    {
        $project = Project::find($id);
        $images = [];
        $urlComponents = explode('admin', url()->current());
        $baseURL = $urlComponents[0];
        if(!is_null($project)){
            $images = $project->images;
        }
        return view('admin.project.edit', ['project' => $project, 'images' => $images, 'url' => $baseURL]);
    }

    public function members()
    {
        $members = Member::all();
        return view('admin.member.table', [ 'members' => $members ]);
    }
    public function editMember($id = null)
    {
        $member = Member::find($id);
        return view('admin.member.edit', ['member' => $member]);
    }

    public function submitMember()
    {
        $id = request()->id;
        $member = $id === '' ? new Member : Member::find($id);
        $member->name = request()->name;
        $member->function = request()->function;
        $this->setMemberImage(request()->file('image'), $member);
        $member->save();
        return redirect(route('members'));
    }

    public function deleteMember()
    {
        Member::destroy(request()->id);
        return redirect(route('members'));
    }

    public function setMemberImage($image, $member)
    {
        if(is_null($image)){
            return;
        }

        if($member->image !== ''){
            File::Delete(base_path().'/public/'.$member->image);
        }

        $destinationPath = base_path().'/public/img/members';
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $member->image = 'img/members/'.$imageName;
    }

}