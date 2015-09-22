<?php

class FlashcardsTableSeeder extends Seeder {

    public function run()
    {
        for($i = 0; $i < 15; $i++){
            $flashcard = new Flashcard();
            $flashcard->front = 'Front';
            $flashcard->back = 'Back';
            $flashcard->category = 'Category';
            $flashcard->save();
        }
    }

}