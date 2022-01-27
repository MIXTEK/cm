<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        $user = auth()->user()->paginate(10);
        return view('admin.users.index', ['users'=>$user]);
    }

    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username'=>['required','string','max:255'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file']
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user, Request $request){

        $user->delete();

        session()->flash('message', 'The user has been deleted');

        return back();

    }
//
//    public function attach(Role $role){
//        dd($role);
//    }

}
