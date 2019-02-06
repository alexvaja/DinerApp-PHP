<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Controller;

class RegisterController extends Controller
{
    function receivedExpectedParameters(string $last_name, $first_name, $email, $password, $confirmPassword) : bool
    {
        return (isset($last_name) && isset($first_name) && isset($email) && isset($password) && isset($confirmPassword));
    }

    function isEmailValid(string $email) : bool
    {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    function isPasswordValid(string $password, $confirmPassword) : bool
    {
        if (!empty($password) && strlen($password) >= 6 && !empty($confirmPassword) && strlen($confirmPassword) >= 6)
        {
            if ($password == $confirmPassword)
            {
                return true;
            }
        }
        return false;
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
        $confirmPassword = $_POST["registerConfirmPassword"];
        $reqParam = $_POST["submit"];

        $var = $user->find(["email" => $email]);

        //var_dump($user->find(["email" => $email]));

        switch ($reqParam)
        {
            case "Back" :
            {
                echo $this->view("pages/login.html");
                break;
            }
            case "Sign Up" :
            {
                if ($this->receivedExpectedParameters($last_name, $first_name, $email, $password, $confirmPassword))
                {
                    if (!($this->isEmailValid($email) && $this->checkEmailIsUnique($var)))
                    {
                        if ($this->isPasswordValid($password, $confirmPassword))
                        {
                            $user->registerUser($last_name, $first_name, $email, $password);

                            session_start();
                            $_SESSION["user"] = $var;
    //                        $_SESSION["email"] = $email;
    //                        $_SESSION["first_name"] = $var->first_name;
    //                        $_SESSION["last_name"] = $var->last_name;
    //                        $_SESSION["user_type"] = "USER";

                            header("Location: /main-page-user");
                        }
                        else
                        {
                            echo $this->view("pages/register.html", ["message" => "Passwords must be the same!"]);
                        }
                    }
                    else
                    {
                        echo $this->view("pages/register.html", ["message" => "This email is already saved in data base!"]);
                    }
                }
                else
                {
                    echo $this->view("pages/register.html", ["message" => "Please complete all fields!"]);
                }
                break;
            }
        }
    }

}