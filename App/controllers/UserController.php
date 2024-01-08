<?php

namespace App\controllers;

use App\entities\User;
use App\models\UserModel;

require __DIR__ . '/../../vendor/autoload.php';

session_start();

class UserController
{

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function register()
    {
        $username = $this->test_input($_POST['username']);
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);
        $cpassword = $this->test_input($_POST['cpassword']);

        $_SESSION['username'] = $_SESSION['email'] = $_SESSION['password'] = $_SESSION['cpassword'] = "";

        if (empty($username)) {
            $_SESSION['username'] = "Username is required";
        } elseif (strlen($username) < 3) {
            $_SESSION['username'] = "Username must be at least 3 characters";
        }

        if (empty($email)) {
            $_SESSION['email'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email'] = "Email must be valid";
        }

        if (empty($password)) {
            $_SESSION['password'] = "Password is required";
        } elseif (strlen($password) < 8) {
            $_SESSION['password'] = "Password must be at least 8 characters";
        }

        if ($password != $cpassword) {
            $_SESSION['cpassword'] = "Passwords don't match";
        }

        $userModel = new UserModel();
        $exist = $userModel->getByEmail($email);

        if ($exist) {
            $_SESSION['email'] = "Email already exists";
        }

        if (empty($_SESSION['username']) && empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['cpassword'])) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $user = new User(null, $username, $email, $hashedPassword, null, 1);
            $userModel->save($user);
            header("location:../../view/auth/signin.php");
            exit();
        } else {
            header("location:../../view/auth/signup.php");
            exit();
        }
    }

    public function login()
    {
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);

        $_SESSION['email'] = $_SESSION['password'] = "";

        if (empty($email)) {
            $_SESSION['email'] = "Email is required";
        }

        if (empty($password)) {
            $_SESSION['password'] = "Password is required";
        }

        if (empty($_SESSION['email']) && empty($_SESSION['password'])) {

            $userModel = new UserModel();
            $user = $userModel->getByEmail($email);
            
            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    header("location:../../view/index.php");
                } else {
                    $_SESSION['password'] = "Incorrect Password";
                    header("location:../../view/auth/signin.php");
                }
            } else {
                $_SESSION['email'] = "Email doesn't exist";
                header("location:../../view/auth/signin.php");
            }
        } else {
            header("location:../../view/auth/signin.php");
            exit();
        }
    }
}

if (isset($_POST['register'])) {
    extract($_POST);
    $registerController = new UserController();
    $registerController->register();
}

if (isset($_POST['login'])) {
    extract($_POST);
    $registerController = new UserController();
    $registerController->login();
}