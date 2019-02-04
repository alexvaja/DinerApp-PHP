<?php
/**
 * Created by PhpStorm.
 * User: sabau
 * Date: 02-Feb-19
 * Time: 6:21 PM
 */

namespace App\Controllers;


use App\Models\User;
use Framework\Controller;

class LoginController extends Controller
{
    public function loginPage()
    {
        echo $this->view("pages/login.html");
    }

    public function loginUser()
    {
        $second_name = "pula";
        $first_name = "mea";
        $email = $_POST["loginEmail"];
        $password = $_POST["loginPassword"];

        $user = new User();
        //$user->searchForUserAtLogin($email,$parola)

        if(true)
        {
            echo $this->view("pages/authenticatedUser.html", ["second_name" => $second_name, "first_name" => $first_name, "email" => $email]);
        }
        else
        {
            header("Location: /login");
        }
    }
}