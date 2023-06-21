<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //il type ha più progetti
    public function projects(){
       return $this->hasMany(Project::class);
    }
}
