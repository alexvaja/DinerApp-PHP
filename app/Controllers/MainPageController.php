<?php

namespace App\Controllers;

use Framework\Controller;
use App\Models\Food;
class MainPageController extends Controller
{

    public function loadAdminMainPage()
    {
        session_start();
        $foodModel = new Food();

        $foods = $foodModel->getAll();
        echo $this->view("pages/main-page.html", ["foods" => $foods]);
    }

    public function mainPageAction()
    {
        $foodModel = new Food();

        $value = reset($_POST);

        $id = array_search($value, $_POST);

        switch ($value)
        {
            case "Delete" :
            {
                $wasDeleted = $foodModel->deleteFoodFromTableById($id);

                if ($wasDeleted)
                {
                    $foods = $foodModel->getAll();
                    echo $this->view("pages/main-page.html", ["foods" => $foods]);
                }
                else
                {
                    $foods = $foodModel->getAll();
                    echo $this->view("pages/main-page.html", ["foods" => $foods]);
                }
                break;
            }
            case "Edit" : //termina aici!!!
            {
                echo "Am intrat in edit";
                $wasUpdated = "";


                if ($wasUpdated)
                {
                    $foods = $foodModel->getAll();
                    echo $this->view("pages/main-page.html", ["foods" => $foods]);
                }
                else
                {
                    $foods = $foodModel->getAll();
                    echo $this->view("pages/main-page.html", ["foods" => $foods]);
                }

                break;
            }
            case "LogOut" :
            {
                session_start();
                session_destroy();
                //$_SESSION = array();
                header("Location: /login");
                break;
            }

        }
    }

}