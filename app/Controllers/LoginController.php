<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Controller;
use function Sodium\compare;

class LoginController extends Controller
{
    public function receivedExpectedParameters(string $email, $password) : bool
    {
        return (isset($email) && isset($password));
    }

    public function searchedEmail($var) : bool
    {
        if ($var->email == null)
        {
            return false;
        }
        return true;
    }

    //
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

        switch ($reqParam)
        {
            case "Register":
            {
                header("Location: /register");
                break;
            }
            case "Login":
            {
                if ($this->receivedExpectedParameters($email, $password))
                {
                    if ($this->searchedEmail($var))
                    {
                        if (password_verify($password, $var->password))
                        {
                            if ($var->user_type == "ADMIN")
                            {
                                session_start();
                                $_SESSION["user"] = $var;
//                                $_SESSION["email"] = $email;
//                                $_SESSION["first_name"] = $var->first_name;
//                                $_SESSION["last_name"] = $var->last_name;
//                                $_SESSION["user_type"] = "ADMIN";

                                header("Location: /main-page");
                            }
                            elseif ($var->user_type == "USER")
                            {
                                session_start();
                                $_SESSION["user"] = $var;
//                                $_SESSION["email"] = $email;
//                                $_SESSION["first_name"] = $var->first_name;
//                                $_SESSION["last_name"] = $var->last_name;
//                                $_SESSION["user_type"] = "USER";

                                header("Location: /main-page-user");
                            }
                            else
                            {
                                echo $this->view("pages/login.html");
                                //header("Location: /login");
                            }

                        }
                        else
                        {
                            echo $this->view("pages/login.html");
                            //header("Location: /login");
                        }
                    }
                    else
                    {
                        echo $this->view("pages/login.html", ["message" => "There is no account with this e-mail!"]);
                    }
                }
                else
                {
                    echo $this->view("pages/login.html", ["message" => "Please complete all fields!"]);
                }
                break;
            }
        }


//        if ($reqParam == "Register")
//        {
//            header("Location: /register");
//        }
//        elseif ($this->searchedEmail($var))
//        {
//            if (password_verify($password, $var->password))
//            {
//                session_start();
//                $_SESSION["email"] = $email;
//                $_SESSION["first_name"] = $var->first_name;
//                $_SESSION["last_name"] = $var->last_name;
//                //echo $_SESSION["email"];
//                //echo $this->view(["last_name" => "Vasile", "first_name" => "Lupul", "email" => $email]);
//                header("Location: /main-page");
//            }
//            else
//            {
//                header("Location: /login");
//            }
//        }
//        else
//        {
//            echo $this->view("pages/login.html");
//            echo "There is no account with this e-mail";
//        }
    }
}