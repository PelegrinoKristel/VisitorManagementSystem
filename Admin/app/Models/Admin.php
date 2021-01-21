<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Admin extends Model{
    protected $table = 'admindata';
    protected $fillable = [
    'fullname', 'address', 'emailadd', 'number', 'jobInfo'
    ];
    public $timestamps = false;
    protected $primaryKey = 'adminID';
}