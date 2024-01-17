<?php
require_once('../../backend/Database/DB_connect.php');

$bit_value = 1; // This can be either 1 or 0
$db->insertBitValue($bit_value);

header('Location: ../../front-end/PanicButton/index.php');
exit;
?>


<!-- fix traversel directory path -->