<?php
echo 'Text';

if (isset($_POST['textToDisplay']))
{
    echo '<p>' . htmlspecialchars($_POST['textToDisplay']). '</p>';
}
else
{
    echo '<p>' . 'error. can\'t display the text' . '</p>';
}
?>

<form method="post" action="index.php"><input type="text" name="textToDisplay"></form>

