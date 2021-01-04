<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $table = 'question_answers';
    protected $fillable = ['grade', 'question_id'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function questionChoiceAnswer(){
        return $this->hasMany(QuestionChoiceAnswer::class);
    }

    public function questionTextAnswer(){
        return $this->hasOne(QuestionTextAnswer::class);
    }


}
