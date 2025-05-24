<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create(
        [
            'name' => 'AdminUM',
            'email' => 'admin@example.com',
            'password' => Hash::make('qwert123'),
            'is_volunteer' => false,
        ]
        
    
    );
        Admin::create([
            'user_id' => $user->id,
            'branch' => 'Belia Harmoni Universiti Malaya',
            'universiti' => 'UM'
        ]);
        
       $user2 = User::create(
        [
            'name' => 'AdminGambang',
            'email' => 'gambang@harmoni',
            'password' => Hash::make('123456'),
            'is_volunteer' => false,
        ]
        
    
    );
        Admin::create([
            'user_id' => $user2->id,
            'branch' => 'Belia Harmoni GAMBANG',
            'universiti' => 'UMPSA'
        ]);
       
    }
}
