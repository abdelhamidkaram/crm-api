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
        'createCustomer',
        'updateCustomer',
        'deleteCustomer',
        'showCustomer',
        'createNote',
        'updateNote',
        'deleteNote',
        'showNote',
        'createInvoice',
        'updateInvoice',
        'deleteInvoice',
        'showInvoice',
        'createUser',
        'updateUser',
        'deleteUser',
        'showUser',

    ];
    public function run()
    {

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'superAdmin'])->syncPermissions($this->permissions);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('superAdmin');

        
    }
}
