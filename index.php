<?php
require('model/dbModel.php');

$stats = getStats();
$messages = getMessagesDisplay();

require('controller/controller.php');
require('view/layout.php');





