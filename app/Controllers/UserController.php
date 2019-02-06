<?php

namespace App\Controllers;

use App\Models\Food;
use App\Models\Order;
use Framework\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function showAction($id)
    {
        $user = (new User)->get($id);

        return $this->view('user/show.html', ["user" => $user]);
    }

    //
    public function loadUserMainPage()
    {
        echo $this->view("pages/main-page-user.html");
    }

    public function userPageAction()
    {

    }

    public function loadOrder()
    {
        $foodModel = new Food();
        $foods = $foodModel->getAll();
        echo $this->view("pages/order.html", ["foods" => $foods]);
    }

    public function addOrder()
    {
        session_start();
        //var_dump($_SESSION["user"]);
        $id_user = $_SESSION["user"]->id;
        $id_food = $_POST["checkboxValue"];
        $date = $_POST["orderDate"];
        $orderModel = new Order();

        $orderModel->addInTableNewDate($id_user, $id_food, $date, 1);

        header("Location: /main-page-user");
        //echo $this->view("pages/order.html");
    }

}
