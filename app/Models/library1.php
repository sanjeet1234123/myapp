<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class library1 extends Model
{
    use HasFactory;
    protected $table='library1';
    protected $fillable=['name'];
    public $timestamps=false;
}
