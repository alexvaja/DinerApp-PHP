<?php
/**
 * Created by PhpStorm.
 * User: sabau
 * Date: 02-Feb-19
 * Time: 5:53 PM
 */

namespace App\Controllers;


use App\Models\User;
use Framework\Controller;

class RegisterController extends Controller
{

    private function checkInputDataIsEmpty($second_name, $first_name, $email, $password) : bool
    {
        if(!empty($second_name) && !empty($first_name) && !empty($email) && !empty($password))
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

        $second_name = $_POST["registerLastName"];
        $first_name = $_POST["registerFirstName"];
        $email = $_POST["registerEmail"];
        $password = $_POST["registerPassword"];

        $user->registerUser($second_name, $first_name, $email, $password);

        if(checkInputDataIsEmpty($second_name, $first_name, $email, $password))
        {
            //fac querry dupa email si daca nu mai exista e totul ok
            //aici fac validarile
            echo $this->view("pages/authenticatedUser.html", ["second_name" => $second_name, "first_name" => $first_name, "email" => $email]);
        }
        else
        {
            header("Location: /register");
        }
    }

}