<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function group_grader()
    {
        return $this->hasMany(Group::class);
    }

    public function group_graded()
    {
        return $this->hasMany(Group::class);
    }

    public static function getGrades($id)
    {
        return self::select()->where('group_graded_id', '=', $id)->get();
    }
}
