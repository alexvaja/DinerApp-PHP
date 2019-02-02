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
    public function registerPage()
    {
        echo $this->view("pages/register.html");
    }

    public function registerNewUser()
    {
        $nume = $_POST["NumeInregistrare"];
        $prenume = $_POST["PrenumeInregistrare"];
        $email = $_POST["EmailInregistrare"];
        $parola = $_POST["ParolaInregistrare"];

        $user = new User();
        if($user->registerUser($nume,$prenume,$email,$parola))
        {
            //fac querry dupa email si daca nu mai exista e totul ok
            //aici fac validarile
            echo $this->view("pages/authenticatedUser", ["nume" => $nume, "prenume" => $prenume, "email" => $email]);
        }
        else
        {
            header("Location: /register");
        }
    }

}