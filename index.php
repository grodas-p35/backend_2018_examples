<?php

require_once 'config.php';
require_once 'helpers.php';

if (isset($_GET['subject']))  {
  run_subject($_GET['subject']);
} elseif (isset($_GET['task_subject']))  {
  run_task_subject($_GET['task_subject']);
} else {
  show_home();
}
