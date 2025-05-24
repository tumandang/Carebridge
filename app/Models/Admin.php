<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    use Notifiable;
    protected $fillable=['user_id', 'branch', 'universiti'];
    
    public function program():HasMany{
        return $this->hasMany(Program::class,'admin_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
