<?php
  session_start();
  require_once('controllers/UserController.php');
  // include_once('controllers/BookController.php');

  // $bookController = new BookController();
  
  // if($_GET['controller'] == 'book' && $_GET['action'] == 'getAll') $bookController->getAll();

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'add') $bookController->add();

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'edit') $bookController->edit($_GET['id']);

  // if($_GET['controller'] == 'book' && $_GET['action'] == 'update') $bookController->update($_GET['id']);

  // echo (empty($_SESSION["emailUser"]) ? true : false);
  
  if(isset($_SESSION["emailUser"]) && isset($_SESSION["username"])) {
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
        case 'delete':
          $bookController->delete($_GET['id']);
          break;
        default:
          $bookController->getAll();
        }
    } else if ($_GET['controller'] == 'user'){
      if($_GET['action'] == 'postLogOut') {
        $userController = new UserController();
        $userController->postLogOut();
      }
    } else {
      echo "404";
    }
  } else {
    // die("SEE2");
    // require_once('controllers/UserController.php');
    $userController = new UserController();
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