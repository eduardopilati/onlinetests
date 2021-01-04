<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $fillable = ['title', 'text', 'random_groups', 'maximum_grade', 'owner_id', 'test_group_id'];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function testGroup(){
        return $this->belongsTo(TestGroup::class);
    }

    public function questionGroups(){
        return $this->hasMany(QuestionGroup::class);
    }

    public function testApplications(){
        return $this->hasMany(TestApplication::class);
    }
}
