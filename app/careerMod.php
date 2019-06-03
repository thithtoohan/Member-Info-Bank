<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class careerMod extends Model
{
     protected $fillable=['careerDesc','active','remark'];
    protected $primaryKey='careerId';
}
