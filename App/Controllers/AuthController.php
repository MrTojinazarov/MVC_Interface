<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{

    public function __construct()
    {
        layout('loginMain');
    }

    public function loginPage()
    {
        return view("login", "Login");
    }

    public function registerPage()
    {
        return view("register", "Registration");
    }

    public function login()
    {
        if (isset($_POST['ok'])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {

                $data = [
                    'login' => $_POST['email'],
                    'password' => $_POST['password']
                ];

                $obj = new User();

                $user = $obj->getUserByLogin($data);
                if ($user) {
                    $_SESSION['Auth'] = $user;
                    header("Location: /");
                    exit();
                } else {
                    header("Location: /login");
                    exit();
                }
            }
        }
    }

    public function register()
    {
        if (isset($_POST['ok'])) {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

                $data = [
                    'name' => $_POST['name'],
                    'login' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                $obj = new User();

                $userExists = $obj->CheckUserExists($data);
                if ($userExists) {
                    header("Location: /register");
                    exit();
                } else {
                    $_SESSION['Auth'] = $obj->createUser($data);
                    header("Location: /");
                    exit();
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['Auth']);
        header("Location: /login");
        exit();
    }
}
