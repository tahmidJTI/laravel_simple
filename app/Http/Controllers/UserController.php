<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    public function show(User $user){
        return view('admin.users.profile',['user'=>$user,'roles'=>Role::all()]);
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username' => ['required','max:255','string'],
            'name' => ['required','max:255','string'],
            'email' => ['required','max:255','string'],
        ]);

        if (request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

       $user->update($inputs);
        return redirect()->route('users.index');
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('user_deleted','User has been deleted');
        return back();
    }

    public function attach(User $user){
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();
    }


}
