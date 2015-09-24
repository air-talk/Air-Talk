<?php

class FlashcardsTableSeeder extends Seeder {

    public function run()
    {
        $flashcard = new Flashcard();
        $flashcard->front = 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Cessna172-CatalinaTakeOff.JPG/300px-Cessna172-CatalinaTakeOff.JPG';
        $flashcard->back = 'Cessna 172 Skyhawk';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/PiperPA-28-236DakotaC-GGFSPhoto4.JPG/300px-PiperPA-28-236DakotaC-GGFSPhoto4.JPG';
        $flashcard->back = 'Piper PA-28 Cherokee';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Cessna.fa150k.g-aycf.arp.jpg/300px-Cessna.fa150k.g-aycf.arp.jpg';
        $flashcard->back = 'Cessna 150';
        $flashcard->category = 'plane';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Cessna182t_skylane_n2231f_cotswoldairshow_2010_arp.jpg/300px-Cessna182t_skylane_n2231f_cotswoldairshow_2010_arp.jpg';
        $flashcard->back = 'Cessna 182 Skylane';
        $flashcard->category = 'plane';
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