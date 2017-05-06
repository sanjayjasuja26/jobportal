<?php

use Illuminate\Database\Seeder;
use App\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        ['name' => 'Admin','email'=>"admin@gmail.com", 'role_id'=> '1','password'=>'123456'],
        ['name' => 'user','email'=>"client@gmail.com", 'role_id'=> '2', 'password'=>'123456']
      ];

      foreach ($users as $key => $user) {
        $newUser = new User;
        $newUser->name = $user['name'];
        $newUser->email = $user['email'];
        $newUser->role_id = $user['role_id'];
        $newUser->password = \Hash::make($user['password']);

        $newUser->save();

    }
 }
}
