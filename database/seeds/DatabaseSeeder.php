<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        // Defining Permissions
        $permissions = [
            ['name' => 'Farmer Operator'],
            ['name' => 'Farmer Admin'],

            ['name' => 'Sale Operator'],
            ['name' => 'Sale Admin'],

            ['name' => 'Purchase Operator'],
            ['name' => 'Purchase Admin'],

            ['name' => 'Inventory Operator'],
            ['name' => 'Inventory Admin'],

            ['name' => 'Accounts Operator'],
            ['name' => 'Accounts Admin'],
            
            ['name' => 'System Admin'],
        ];
        // Inserting Permission Into Database which not exist
        foreach ($permissions as $permission) {
            if(Permission::where('name',$permission['name'])->first()===null){
                Permission::create($permission);
            }
        }

        $user = User::where('email','mail2snasik@gmail.com')->first();
        $user->givePermissionTo('System Admin');
    }
}
