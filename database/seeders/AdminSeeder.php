<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pārbaudiet, vai administrators jau eksistē
        $admin = User::where('email', 'admin@example.com')->first();

        if (!$admin) {
            // Ja administrators neeksistē, izveidojiet jaunu
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        } else {
            echo "Administrator already exists.\n";
        }
    }
}
