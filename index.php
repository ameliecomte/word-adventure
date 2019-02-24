<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Word Adventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <h1> WORD ADVENTURE </h1>
        <div class="layout"> 
    
        <div class="stats"> 
            <fieldset>
                <legend> STATS </legend>
        
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
        </fieldset>
        </div>

        <div class="UI">
            <p> 
        <?php
            try
        {
            $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $req = $db->query('SELECT id, text FROM textDisplay ORDER BY ID LIMIT 0, 10');

        while ($data = $req->fetch())
        { 
            echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
        }
        $req->closeCursor(); ?>
            <br/>
            <form method="post" action="insert.php"><input type="text" name="message"></form>
            </p>
        </div>
</body>
</html>

