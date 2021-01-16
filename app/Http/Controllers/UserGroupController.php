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
        $usergroup = new UserGroup();
        $usergroup->title = $request->input('title');
        $usergroup->save();
        return redirect()->route('usergroups');
    }

    public function update($id, UserGroupRequest $request){
        $usergroup = UserGroup::findOrFail($id);
        $usergroup->title = $request->input('title');
        $usergroup->save();
        return redirect()->route('usergroups');
    }
}
