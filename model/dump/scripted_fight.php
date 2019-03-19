<?php
$db = dbConnect();



// if textDisplay is empty
    // start with message/script intro
    

if ($db->query('SELECT * FROM textDisplay'))
{
    $req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
    $req->execute(array($_POST['message']));
}
else
{
    $intro = 'You\'re in the jails of the capital of the Emerald Empire. One day the guards fetches you to fight in the battle arena. You\'re promised freedom if victorious. Armed with a sword and a health potion, you\'re ready to stay alive';
    $req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
    $req->execute($intro);
}

// if message = hit something
    // hit() method
    // gain exp
if ($_POST['message'] == 'hit')
{
    // $character->hit();
}

// if message = heal something  -- not more than 3 times. so need to add a counter
    
    // heal(something) name accepted (me, myself, player, )

// if message =  heal/hit nothing -- insert 'heal/hit who?'

// if enemy dies (event)
    // ... the show must go on, id+1 enemy appears

// if all enemies dead -- you won !

