<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user=User::create([
           'name'=>'sayed',
           'email'=>'admin@admin.com',
           'roles_name'=>['superAdmin'],
            'status'=>'مفعل',
           'password'=>bcrypt('123456'),
        ]);

        $role = Role::create(['name' => 'superAdmin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}
