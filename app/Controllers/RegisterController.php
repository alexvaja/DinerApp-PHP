<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Controller;

class RegisterController extends Controller
{
    function receivedExpectedParameters() : bool
    {
        return (isset($_POST["registerLastName"]) && isset($_POST["registerEmail"]) && isset($_POST["registerPassword"]) && isset($_POST["registerFirstName"]));
    }

    function isEmailValid(string $email) : bool
    {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    function isPasswordValid(string $password) : bool
    {
        return !empty($password) && strlen($password) >= 6;
    }

    //
    public function checkInputDataIsEmpty(string $last_name, $first_name, $email, $password) : bool
    {
        if (!empty($last_name) && !empty($first_name) && !empty($email) && !empty($password))
        {
            return true;
        }
        return false;
    }

    public function checkEmailIsUnique($var) : bool
    {
        if ($var->email == null)
        {
            return true;
        }
        return false;
    }

    public function registerPage()
    {
        echo $this->view("pages/register.html");
    }

    public function registerNewUser()
    {
        $user = new User();

        $last_name = $_POST["registerLastName"];
        $first_name = $_POST["registerFirstName"];
        $email = $_POST["registerEmail"];
        $password = $_POST["registerPassword"];
        $reqParam = $_POST["submit"];

        $var = $user->find(["email" => $email]);

        //var_dump($user->find(["email" => $email]));

        if ($reqParam == "Back")
        {
            echo $this->view("pages/login.html");
        }
        elseif ($this->checkInputDataIsEmpty($last_name,$first_name,$email,$password))
        {
            if ($this->checkEmailIsUnique($var))
            {
                $user->registerUser($last_name, $first_name, $email, $password);
                echo $this->view("pages/main-page.html", ["second_name" => $last_name, "first_name" => $first_name, "email" => $email]);
            }
            else
            {
                echo $this->view("pages/register.html");
                echo "This email is already saved in data base!";
            }
        }
        else
        {
            header("Location: /register");
        }
    }

}