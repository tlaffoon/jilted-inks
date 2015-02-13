<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->username = $_ENV['DEFAULT_USER_USERNAME'];
        $user->name     = $_ENV['DEFAULT_USER_NAME'];
        $user->email    = $_ENV['DEFAULT_USER_EMAIL'];
        $user->password = $_ENV['DEFAULT_USER_PASSWORD'];
        $user->role_id  = $_ENV['DEFAULT_USER_ROLE_ID'];
        $user->save();
    }
}
