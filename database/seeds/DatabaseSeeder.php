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
            ['name' => 'Farmer'],
            ['name' => 'User'],
        ];
        // Inserting Permission Into Database which not exist
        foreach ($permissions as $permission) {
            if(Permission::where('name',$permission['name'])->first()===null){
                Permission::create($permission);
            }
        }

        $user = User::where('email','mail2snasik@gmail.com')->first();

        $user->givePermissionTo('User');
    }
}
