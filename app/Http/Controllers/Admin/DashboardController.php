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

    public function submit()
    {
        $request = request();
        //dd(ProjectImage::where('id', 1)->get());
        $project = new Project;
        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->save();
        $files = $request->file('images');
        $destinationPath = base_path().'/public/img';
        //pour resoudre
        foreach ($files as $file) {
            $imageTempName = $file->getPathname();
            $imageName = $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);
            $projectImage = new ProjectImage;
            $projectImage->project_id = $project->id;
            $projectImage->path = $destinationPath.'/'.$imageName;
            $projectImage->save();
        }
    }

    public function projects()
    {
        $projects = Project::all();
        return view('admin.project.table', [ 'projects' => $projects ]);
    }

    public function members()
    {
        $members = Member::all();
        return view('admin.member.table', [ 'members' => $members ]);
    }
    public function edit($id = null)
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
        $imageTempName = $image->getPathname();
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $member->image = 'img/members/'.$imageName;
    }

}