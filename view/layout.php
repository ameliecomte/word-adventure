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
                <?php require('statsDisplay.php'); ?>
            </fieldset>
        </div>

        <div class="UI">
            <p> 
            <?php require('messagesDisplay.php'); ?>
            <br/>
            <form method="post" action="view/insert.php"><input type="text" name="message"></form>
            </p>
        </div>
</body>
</html>

