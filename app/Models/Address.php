<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=['address_line', 'state'];

    public function program(){
        return $this->hasMany(Program::class);
    }
    
}
