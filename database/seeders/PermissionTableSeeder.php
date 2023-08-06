<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'role-manage', 'guard_name' => 'admin'],
            ['name' => 'post-manage', 'guard_name' => 'admin'],
            ['name' => 'product-manage', 'guard_name' => 'admin'],
        ];

        foreach ($permissions as $permissionData) {
            Permission::create($permissionData);
        }
    }
}
