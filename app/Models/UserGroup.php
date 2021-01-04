<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'user_groups';
    protected $fillable = ['title'];

    public function users(){
        return $this->belongsToMany(User::class, 'users_user_groups', 'user_group_id', 'user_id');
    }

    public function testGroups(){
        return $this->belongsToMany(TestGroup::class, 'test_groups_user_groups', 'user_group_id', 'test_group_id');
    }
}
