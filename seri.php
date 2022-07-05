<?php

require './db.php';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$sql = $db->prepare("SELECT * FROM seri ORDER BY nama_seri");
$sql->execute();
$data = [];

while ($row = $sql->fetch()) {
    array_push($data, $row);
}

header("Content-Type: application/json");
echo json_encode($data);
