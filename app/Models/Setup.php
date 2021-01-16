<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    use HasFactory;
    protected $fillable = ['admin_user_id', 'admin_usergroup_id'];
    protected $table = 'setup';

    public function user(){
        return $this->hasOne(User::class, 'id', 'admin_user_id' );
    }

    public function usergroup(){
        return $this->hasOne(User::class, 'id', 'admin_usergroup_id' );
    }
}
