<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $table='member';
    protected $fillable=['name','email','contact_number','role','password','lib_id'];
    public $timestamps=false;

}
