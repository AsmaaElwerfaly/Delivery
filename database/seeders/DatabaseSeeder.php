<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Branch;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * List of applications to add.
     */
    private $permissions = [
        'الرئيسية',
        'الفروع',
        'المندوبين',
        'الشحنات',
        'المستخدمين',
        
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $Branch = Branch::create([
            'id'=> '1',
            'branche_name'=>'طرابلس' ,
            'code'=> '0000',
            'password'=>'1111' ,
          
        ]);
        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'password' => Hash::make('password'),
            'branche_id' => '1'
        ]);

     

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}