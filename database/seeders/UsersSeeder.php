<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'Mr.Bean',
            'email'    => 'admin01@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 1,
        ]);

        User::create([
            'name'     => 'David',
            'email'    => 'petugas01@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 0,
        ]);
        
    }
}
