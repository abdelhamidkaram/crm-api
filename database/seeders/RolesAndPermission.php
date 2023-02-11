<?php

namespace Database\Seeders;

use Crm\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $permissions = [
        'Create Customer',
        'Update Customer',
        'Delete Customer',
        'Show Customer',
        'Create Note',
        'Update Note',
        'Delete Note',
        'Show Note',
        'Create Invoice',
        'Update Invoice',
        'Delete Invoice',
        'Show Invoice',
        'Create User',
        'Update User',
        'Delete User',
        'Show User',

    ];
    public function run()
    {

        foreach ($this->permissions as $permission ) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'Super Admin'])->syncPermissions($this->permissions);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('Super Admin');


    }
}
