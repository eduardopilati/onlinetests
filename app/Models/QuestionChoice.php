<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    use HasFactory;
    protected $table = 'question_choices';
    protected $fillable = ['text', 'correct', 'question_id'];

    public function multipleChoiceQuestion(){
        return $this->belongsTo(MultipleChoiceQuestion::class, 'question_id');
    }
}
