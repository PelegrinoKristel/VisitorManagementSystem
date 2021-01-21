<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AdminJob extends Model{
    protected $table = 'admindata';
    protected $fillable = [
        'adminID', 'jobInfo'
    ];
}