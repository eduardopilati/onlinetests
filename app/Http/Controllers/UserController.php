<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Http\Requests\UserRequest;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Notifications\NewUserPasswordNotification;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(15);
        return view('users.index', ['users'=>$users]);
    }

    public function create(){
        return view('users.create');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', [ 'user' => $user]);
    }

    public function save(UserRequest $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make(Uuid::uuid4()->toString()); // random password
        $user->save();

        if($request->send_email == true){
            $this->sendEmail($user);
        }

        return redirect()->route('users');
    }

    public function update($id, UserRequest $request){
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('users');
    }

    private function sendEmail(User $user){
        Password::broker()->sendResetLink(['email'=>$user->email], function($userProvider, $token) use ($user){
            $user->notify(new NewUserPasswordNotification($user, $token));
        });
    }

    public function sendPasswordEmail($id){
        $user = User::findOrFail($id);
        $this->sendEmail($user);
        return response()->json([
            'message' => Lang::get('app.password-email-sent')
        ]);
    }

    public function userGroups($id){
        $user = User::findOrFail($id);
        $groups = UserGroup::whereNotIn('id', $user->userGroups->pluck('id')->toArray())->get();
        return view('users.goups_modal', ['groups' => $groups]);
    }

    public function linkUserGroup($id){
        $user = User::findOrFail($id);
        $group = UserGroup::findOrFail($_POST['group_id']);
        $user->userGroups()->attach($group);

        return response()->json([
            'message' => Lang::get('app.user-group-linked')
        ]);
    }

    public function unlinkUserGroup($id){
        $user = User::findOrFail($id);
        $group = UserGroup::findOrFail($_POST['group_id']);
        $user->userGroups()->detach($group);

        return response()->json([
            'message' => Lang::get('app.user-group-unlinked')
        ]);
    }
}
