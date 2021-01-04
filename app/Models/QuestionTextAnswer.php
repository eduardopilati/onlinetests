<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTextAnswer extends Model
{
    use HasFactory;

    protected $table = 'question_text_answers';
    protected $fillable = ['question_answer_id', 'text'];

    public function questionAnswer(){
        return $this->belongsTo(QuestionAnswer::class);
    }

}
