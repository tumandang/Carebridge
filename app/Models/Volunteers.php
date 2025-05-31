<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    /** @use HasFactory<\Database\Factories\VolunteersFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'fullname', 'notel', 'age', 'gender', 'academic', 'profile', 'skill'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'applications', 'volunteer_id', 'program_id');
    }
}
