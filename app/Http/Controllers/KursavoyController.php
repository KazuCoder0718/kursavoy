<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Kursavoy;
use App\Models\Score;
use App\Models\Student;
use App\Models\Subgroup;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KursavoyController extends Controller
{
    public function add_kursavoy(){
        $super = DB::table('subgroups')
        ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        ->join('teachers', 'teachers.subgroup_id', '=', 'subgroups.id')
        ->select('teachers.user_id as user_id', 'subgroups.id as id', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')->where('user_id', Auth::user()->id)->get();
        return view('action.add_kursavoy', ['subgroups'=>$super, 'status'=>0]);
    }

    public function subject_select(Request $request){
        if(empty($request->tema and $request->end_time)){
            $super = DB::table('subgroups')->where('subgroups.id', $request->subgroup_id)
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
            ->join('teachers', 'teachers.subgroup_id', '=', 'subgroups.id')
            ->select('teachers.user_id as user_id', 'subgroups.id as id', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')->first();
            return view('action.add_kursavoy', ['subgroups'=>$super, 'status'=>1]);
        }else{
            $id = Auth::user()->id;
            Kursavoy::create([
                'user_id'=>$id,
                'tema'=>$request->tema,
                'end_time'=>$request->end_time,
                'subgroup_id'=>$request->subgroup_id
            ]);
            return redirect()->route('home');
        }
    }
     
    public function see(){
        $super = DB::table('subgroups')
        ->join('teachers', 'teachers.subgroup_id', '=', 'subgroups.id')
        ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        ->select('teachers.user_id as user_id', 'subgroups.id as id', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')->where('user_id', Auth::user()->id)->get();
        return view('action.see_kursavoy', ['subgroups'=>$super, 'status'=>1]);
    }



   
    public function see_kursavoys(Request $request){
        if(empty($request->kursavoy_id)){
            $super = DB::table('subgroups')
            ->join('teachers', 'teachers.subgroup_id', '=', 'subgroups.id')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
            ->select('teachers.user_id as user_id', 'subgroups.id as id', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')->where('subgroups.id', $request->subgroup_id)->first();
            $kursavoys = Kursavoy::where('subgroup_id', $request->subgroup_id)->get();
            // return $super;
            return view('action.see_kursavoy', ['subgroups'=>$super, 'status'=>0, 'kursavoys'=>$kursavoys, 'kursavoy_status'=>1]);
        }else{
            $super = DB::table('subgroups')
            ->join('teachers', 'teachers.subgroup_id', '=', 'subgroups.id')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
            ->select('teachers.user_id as user_id', 'subgroups.id as id', 'groups.id as group_id', 'groups.name as group_name', 'subjects.id as subject_id', 'subjects.name as subject_name')->where('subgroups.id', $request->subgroup_id)->first();
            $kursavoys = Kursavoy::where('id', $request->kursavoy_id)->first();
            // return $super;
            $works = DB::table('works')
            ->join('kursavoys', 'kursavoys.id', '=', 'works.kursavoy_id')
            ->join('users', 'users.id', '=', 'works.user_id')
            ->select('works.id as id', 'users.id as user_id', 'users.name as user_name', 'works.file_name as file_name',  'works.score as score')->where('kursavoys.id', $request->kursavoy_id)->get();
            return view('action.see_kursavoy', ['subgroups'=>$super, 'status'=>0, 'kursavoys'=>$kursavoys, 'kursavoy_status'=>0, 'works'=>$works, 'i'=>1]);
        }
    }

    public function send(){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $kursavoys = DB::table('kursavoys')
        ->join('subgroups', 'subgroups.id', '=', 'kursavoys.subgroup_id')
        ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        ->select('kursavoys.id as id', 'kursavoys.tema as tema', 'kursavoys.end_time as time', 'subgroups.subject_id as subject_id ', 'subjects.name as subject_name', 'groups.id as group_id')
        ->where('groups.id', $student->group_id)->get();

        $t_kursavoys = DB::table('works')
        ->join('kursavoys', 'kursavoys.id', '=', 'works.kursavoy_id')
        ->select('kursavoys.id as id', 'works.kursavoy_id as tk_id')
        ->where('works.user_id', Auth::user()->id)->get();
        $t_ids = [0];
        foreach($t_kursavoys as $val){
            $t_ids[]=$val->tk_id;
        }
        // return $t_ids;
        return view('works.send', ['kursavoys'=>$kursavoys, 't_ids'=>$t_ids]);
    }

    public function goo($k_id){
        $kursavoy = Kursavoy::where('id', $k_id)->first();
        return view('works.k_send', ['kursavoy'=>$kursavoy]);
    }


    public function juklew(Request $request){
        $tmp_name = $request->file('file')->getClientOriginalExtension();
        $array = ['doc', 'docx', 'pdf', 'ppt', 'pptx'];
            
        if ($request->hasFile('file') and in_array($tmp_name, $array)) {
            // $validate = $request->validate([
            //     'file'=>"required|mimes:doc, docx, pdf, ppt, pptx"
            // ]);
        
            $file_name = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('works'), $file_name);


            Work::create([
                'kursavoy_id'=>$request->k_id,
                'user_id'=>Auth::user()->id,
                'file_name'=>$file_name,
                'score'=>NULL
            ]);

            return redirect()->route('send');
        }
        
        return 'Fayl yuklanmagan.';
    }

    public function score(Request $request){
        Work::where('id', $request->work_id)->update(['score'=>$request->score]);
        return redirect()->route('see');
    }

    public function see_score(){
        $kursavoys = DB::table('kursavoys')
        ->join('subgroups', 'subgroups.id', '=', 'kursavoys.subgroup_id')
        ->join('groups', 'groups.id', '=', 'subgroups.group_id')
        ->join('subjects', 'subjects.id', '=', 'subgroups.subject_id')
        ->join('works', 'works.kursavoy_id', '=', 'kursavoys.id')
        ->select('kursavoys.id as id', 'kursavoys.tema as tema', 'kursavoys.end_time as time', 'subjects.name as subject_name', 'works.score as score')
        ->where('works.user_id', Auth::user()->id)->get();

        return view('works.see_score', ['kursavoys'=>$kursavoys]);
    }
}
