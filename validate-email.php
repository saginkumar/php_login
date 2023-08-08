<?php

$mysqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));
                
// var_dump($sql);
$result = $mysqli->query($sql);
// die(result);
$is_available = $result->num_rows === 0;
// var_dump($is_available);
header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);