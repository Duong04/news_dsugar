<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeRole;

class TypeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeRole::create([
            'name' => 'System',
            'redirect_url' => 'dashboard'
        ]);

        TypeRole::create([
            'name' => 'Content',
            'redirect_url' => 'dashboard'
        ]);

        TypeRole::create([
            'name' => 'Administration',
            'redirect_url' => 'dashboard'
        ]);

        TypeRole::create([
            'name' => 'User',
            'redirect_url' => 'home'
        ]);
    }
}
