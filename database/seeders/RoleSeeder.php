<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator role'
        ]);

        Role::create([
            'name' => 'Editor',
            'description' => 'Editor role'
        ]);

        Role::create([
            'name' => 'Author',
            'description' => 'Author role'
        ]);

        Role::create([
            'name' => 'Contributor',
            'description' => 'Contributor role'
        ]);

        Role::create([
            'name' => 'Subscriber',
            'description' => 'Subscriber role'
        ]);
    }
}
