<?php

class FlashcardsTableSeeder extends Seeder {

    public function run()
    {
        $flashcard = new Flashcard();
        $flashcard->front = '/images/cessna172.png';
        $flashcard->back = 'Cessna 172 Skyhawk';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/images/cherokee.png';
        $flashcard->back = 'Piper PA-28 Cherokee';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/images/cessna150.png';
        $flashcard->back = 'Cessna 150';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/images/cessna182.png';
        $flashcard->back = 'Cessna 182 Skylane';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/images/cirrusSR20.png';
        $flashcard->back = 'Cirrus SR20';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/images/beechcraftbonanza.png';
        $flashcard->back = 'Beechcraft Bonanza';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = '/audio/motor.mp3';
        $flashcard->back = 'motor running';
        $flashcard->category = 'audio';
        $flashcard->title = 'motor';
        $flashcard->description = 'round engine running slowly';
        $flashcard->save();

        for($i = 0; $i < 15; $i++){
            $flashcard = new Flashcard();
            $flashcard->front = 'Front';
            $flashcard->back = 'Back';
            $flashcard->category = 'vocab';
            $flashcard->save();
        }
    }

}