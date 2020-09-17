<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }

    public function EditProfile()
    {
        return view('users.edit')->with('user',auth()->user());
    }

    public function UpdateProfil( UserUpdateRequest  $request){
         
        $user=auth()->user();

        $user->update([
            'name'=>$request->name,
            'about'=>$request->about
        ]);


        session()->flash('success','User updated successfuly');

        return redirect(route('users.index'));


    }

    public function makeAdmin(User $user){
       
        $user->role='admin';

        $user->save();


        session()->flash('success','Use made admin Successfuly');


        return redirect(route('users.index'));


    }
}
