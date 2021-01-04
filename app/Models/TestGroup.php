<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
    use HasFactory;
    protected $table = 'test_groups';
    protected $fillable = ['title', 'parent_test_group_id'];

    public function parentTestGroup(){
        return $this->belongsTo(TestGroup::class);
    }

    public function childrenTestGroup(){
        return $this->hasMany(TestGroup::class, 'parent_test_group_id');
    }

    public function tests(){
        return $this->hasMany(Test::class);
    }

    public function userGroups(){
        return $this->belongsToMany(TestGroup::class, 'test_groups_user_groups', 'test_group_id', 'user_group_id');
    }
}
