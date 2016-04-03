<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Member;
use App\Experience;
use App\ProjectImage;
use App\Category;

use File;

class DashboardController extends Controller
{
    public function show()
    {
        $projects = Project::all();
        return view('admin.dashboard', [ 'projects' => $projects ]);
    }

    //projects
    public function projects()
    {
        $projects = Project::all();
        return view('admin.project.table', [ 'projects' => $projects ]);
    }

    public function editProject($id = null)
    {
        $project = Project::find($id);
        $images = [];
        $categories = Category::all();
        $companies = [
            'Aetec-Mo'  => 'aetec-mo',
            'Stepaetec' => 'stepaetec',
        ];
        $urlComponents = explode('admin', url()->current());
        $baseURL = $urlComponents[0];
        if(!is_null($project)){
            $images = $project->images;
        }
        return view('admin.project.edit', [
            'project'    => $project,
            'images'     => $images,
            'categories' => $categories,
            'companies'  => $companies,
            'url'        => $baseURL
        ]);
    }

    public function submitProject()
    {
        $request = request();
        $id = request()->id;
        $project = $id === '' || is_null($id) ? new Project : Project::find($id);

        //dd($request->imagesToDelete);
        if(!is_null($request->imagesToDelete)){
                foreach ($request->imagesToDelete as $image) {
                    $imgToDel = ProjectImage::find($image);
                    if(!is_null($imgToDel)){
                        File::Delete(base_path().'/public/'.$imgToDel->path);
                        $imgToDel->delete();   
                    }
                }
            $project->cover_path = !is_null(ProjectImage::where('project_id', $project->id)->first()) ? ProjectImage::where('project_id', $project->id)->first()->path : '';
        }

        $project->name = $request->name;
        //dd($request);
        $project->description = $request->description;
        $project->category_id = $request->category_id;
        $project->company = $request->company;
        $project->selected = is_null($request->selected) ? 0 : $request->selected;
        $files = $request->file('images');
        $destinationPath = base_path().'/public/img/projects';
        $project->save();
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
            $project->cover_path = ProjectImage::where('project_id', $project->id)->first()->path;
        }
        $project->save();
        return redirect(route('projects'));
    }

    public function checkImageName($name){
        $imageIndex = ProjectImage::count() ? ProjectImage::orderBy('id', 'desc')->first()->id + 1 : 1;
        $nameExploded = explode('.', $name);
        $imgName = $nameExploded[0];
        $imgExtension = $nameExploded[1];
        return $imgName.'-'.$imageIndex.'.'.$imgExtension;

    }

    public function deleteProject()
    {   
        $projectId = request()->id;
        $projectImages = ProjectImage::where('project_id', $projectId)->get();
        foreach ($projectImages as $image) {
            File::Delete(base_path().'/public/'.$image->path);
            $image->delete();
        }
        Project::destroy(request()->id);
        return redirect(route('projects'));
    }

    //members
    public function members()
    {
        $members = Member::all();
        return view('admin.member.table', [ 'members' => $members ]);
    }
    public function editMember($id = null)
    {
        $member = Member::find($id);
        $urlComponents = explode('admin', url()->current());
        $baseURL = $urlComponents[0];
        return view('admin.member.edit', [
            'member' => $member,
            'url' => $baseURL,
        ]);
    }

    public function submitMember()
    {
        $id = request()->id;
        $member = $id === '' ? new Member : Member::find($id);
        $member->name = request()->name;
        $member->function = request()->function;
        $this->setMemberImage(request()->file('image'), $member);
        $member->save();
        $experiences = request('experiences');
        if(!is_null($experiences)){
            foreach ($experiences as $experience) {
                if(!isset($experience['id'])){
                    $newExperience = new Experience;
                    $newExperience->start = $experience['start'];
                    $newExperience->end = $experience['end'];
                    $newExperience->function = $experience['role'];
                    $newExperience->institution = $experience['company'];
                    $newExperience->member_id = $member->id;
                    $newExperience->save();
                    
                } else {
                    $experienceToEdit = Experience::find($experience['id']);
                    $experienceToEdit->start = $experience['start'];
                    $experienceToEdit->end = $experience['end'];
                    $experienceToEdit->function = $experience['role'];
                    $experienceToEdit->institution = $experience['company'];
                    $experienceToEdit->save();
                }
            }            
        }
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

        if($member->image !== '' && $member->image !== 'img/placeholder.png'){
            File::Delete(base_path().'/public/'.$member->image);
        }

        $destinationPath = base_path().'/public/img/members';
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $member->image = 'img/members/'.$imageName;
    }

}