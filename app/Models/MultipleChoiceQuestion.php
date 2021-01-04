<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\ChoiceQuestion;

class MultipleChoiceQuestion extends Model
{
    use HasFactory;
    protected $table = 'multiple_choice_questions';
    protected $fillable = ['id', 'random_order', 'multiple', 'rights'];
    public $timestamps = false;

    public function question(){
        return $this->morphOne(Question::class, 'questionType', 'type', 'id');
    }

    public function choices(){
        return $this->hasMany(QuestionChoice::class, 'question_id');
    }
}
