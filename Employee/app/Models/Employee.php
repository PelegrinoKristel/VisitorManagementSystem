<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Employee extends Model{
    protected $table = 'tblemployees';
    protected $fillable = [
    'fullname', 'address','emailadd', 'number',  'job'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}