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

//        $emailFromDatabase = $user->getRowByField('email', $email);
//        $passwordFromDatabase = $user->getRowByField('password', $password);

        $var = $user->find(["email" => $email]);

        if ($this->searchedEmail($var))
        {
            if (password_verify($password, $var->password))
            {
                echo $this->view("pages/authenticatedUser.html", ["Email" => $email]);
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