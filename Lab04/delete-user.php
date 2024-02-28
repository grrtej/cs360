<?php
require('_sql.php');

$id = $_GET['id'];
$sql->query("DELETE FROM `users` WHERE id = $id");

header('Location: dashboard.php');
?>
