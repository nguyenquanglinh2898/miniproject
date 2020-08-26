<?php
  session_start();
  require_once('controllers/UserController.php');
  require_once('controllers/BookController.php');


  if(isset($_SESSION["emailUser"]) && isset($_SESSION["username"])) {
    $bookController = new BookController();
    $userController = new UserController();
    if(isset($_GET['controller']) && $_GET['controller'] == 'book'){
      switch($_GET['action']){
        case 'add':
          $bookController->add();
          break;
        case 'edit':
          $bookController->edit($_GET['id']);
          break;
        case 'delete':
          $bookController->delete($_GET['id']);
          break;
        default:
          $bookController->getAll();
        }
    } else if (isset($_GET['controller']) && $_GET['controller'] == 'user' && $_GET['action'] == "postLogOut"){
        $userController->postLogOut();
    } else {
      $bookController->getAll();
    }
  } else {
    $userController = new UserController();
    // die(isset($_GET['action']) ? $_GET['action'] : 'AA');
    switch(isset($_GET['action']) ? $_GET['action'] : ''){  
      case 'postLogin':
        $userController->postLogin();
        break;
      case 'viewRegister':
        $userController->viewRegister();
        break;
      case 'postRegister':
        $userController->postRegister();
        break;
      case 'postLogOut':
        $userController->postLogOut();
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