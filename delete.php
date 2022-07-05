<?php

require_once('db.php');

if (isset($_GET['id'])) {
  $hp_id = $_GET['id'];

  $sql = "DELETE FROM hp WHERE hp_id = '$hp_id'";

  if (mysqli_query($db, $sql)) {
    header('Location: index.html');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}
