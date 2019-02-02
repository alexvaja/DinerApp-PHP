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
        $email = $_POST["loginEmail"];
        $parola= $_POST["loginPassword"];

        $user = new User();
        if($user->searchForUserAtLogin($email,$parola))
        {
            echo $this->view("pages/authenticatedUser");
        }
        else
        {
            header("Location: /login");
        }
    }
}