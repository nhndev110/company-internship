<?php

namespace app\controllers\admin;

use app\core\BaseController;
use app\repositories\UserRepository;
use Exception;

class AdminAuthController extends BaseController
{
  public function showLoginForm()
  {
    $this->view("admin/login.tpl");
    unset($_SESSION['msg_err']);
    unset($_SESSION['old_username']);
  }

  public function login()
  {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
      throw new Exception("Missing username or password");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
      $user = UserRepository::getOneByUsernameAndPassword($username, $password);
      if (empty($user)) {
        $_SESSION['msg_err'] = "Invalid username or password. Please try again!";
        $_SESSION['old_username'] = $username;
        header('location: /admin/login');
        exit;
      } else {
        $_SESSION['admin'] = $user;

        if (isset($_POST['remember'])) {
          $jsonAdmin = json_encode([
            "id" => $user->getId(),
            "name" => $user->getName(),
          ]);
          setcookie("admin", $jsonAdmin, time() + 60 * 60 * 24 * 60, "/");
        }
        header('location: /admin/blog');
        exit;
      }
    } catch (Exception $e) {
      $_SESSION['msg_err'] = $e->getMessage();
    }
  }

  public function authenticate()
  {
    if (is_numeric(strpos($_SERVER['REQUEST_URI'], '/admin/login')) && $_SERVER['REQUEST_METHOD'] === "GET") {
      if (isset($_SESSION['admin']) || isset($_COOKIE['admin'])) {
        header('location: /admin/blog');
        exit;
      }
      return;
    }

    if (empty($_SESSION['admin']) && empty($_COOKIE['admin'])) {
      $_SESSION['msg_err'] = "You are not logged in. Please log in to continue!";
      header('location: /admin/login');
      exit;
    } else if (isset($_COOKIE['admin'])) {
      $adminCookie = get_object_vars(json_decode($_COOKIE['admin']));
      $admin = UserRepository::getOneById($adminCookie['id']);
      $_SESSION['admin'] = $admin;
    }
  }

  public function logout()
  {
    unset($_SESSION['admin']);
    setcookie("admin", "", time() - (60 * 60 * 24 * 60), "/");
    header('location: /admin/login');
    exit;
  }
}
