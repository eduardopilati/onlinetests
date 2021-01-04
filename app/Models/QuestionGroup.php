<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    use HasFactory;
    protected $table = 'question_groups';
    protected $fillable = ['title', 'text', 'random_questions', 'test_id'];

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

}
