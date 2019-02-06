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

    public function loadUser()
    {
        session_start();
        $user = $_SESSION["user"];
        echo $this->view('pages/view-profile.html', ["user" => $user]);
    }

    public function loadUserAction()
    {
        session_start();
        $reqParam = $_POST["submit"];
        $user = $_SESSION["user"];

        switch ($reqParam)
        {
            case "LogOut" :
            {
                session_start();
                session_destroy();
                header("Location: /login");
                break;
            }
            case "Delete account" :
            {
                header("Location: /delete");
            }
        }


        echo $this->view('pages/view-profile.html', ["user" => $user]);
    }

    public function deleteUser()
    {
        echo $this->view('pages/delete.html');
    }

    public function deleteUserAction()
    {
        $reqParam = $_POST["submit"];

        switch ($reqParam)
        {
            case "LogOut" :
            {
                session_start();
                session_destroy();
                header("Location: /login");
                break;
            }
            case "Back" :
            {
                header("Location: /user");
                break;
            }
            case "Delete" :
            {
                session_start();
                $user = $_SESSION["user"];
                $password =$_POST["loginPassword"];
                $confirmPassword =$_POST["loginConfirmPassword"];

                if ($password == $confirmPassword)
                {
                    if (password_verify($password, $user->password))
                    {
                        $userModel = new User();
                        if ($userModel->delete($user->id))
                        {
                            session_destroy();
                            header("Location: /login");
                        }
                        else
                        {
                            echo $this->view('pages/delete.html',  ["message" => "Something gone wrong!"]);
                        }
                    }
                    else
                    {
                        echo $this->view('pages/delete.html',  ["message" => "Wrong password!"]);
                    }
                }
                else
                {
                    echo $this->view('pages/delete.html',  ["message" => "Passwords must be the same!"]);
                }
                break;
            }
        }

        //echo $this->view('pages/delete.html');
    }

    //
    public function loadUserMainPage()
    {
        session_start();
        $user = $_SESSION["user"];
        $datas = array();

        $orderModel = new Order();
        $foodModel = new Food();
        $orders = $orderModel->getAllOrderfFromTable();
        $foods = $foodModel->getAllFoodFromTable();

        foreach ($orders as $order)
        {
            if ($order->id_user == $user->id)
            {
                array_push($datas, $order);
            }
        }

        echo $this->view("pages/main-page-user.html", ["orders" => $datas, "foods" => $foods]);
    }

    public function userPageAction()
    {
        $reqParam = $_POST["submit"];

        switch ($reqParam)
        {
            case "LogOut" :
            {
                session_start();
                session_destroy();
                header("Location: /login");
                break;
            }
        }
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
        $id_user = $_SESSION["user"]->id;
        $id_food = $_POST["checkboxValue"];
        $date = $_POST["orderDate"];
        $orderModel = new Order();

        $orderModel->addInTableNewDate($id_user, $id_food, $date, 1);

        header("Location: /main-page-user");
    }

    public function viewAllFood()
    {
        $foodModel = new Food();
        $foods = $foodModel->getAllFoodFromTable();
        $reqParam = $_POST["submit"];

        switch ($reqParam)
        {
            case "LogOut" :
            {
                session_start();
                session_destroy();
                header("Location: /login");
                break;
            }
        }

        echo $this->view("pages/view-food.html", ["foods" => $foods]);
    }

}
