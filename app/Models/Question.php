<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['title', 'text', 'type', 'maximum_grade', 'question_group_id'];

    public function questionGroup(){
        return $this->belongsTo(QuestionGroup::class);
    }

    public function questionType(){
        return $this->morphTo(__FUNCTION__, 'type', 'id');
    }

    public function questionAnswers(){
        return $this->hasMany(QuestionAnswer::class);
    }
}
