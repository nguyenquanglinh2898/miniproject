<?php
session_start();
  // include_once('controllers/BookController.php');

  // $bookController = new BookController();
  
  // if($_GET['controller'] == 'book' && $_GET['action'] == 'getAll') $bookController->getAll();

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'add') $bookController->add();

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'edit') $bookController->edit($_GET['id']);

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'update') $bookController->update($_GET['id']);
  if($_SESSION["LoginValidate"]){
    if($_GET['controller'] == 'book'){
      require_once('controllers/BookController.php');
      $bookController = new BookController();
      switch($_GET['action']){
        case 'add':
          $bookController->add();
          break;
        case 'edit':
          $bookController->edit($_GET['id']);
          break;
        case 'update':
          $bookController->update($_GET['id']);
          break;
        default:
          $bookController->getAll();
        }
    } else {
      echo "404";
    }
  } else {
    require_once('controllers/UserController.php');
    $userController = new UserController();
    switch($_GET['action']){
      case 'postLogin':
        $userController->postLogin();
        break;
      default:
        $userController->viewLogin();
    }
  }
  // if($_GET['controller'] == 'book'){
  //   require_once('controllers/BookController.php');
  //   $bookController = new BookController();
  //   switch($_GET['action']){
  //     case 'add':
  //       $bookController->add();
  //       break;
  //     case 'edit':
  //       $bookController->edit($_GET['id']);
  //       break;
  //     case 'update':
  //       $bookController->update($_GET['id']);
  //       break;
  //     default:
  //       $bookController->getAll();
  //     }
  // } else {
    // require_once('controllers/UserController.php');
    // $userController = new UserController();
    // switch($_GET['action']){
    //   case 'postLogin':
    //     $userController->postLogin();
    //     break;
    //   default:
    //     $userController->viewLogin();
  //     }
    

  // }
?>