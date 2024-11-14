<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Verifica se o usuário "admin" já existe para evitar duplicação
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'), // Hash para senha "admin"
            ]);
        }
    }
}
