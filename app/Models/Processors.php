<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processors extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'generation', 'core', 'thread', 'release_date'];
}
