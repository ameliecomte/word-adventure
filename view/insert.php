<?php
header('Location: ../index.php');
require('../model/DbManager.php');

$db = DbManager::dbConnect();

$req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
$req->execute(array($_POST['message']));



