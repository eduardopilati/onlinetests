<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestGroupRequest;
use App\Models\TestGroup;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

class TestGroupController extends Controller
{
    public function index($id = null){
        $testgroup = TestGroup::find($id);

        //should be searched like this because the first level has a parent as null
        $testgroups = TestGroup::where('parent_test_group_id', $id)->paginate(15);

        return view('testgroups.index', ['id' => $id, 'testgroups'=>$testgroups, 'testgroup'=>$testgroup]);
    }

    public function create($id = null){
        return view('testgroups.create', ['id' => $id]);
    }

    public function edit($id){
        $testgroup = TestGroup::findOrFail($id);
        return view('testgroups.edit', [ 'testgroup' => $testgroup]);
    }

    public function save($id = null,TestGroupRequest $request){
        $testgroup = new TestGroup();
        $testgroup->title = $request->input('title');
        $testgroup->parent_test_group_id = $id;
        $testgroup->save();
        return redirect()->route('testgroups', ['id' => $id]);
    }

    public function update($id, TestGroupRequest $request){
        $testgroup = TestGroup::findOrFail($id);
        $testgroup->title = $request->input('title');
        $testgroup->save();
        return redirect()->route('testgroups', ['id' => $id]);
    }

    public function listtestgroups($id){
        $testgroup = TestGroup::find($id);
        $testgroups = TestGroup::where('parent_test_group_id', $id)->paginate(15);

        $title = isset($testgroup) ? $testgroup->title : Lang::get('app.root-folder');
        $parent_id = isset($testgroup) ? $testgroup->parent_test_group_id : null;
        $children = view('testgroups.listtestgroups', ['testgroups' => $testgroups])->render();

        return response()->json([
            'id' => $id,
            'parent_id' => $parent_id,
            'title' => $title,
            'children' => $children
        ]);
    }

    public function changeParentGroup($id){
        $group = TestGroup::findOrFail($id);
        $parentGroup = TestGroup::findOrFail($_POST['parent_id']);

        if($this->checkParent($parentGroup, $group) || $group->id = $parentGroup->id){
            return response()->json([
                'error' => true,
                'message' => Lang::get('app.wrongmovetochild-testgroup')
            ]);
        }

        $group->parent_test_group_id = $parentGroup->id;

        return response()->json([
            'error' => false
        ]);
    }

    /**
     * Check if $parent is, at, some level, parent of $group
     */
    private function checkParent(TestGroup $group, TestGroup $parent){
        if(!isset($group->parent_test_group_id)){
            return false;
        }

        if($group->parent_test_group_id == $parent->id){
            return true;
        }

        return $this->checkParent($group->parentTestGroup, $parent);
    }
}
