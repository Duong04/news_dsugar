<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'users', 'description' => 'Users Management'],
            ['name' => 'roles', 'description' => 'Roles Management'],
            ['name' => 'permissions', 'description' => 'Permissions Management'],
            ['name' => 'categories', 'description' => 'Categories Management'],
            ['name' => 'subcategories', 'description' => 'Subcategies Management'],
            ['name' => 'posts', 'description' => 'Posts  Management'],
        ];
        
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'description' => $permission['description']
            ]);
        }
    }
}
