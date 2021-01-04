<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    protected $fillable = ['external_id', 'name'];

    public function testApplications(){
        return $this->hasMany(TestApplication::class);
    }
}
