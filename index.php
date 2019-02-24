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
    <div> 
    <h1> WORD ADVENTURE </h1>
        <div class="stats"> 
            <fieldset>
                <legend> STATS </legend>
        
        <?php 
        // database connection
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $req = $db->query('SELECT name, health, experience, level, strength FROM characters_stats ORDER BY ID DESC LIMIT 0, 10');

        while ($data = $req->fetch())
        { 
        ?> 

                <p> Name : <?= htmlspecialchars($data['name']); ?></p>
                <p> Health : <?= htmlspecialchars($data['health']); ?></p> 
                <p> Experience : <?= htmlspecialchars($data['experience']); ?></p> 
                <p> Level : <?= htmlspecialchars($data['level']); ?></p>
                <p> STR : <?= htmlspecialchars($data['strength']); ?></p> 
            </fieldset> 
        <?php 
        } 
        $req->closeCursor(); ?>
        </div>

        <div class="UI">
            <p> 
            <form method="post" action="text_post.php"><input type="text" name="textToDisplay"></form>
            </p>
        </div>
</body>
</html>

