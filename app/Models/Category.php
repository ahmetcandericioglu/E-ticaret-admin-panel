<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ["categorytitle", "categorydescription", "categorystatus", "deleted_at", "created_at", "updated_at"];
}
