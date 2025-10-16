<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UnitSeeder;
use Database\Seeders\BrandSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SupplierSeeder;
use Database\Seeders\RawMaterialSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     //
        // ]);

        $role = Role::create([
            'name' => 'super_admin'
        ]);

        $role1 = Role::create([
            'name' => 'admin'
        ]);

        $user1 = User::create([
            'name' => 'Shaharyar',
            'email' => 'ahmedshaharyar00@gmail.com',
            'password' => 'ahmedshaharyar00@gmail.com'
        ]);


        $user = User::create([
            'name' => 'If Else Devs',
            'email' => 'ifelsedevs.official@gmail.com',
            'password' => 'SuperIfElseDevs'
        ]);

        $user3 = User::create([
            'name' => 'Sabir',
            'email' => 'sk8145418@gmail.com',
            'password' => 'imrankhan12345',
        ]);

        $user->assignRole($role);
        $user1->assignRole($role);
        $user3->assignRole($role1);
    }
}
