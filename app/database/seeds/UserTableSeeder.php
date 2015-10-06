<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'first_name' => $_ENV['USER_FIRSTNAME'],
            'last_name'  => $_ENV['USER_LASTNAME'],
            'email'      => $_ENV['USER_EMAIL'],
            'password'   => $_ENV['USER_PASSWORD'],
            'password_confirmation'   => $_ENV['USER_PASSWORD'],
        ]);
        User::create([
            'first_name' => $_ENV['USER_FIRSTNAME2'],
            'last_name'  => $_ENV['USER_LASTNAME2'],
            'email'      => $_ENV['USER_EMAIL2'],
            'password'   => $_ENV['USER_PASSWORD2'],
            'password_confirmation'   => $_ENV['USER_PASSWORD2'],
        ]);
        User::create([
            'first_name' => $_ENV['USER_FIRSTNAME3'],
            'last_name'  => $_ENV['USER_LASTNAME3'],
            'email'      => $_ENV['USER_EMAIL3'],
            'password'   => $_ENV['USER_PASSWORD3'],
            'password_confirmation'   => $_ENV['USER_PASSWORD3'],
        ]);
    }

}