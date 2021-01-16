<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGroupRequest;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function index(){
        $usergroups = UserGroup::paginate(15);
        return view('usergroups.index', ['usergroups'=>$usergroups]);
    }

    public function create(){
        return view('usergroups.create');
    }

    public function edit($id){
        $usergroup = UserGroup::findOrFail($id);
        return view('usergroups.edit', [ 'usergroup' => $usergroup]);
    }

    public function save(UserGroupRequest $request){
        $usergroups = new UserGroup();
        $usergroups->title = $request->input('title');
        $usergroups->save();
        return redirect()->route('usergroups');
    }

    public function update($id, UserGroupRequest $request){
        $usergroups = UserGroup::findOrFail($id);
        $usergroups->title = $request->input('title');
        $usergroups->save();
        return redirect()->route('usergroups');
    }
}
