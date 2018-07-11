<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate();            
        User::create([
            'name' => 'Heitor Garcia',
            'email' => 'admin@vercan.com.br',
            'password'=> bcrypt('vercan@123')
        ]);        
    }
}
