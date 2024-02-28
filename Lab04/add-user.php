<?php
require('_sql.php');

$firstname = $sql->real_escape_string(stripslashes($_POST['firstname']));
$lastname = $sql->real_escape_string(stripslashes($_POST['lastname']));
$email = $sql->real_escape_string(stripslashes($_POST['email']));
$password = $sql->real_escape_string(stripslashes($_POST['password']));
$created_on = date('Y-m-d H:i:s');

$sql->query("INSERT into `users` (firstname, lastname, password, email, created_on) VALUES ('$firstname', '$lastname', '" . md5($password) . "', '$email', '$created_on')");

header('Location: dashboard.php');
?>
