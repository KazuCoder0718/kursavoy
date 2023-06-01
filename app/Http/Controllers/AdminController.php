<?php

namespace App\Http\Controllers;

use App\Models\Group as ModelsGroup;
use App\Models\Subgroup;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\Configuration\Group;

class AdminController extends Controller
{
    public function add_page($ne){
        if($ne == 'Pan'){
            $groups = ModelsGroup::all();
            return view('admin.add', ['ne'=>$ne, 'groups'=>$groups]);
        }
            return view('admin.add', ['ne'=>$ne]);
    }

    public function add(Request $request){
        if($request->ne == 'Pan'){
            // return $request;
            $subject = Subject::create([
                'name'=>$request->name
            ]);
            Subgroup::create([
                'subject_id'=>$subject->id,
                'group_id'=>$request->group_id,
            ]);
            return redirect()->route('home');
        }elseif($request->ne == 'Topar'){
            ModelsGroup::create([
                'name'=>$request->name
            ]);
            return redirect()->route('home');
        }
    }

    public function set_page(){
        $teachers = User::where('role', 'teacher')->get();
        $super = DB::table('subgroups')
        ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        ->select('subgroups.id as id', 'groups.name as group_name', 'subjects.name as subject_name')->get();

        // Soraw baaaar?

        // $super = DB::table('subgroups')
        // ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        // ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        // ->select('subgroups.id as id', 'groups.name as group_name', 'subjects.name as subject_name')->whereHas('subgroup_id', function(){

        // })->get();
        
        return view('admin.set_page', ['subgroups'=>$super, 'teachers'=>$teachers]);
    }

    // setta soraw bar?
    public function set(Request $request){
        $find_sub_id = Teacher::where('subgroup_id', $request->subgroup_id)->first();
        if(!empty($find_sub_id)){
            $teachers = User::where('role', 'teacher')->get();
            $super = DB::table('subgroups')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
            ->select('subgroups.id as id', 'groups.name as group_name', 'subjects.name as subject_name')->get();
            // validatsiya qaytariw kk
            return view('admin.set_page', ['subgroups'=>$super, 'teachers'=>$teachers]);
        }else{
            Teacher::create([
                'user_id'=>$request->user_id,
                'subgroup_id'=>$request->subgroup_id
            ]);
            return redirect()->route('home');
        }
    }
    public function see_page(){
        return view('admin.see');
    }
}
