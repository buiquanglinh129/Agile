<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getStudentRole()
    {
        return static::where('slug', 'sinh-vien')->first();
    }

    public function isAdmin()
    {
        return $this->slug === 'admin';
    }
}