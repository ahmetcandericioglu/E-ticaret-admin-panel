<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table="users";
    protected $fillable=[
        "username",
        "usertitle",
        "password",
        "deleted_at",
        "created_at",
        "updated_at"
    ];

}
