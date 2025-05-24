<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
   
    protected $fillable = ['status','remark','read','program_id','volunteer_id'];
    public function program()
{
    return $this->belongsTo(Program::class,'program_id','program_id');
}

public function volunteer()
{
    return $this->belongsTo(Volunteers::class,'volunteer_id','id');
}
}
