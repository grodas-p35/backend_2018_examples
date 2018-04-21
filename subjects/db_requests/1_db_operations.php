<?php
require_once PROJECT_FILE_ROOT . '/libs/DB.php';

$db = new DB();

//$sql = "INSERT INTO tasks(title, description) VALUES ('new task', 'task description')";

//$sql = "SELECT title FROM tasks WHERE 1";

//$sql = "UPDATE tasks SET title = 'changed' WHERE id = 3";

$sql = "DELETE FROM tasks WHERE title = 'changed'";

$db->query($sql);


//$result = $db->get_last_id();

/*
$num_rows = $db->num_rows();
$result = $num_rows;

$tasks = [];
for ($i = 0; $i < $num_rows; $i++) {
  $tasks[] = $db->get_assoc();
}
$result = $tasks;
*/

$result = $db->affected_rows();

//$result = $db->escape('";DROP TABLE users;"');

var_dump($result);
