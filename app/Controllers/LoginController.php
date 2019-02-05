<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Controller;

class LoginController extends Controller
{
    public function searchedEmail($var) : bool
    {
        if ($var->email == null)
        {
            return false;
        }
        return true;
    }

    public function loginPage()
    {
        echo $this->view("pages/login.html");
    }

    public function loginUser()
    {
        $user = new User();

        $email = $_POST["loginEmail"];
        $password = $_POST["loginPassword"];
        $reqParam = $_POST["submit"];

        $var = $user->find(["email" => $email]);

        if ($reqParam == "Register")
        {
            header("Location: /register");
        }
        elseif ($this->searchedEmail($var))
        {
            if (password_verify($password, $var->password))
            {
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["first_name"] = $var->first_name;
                $_SESSION["last_name"] = $var->last_name;

                //echo $this->view(["last_name" => "Vasile", "first_name" => "Lupul", "email" => $email]);
                header("Location: /main-page");
            }
            else
            {
                header("Location: /login");
            }
        }
        else
        {
            echo $this->view("pages/login.html");
            echo "There is no account with this e-mail";
        }
    }
}