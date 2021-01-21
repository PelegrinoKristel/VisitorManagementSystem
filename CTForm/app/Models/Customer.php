<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Customer extends Model{
    protected $table = 'tblcustomers';
    protected $fillable = [
    'fullname', 'address', 'number', 'temperature', 'datevisit'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}