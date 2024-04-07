<?php
header('Content-Type: application/json');
require('_sql.php');

$result = $sql->query("SELECT * FROM `users`");
if ($result) {
    $arr = array();
    while ($user = $result->fetch_assoc()) {
        $arr[] = $user;
    }
    echo json_encode($arr, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
}
?>
