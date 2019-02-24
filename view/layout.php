<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Word Adventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="web/css/main.css" />
    <script src="main.js"></script>
</head>
<body>

    <h1> WORD ADVENTURE </h1>

    <div class="layout"> 
        <div class="stats"> 
            <fieldset>
                <legend> STATS </legend>
                <?php $data = $stats->fetch() ?> 

                <p> Name : <?= htmlspecialchars($data['name']); ?></p>
                <p> Health : <?= htmlspecialchars($data['health']); ?></p> 
                <p> Experience : <?= htmlspecialchars($data['experience']); ?></p> 
                <p> Level : <?= htmlspecialchars($data['level']); ?></p>
                <p> STR : <?= htmlspecialchars($data['strength']); ?></p> 
     
                <?php $stats->closeCursor();?>
            </fieldset>
        </div>

        <div class="UI">
            <p> 
                <?php  
                while ($data = $messages->fetch())
                { 
                    echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
                }
                $messages->closeCursor();  
                ?>
                <br/>
                <form method="post" action="view/insert.php"><input type="text" name="message"></form>
            </p>
        </div>
</body>
</html>

