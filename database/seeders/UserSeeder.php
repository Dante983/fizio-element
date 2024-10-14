<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'miroslav@fizioelement.com')->exists()) {
            User::create([
                'name' => 'Miroslav Knezevic',
                'email' => 'miroslav@fizioelement.com',
                'password' => Hash::make('secure_password_here'),
            ]);
        }
    }
}

