<?php

class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        Question::create([

            'first_name' => $_ENV['USER_FIRSTNAME'],
            'last_name'  => $_ENV['USER_LASTNAME'],
            'email'      => $_ENV['USER_EMAIL'],
            'password'   => $_ENV['USER_PASSWORD'],
            'password_confirmation'   => $_ENV['USER_PASSWORD'],
        ]);
    }

}