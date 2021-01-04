<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoiceAnswer extends Model
{
    use HasFactory;
    protected $table = 'question_choice_answers';
    protected $fillable = ['question_answer_id', 'question_choice_id'];

    public function questionAnswer(){
        return $this->belongsTo(QuestionAnswer::class);
    }

    public function questionChoice(){
        return $this->belongsTo(QuestionChoice::class);
    }
}
