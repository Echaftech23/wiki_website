<?php

namespace App\controllers;

use App\entities\User;
use App\models\UserModel;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';

session_start();

class UserController
{

    public function signup()
    {
        include '../../view/auth/signup.php';
        exit();
    }

    public function signin()
    {
        include '../../view/auth/signin.php';
        exit();
    }

    public function register()
    {
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $cpassword = test_input($_POST['cpassword']);

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

            $user = new User(null, $username, $email, $hashedPassword, null, 2);
            $userModel->save($user);

            header("location:signin");
            exit();
        } else {
            header("location:signup");
            exit();
        }
    }

    public function login()
    {
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

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

            $_SESSION['Auth'] = false;

            if ($user) {
                if (password_verify($password, $user->getPassword())) {

                    $_SESSION['Auth'] = true;
                    $_SESSION['Auth_username'] = $user->getUsername();
                    $_SESSION['Auther_id'] = $user->getId();
                    $_SESSION['user_image'] = $user->getImage();

                    if ($user->getRoleId() === 1) {
                        header('Location:admin');
                        exit();
                    } else if ($user->getRoleId() === 2) {
                        header('Location:home');
                        exit();
                    }
                    
                } else {
                    $_SESSION['password'] = "Incorrect Password";
                    header("location:signin");
                }
            } else {
                $_SESSION['email'] = "Email doesn't exist";
                header("location:signin");
            }
        } else {
            header("location:signin");
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        header('location:signin');
        exit();
    }
}