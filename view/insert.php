<?php
header('Location: ../index.php');
require('../model/dbModel.php');

$db = dbConnect();

$req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
$req->execute(array($_POST['message']));



