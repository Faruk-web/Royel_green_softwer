<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['name' => 'dashboard.view', 'guard_name' => 'web', 'group_name' => 'Dashboard'],
            ['name' => 'settings', 'guard_name' => 'web', 'group_name' => 'Dashboard'],

            ['name' => 'role.view', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'create.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'update.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'permissions', 'guard_name' => 'web', 'group_name' => 'Role'],

            ['name' => 'crm.view', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.create', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.update', 'guard_name' => 'web', 'group_name' => 'CRM'],

            ['name' => 'suppliers', 'guard_name' => 'web', 'group_name' => 'Supplier'],
            ['name' => 'rawmaterial', 'guard_name' => 'web', 'group_name' => 'Rawmaterial'],
            ['name' => 'purchase', 'guard_name' => 'web', 'group_name' => 'Purchase'],
            ['name' => 'stocks', 'guard_name' => 'web', 'group_name' => 'Stocks'],
            ['name' => 'products', 'guard_name' => 'web', 'group_name' => 'Products'],
            ['name' => 'production', 'guard_name' => 'web', 'group_name' => 'Production'],
            ['name' => 'bill', 'guard_name' => 'web', 'group_name' => 'Bill'],
            ['name' => 'staff', 'guard_name' => 'web', 'group_name' => 'Staff'],
            ['name' => 'expense', 'guard_name' => 'web', 'group_name' => 'Expense'],
            ['name' => 'bank', 'guard_name' => 'web', 'group_name' => 'Bank'],
            ['name' => 'account', 'guard_name' => 'web', 'group_name' => 'Account'],
            

           
           
            

        ];

        Permission::insert($permissions);

    }
}
