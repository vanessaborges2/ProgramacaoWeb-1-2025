<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Vanessa", //'name' => $reques->name,
            'email' => "vanessa@email.com", //'email' => $request->email,
            'password' => Hash::make("123456"), 
                        //'password' => Hash::make($request->password),
        ]);
    }
}
