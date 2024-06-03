<?php

namespace Database\Seeders;

use App\Models\master\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::query()->insert([
            'name' => 'admin',
            'created_by' => 1,
        ]);
        Role::query()->insert([
            'name' => 'student',
            'created_by' => 1,

        ]);
        $this->call([
            //PermissionRoleTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            MenuSeeder::class,
            SemesterSeeder::class
        ]);
    }
}
