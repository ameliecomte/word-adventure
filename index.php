<?php
require('model/dbModel.php');

$stats = getStats();
$messages = getMessagesDisplay();

require('view/layout.php');

require('controller.php');



