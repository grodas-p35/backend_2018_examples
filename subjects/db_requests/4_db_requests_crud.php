<?php

require_once PROJECT_FILE_ROOT . '/libs/DB.php';

class Tasks {
  private $db;
  public function __construct() {
    $this->db = new DB();
    $this->resolve();
  }

  public function resolve() {
    $action = $_REQUEST['action'] ?? null;
    $id = $_REQUEST['id'] ?? null;
    switch ($action) {
      case 'edit':
        $this->edit($id);
        break;
      case 'show':
        $this->show($id);
        break;
      case 'create':
        $this->create();
        break;
      case 'update':
        $this->update($id);
        break;
      case 'delete':
        $this->delete($id);
        break;
      default:
        $this->show_all();
        break;
    }
  }

  private function show($id) {
  }

  private function edit($id) {
    
  }

  private function create() {
    
  }

  private function update($id) {
    
  }

  private function delete($ids) {
    if (!is_array($ids)) {//single task delete
      $ids = [$ids];
    } 
  }

  private function show_all() {
    $sql = 'SELECT * FROM tasks';
    $this->db->query($sql);
    $num_rows = $this->db->num_rows();
    $tasks = [];
    
    for ($i = 0; $i < $num_rows; $i++) {
      $tasks[] = $this->db->get_assoc();
    }
    
    var_dump($tasks);
  }
}

$tasks = new Tasks();
