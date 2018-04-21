<?php
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

$title = "changed";
//$id = 2;

/* create a prepared statement */
if ($stmt = $mysqli->prepare("SELECT description FROM tasks WHERE title=?")) {

  /* bind parameters for markers */
  $stmt->bind_param("s", $title);

  /* execute query */
  $stmt->execute();

  /* bind result variables */
  $stmt->bind_result($decription);

  /* fetch value */
  $stmt->fetch();

  printf("Task %s has next description:<br> %s<br>", $title, $decription);

  /* close statement */
  $stmt->close();
}

/* close connection */
$mysqli->close();
?>
