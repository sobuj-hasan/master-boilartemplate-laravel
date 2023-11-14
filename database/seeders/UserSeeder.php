<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('email', 'info@gmail.com')->first();
        if (is_null($users)) {
            User::create([
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Text To Speech',
                'email' => 'info@gmail.com',
                'phone' => '012345678901',
                'address' => 'Rajlaxmi Complex, Uttara',
                'city' => 'Dhaka',
                'state' => 'Dhaka',
                'country' => 'Bangladesh',
                'password' => Hash::make('12345678'),
                'avatar' => 'default.png',
                'email_verified_at' => '2023-03-02 15:36:47'
            ]);
        }
    }
}
