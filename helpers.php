<?php

function run_subject($subject) {
  global $example_list;
  $example_list = get_examples($subject);
  
  ob_start();
  if (empty($example_list)) {
    echo 'Looks like this subject has no examples';
  } else {
    if (isset($_GET['example']) && $example_list[$_GET['example']]) {
      $action = $example_list[$_GET['example']];
      include get_directory($subject) . $action['filename'] . '.php';
    } else {
      show_example_list($example_list, $subject);
    }
  }
  
  $content = ob_get_contents();
  ob_clean();
  
  render($content);
}

function run_task_subject($task_subject) {
  global $task_list;
  $task_list = get_tasks($task_subject);
  
  ob_start();
  if (empty($task_list)) {
    echo 'Looks like this subject has no tasks';
  } else {
    if (isset($_GET['task']) && $task_list[$_GET['task']]) {
      $action = $task_list[$_GET['task']];

      $resources_path = get_directory($task_subject, 'tasks') . 'resources/';

      include get_directory($task_subject, 'tasks') . $action['filename'] . '.php';
    } else {
      show_task_list($task_list, $task_subject);
    }
  }
  
  $content = ob_get_contents();
  ob_clean();
  
  render($content);
}

function get_examples($subject) {
  $example_list = [];
  include get_directory($subject) . '_example_list.php';
  
  return $example_list;
}

function get_tasks($subject) {
  $_list = [];
  include get_directory($subject, 'tasks') . '_list.php';
  
  return $_list;
}

global $subject_list;
$subject_list = [
  'constructions' => 'Conditional structures',
  'functions' => 'Functions'
];

function show_home() {
  global $subject_list;
  ob_start();
  require 'view/home.php';
  $content = ob_get_contents();
  ob_clean();
  
  render($content);
}

function show_example_list($example_list, $subject) {
  $type = ['category' => 'subject', 'title' => 'examples', 'slug' => 'example'];
  show_list($example_list, $subject, $type);
}

function show_task_list($example_list, $subject) {
  $type = ['category' => 'task_subject', 'title' => 'tasks', 'slug' => 'task'];
  show_list($example_list, $subject, $type);
}

function show_list($list, $subject, $type) {
  ob_start();
  require 'view/example_list.php';
  $content = ob_get_contents();
  ob_end_clean();
  echo $content;
}

function render($content) {
  ob_start();
  require 'view/template.php';
  $content = ob_get_contents();
  ob_end_clean();
  echo $content;
}

function write_ln($value, $label = '') {
  if ($label) {
    echo $label . ': ';
  }

  print_r($value);
  echo '<br>';
}

function load_json_file($path) {
  if (file_exists($path)) {
    $result = json_decode(file_get_contents($path), true);
  } else {
    $result = [
      'error' => 'File not exist'
    ];
  }

  return $result;
}

function get_directory($subject, $parent = 'subjects') {
  return __DIR__ . '/' . $parent . '/' . $subject . '/';
}
