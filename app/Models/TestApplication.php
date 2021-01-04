<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestApplication extends Model
{
    use HasFactory;
    protected $table = 'test_applications';
    protected $fillable = ['token', 'start_date', 'end_date', 'grade', 'test_id', 'applicant_id'];

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
}
