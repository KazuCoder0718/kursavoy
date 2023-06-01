<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subgroup;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_store(Request $request){
        $validateData = $request->validate([
            'email'=>"required|",
            'password'=>"required"
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin_home');
            }
            return redirect()->route('home');
        }
        return redirect()->route('login_page');
    }

    public function register(Request $request){
        if(!empty($request->name) and !empty($request->email)){
            $validateData = $request->validate([
                'name'=>"required",
                'email'=>"required|unique:users,email",
                'role'=>"required"
            ]);
            // return $validateData;
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'role'=>$request->role,
                'password'=>Hash::make($request->password)
            ];
        
            $user = User::create($data);
            if($user->role == 'student'){
                Student::create([
                    'user_id'=>$user->id,
                    'group_id'=>$request->group_id
                ]);
            }elseif($user->role == 'teacher'){
                Teacher::create([
                    'user_id'=>$user->id,
                    'subgroup_id'=>$request->subgroup_id
                ]);
            }
            // Auth::login($user);
            return redirect()->route('home');
        }else{
            $subgroups = Subgroup::all();
            $groups = Group::all();
            $subjects = Subject::all();
            return view('admin.reg', ['reg_status'=>1, 'role'=>$request->role, 'subgroups'=>$subgroups, 'groups'=>$groups, 'subjects'=>$subjects]);
        }    
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }

    public function update_page(){
        return view('update');
    }
    public function update(Request $request){
        if($request->e_update == 1){
            User::where('id', Auth::user()->id)->update([
                'email'=>$request->email
            ]);
            return redirect()->route('update_page');
        }elseif($request->p_update == 1){
            if(Auth::attempt($request->only('email', 'password'))){
                $validae = $request->validate([
                    'new_password'=>"required",
                    'renew_password'=>"required_with:new_password|same:new_password"
                ]);
                User::where('id', Auth::user()->id)->update([
                    'password'=>Hash::make($request->new_password)
                ]);
                return redirect()->route('update_page');
            }
        }
    }
}
