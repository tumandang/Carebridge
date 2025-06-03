<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;
    protected $primaryKey = 'program_id';
    protected $fillable = ['user_id', 'title', 'description', 'address_id', 'startdate', 'enddate', 'deadline', 'type', 'status', 'max_vol', 'poster', 'linkgroup'];

    public function Cawangan(): BelongsTo
    {
        return $this->belongsTo(Admin::class,  'admin_id', 'id');
    }
    protected $casts = [
        'type' => 'array'
    ];

    public function Lokasi(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
        //                                       foreign key, primarykey
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'program_id', 'program_id');
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteers::class, 'applications', 'program_id', 'volunteer_id');
    }

    public function full(){
        return $this->applications()->where('status','Accepted')->count()>=$this->max_vol;
    }
}
