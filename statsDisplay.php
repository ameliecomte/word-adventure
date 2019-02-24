<?php


    try
        {
            $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $req = $db->query('SELECT name, health, experience, level, strength FROM characters_stats');



while ($data = $req->fetch())
{ 
?> 

        <p> Name : <?= htmlspecialchars($data['name']); ?></p>
        <p> Health : <?= htmlspecialchars($data['health']); ?></p> 
        <p> Experience : <?= htmlspecialchars($data['experience']); ?></p> 
        <p> Level : <?= htmlspecialchars($data['level']); ?></p>
        <p> STR : <?= htmlspecialchars($data['strength']); ?></p> 
     
<?php 
} 
$req->closeCursor(); ?>
