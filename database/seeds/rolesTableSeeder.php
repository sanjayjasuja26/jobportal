<?php

use Illuminate\Database\Seeder;
use App\Role;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

          [ 'role'=>'admin'],
          [ 'role'=>'user']
      ];

      DB::table('roles')->delete();
      foreach ($roles as $role){
         Role::insert($role);
       }
    }
}
