<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextQuestion extends Model
{
    use HasFactory;
    protected $table = 'text_questions';
    protected $fillable = ['id', 'min_characters', 'max_characters'];
    public $timestamps = false;

    public function question(){
        return $this->morphOne(Question::class, 'questionType');
    }
}
