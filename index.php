<?php
  include_once('controllers/BookController.php');

  $bookController = new BookController();
  
  if($_GET['controller'] == 'book' && $_GET['action'] == 'getAll') $bookController->getAll();

  if($_GET['controller'] == 'book' && $_GET['action'] == 'add') $bookController->add();

  if($_GET['controller'] == 'book' && $_GET['action'] == 'edit') $bookController->edit($_GET['id']);

  if($_GET['controller'] == 'book' && $_GET['action'] == 'update') $bookController->update($_GET['id']);
?>