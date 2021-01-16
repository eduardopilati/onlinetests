<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGroupRequest;
use App\Http\Requests\UserRequest;
use App\Models\Setup;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class SetupController extends Controller
{
    public function index(){
        $setup = Setup::firstOrFail();

        if (!isset($setup->user)){
            return view('setup.create_user');
        }

        if (!isset($setup->usergroup)){
            return view('setup.create_usergroup');
        }

        return redirect('/');
    }

    public function saveuser(UserRequest $request){
        $setup = Setup::firstOrFail();
        $request->merge(['send_email' => true]);

        if (!isset($setup->user)){
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make(Uuid::uuid4()->toString()); // random password
            $user->save();

            $setup->admin_user_id = $user->id;
            $setup->save();

            $controller = new UserController();
            $controller->sendEmail($user);
        }

        return redirect()->route('setup');
    }

    public function saveusergroup(UserGroupRequest $request){
        $setup = Setup::firstOrFail();

        if (!isset($setup->usergroup)){
            $usergroup = new UserGroup();
            $usergroup->title = $request->input('title');
            $usergroup->save();

            $setup->user->userGroups()->attach($usergroup);

            $setup->admin_usergroup_id = $usergroup->id;
            $setup->save();
        }

        return redirect()->route('setup');
    }
}
