<?php

namespace app\controllers\admin;

use app\core\BaseController;
use app\repositories\UserRepository;
use Exception;

class AdminAuthController extends BaseController
{
  public function index()
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
          $tokenRemember = uniqid($user->getId()) . "." . uniqid(time(), true);
          $statusUpdate = UserRepository::updateTokenRemember($user->getId(), $tokenRemember);
          if ($statusUpdate) {
            setcookie("_rk_rm", $tokenRemember, time() + 60 * 60 * 24 * 60, "/");
          }
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
    $currentPath = trim($_SERVER['REQUEST_URI'], '/');
    if ($currentPath === 'admin/login' && $_SERVER['REQUEST_METHOD'] === "GET") {
      if (isset($_SESSION['admin']) || isset($_COOKIE['_rk_rm'])) {
        header('location: /admin/blog');
        exit;
      }
      return;
    }

    if (empty($_SESSION['admin']) && empty($_COOKIE['_rk_rm'])) {
      $_SESSION['msg_err'] = "You are not logged in. Please log in to continue!";
      header('location: /admin/login');
      exit;
    } else if (isset($_COOKIE['_rk_rm'])) {
      $admin = UserRepository::getUserByTokenRemember($_COOKIE['_rk_rm']);
      $_SESSION['admin'] = $admin;
    }
  }

  public function logout()
  {
    unset($_SESSION['admin']);
    setcookie("_rk_rm", "", time() - (60 * 60 * 24 * 60), "/");
    header('location: /admin/login');
    exit;
  }
}
