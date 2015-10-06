<?php

class FlashcardsTableSeeder extends Seeder {

    public function run()
    {
        // PLANES
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

        // AUDIO
        $flashcard = new Flashcard();
        $flashcard->front = '/audio/motor.mp3';
        $flashcard->back = 'motor running';
        $flashcard->category = 'audio';
        $flashcard->title = 'motor';
        $flashcard->description = 'round engine running slowly';
        $flashcard->save();

        // VOCAB
        $flashcard = new Flashcard();
        $flashcard->front = 'ASOS';
        $flashcard->back = 'Automatic Surface Observation System';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'ATIS';
        $flashcard->back = 
            'Automatic Terminal Information Service. <br>You should listen to this weather information and be familiar with it before initial contact with the controller. Use the appropriate letter to inform the controller that you have the current ATIS information.';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'closed traffic';
        $flashcard->back = 
            'Instruction issued for practicing touch-and-go landings at a tower-controlled field. <br>Closed traffic is a direction for an aircraft to remain in the traffic pattern. Example: “Warrior One One Seven, after completion of touch-and-go, mike right closed traffic.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'continue downwind';
        $flashcard->back = 
            'Instruction issued to an aircraft in the traffic pattern to provide adequate spacing between arriving aircraft.<br>Fly downwind, and wait for further instructions. Example: “Cessna One Zero Seven Echo Sierra, continue downwind. I’ll call your turn to base.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'fly runway heading';
        $flashcard->back = 
            'After takeoff, continue climbout without turning to avoid a traffic conflict. <br>Turning instructions will follow, after the conflict had been resolved. Example: “Cessna Six Two Zero Niner Quebec, cleared for takeoff, fly runway heading.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'ident';
        $flashcard->back = 
            'Press and release the IDENT button on you transponder. This causes your radar return to be highlighted, allowing the radar controller to quickly identify you.';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'hold short';
        $flashcard->back = 
            'Taxi clearance is limited to a specific point on a taxiway. <br>Example: “Cessna Seven Echo Sierra, taxi to runway one six, hold short of runway two two. Note: Every hold short clearance must be read back';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'line up and wait';
        $flashcard->back = 
            'Clearance to taxi onto the runway centerline and stop, awaiting a takeoff clearance. <br>Example: “Warrior Two November Alpha, Runway One Four, line up and wait.”';
        $flashcard->category = 'vocab';
        $flashcard->save();        

        $flashcard = new Flashcard();
        $flashcard->front = 'low approach (only)';
        $flashcard->back = 
            'Clearance to perform a go-around (often received when landing closely behind a heavy aircraft. Do not land!<br> Example: “Cessna One Zero Seven Echo Sierra, cleared for low approach only.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'option';
        $flashcard->back = 
            'Clearance authorizing you to perform a touch-and-go, a landing (full stop), or a goaround.<br> Example: “Tomahawk Niner Six Echo, cleared for the option.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'again';
        $flashcard->back = 
            'Please repeat.<br> Example: “Cessna Seven Echo Sierra, say again request.”';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'altitude';
        $flashcard->back = 
            'Report your current altitude.';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'intentions';
        $flashcard->back = 
            'Tell the controller what you want to do.';
        $flashcard->category = 'vocab';
        $flashcard->save();

        $flashcard = new Flashcard();
        $flashcard->front = 'position';
        $flashcard->back = 
            'Tell the controller where you are.';
        $flashcard->category = 'vocab';
        $flashcard->save();




    }

}