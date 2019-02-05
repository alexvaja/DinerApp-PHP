<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/5/2019
 * Time: 1:06 PM
 */

namespace App\Controllers;


use App\Models\Food;
use Framework\Controller;

class FoodController extends Controller
{
    public function loadFoodPage()
    {
        session_start();
        echo $this->view("pages/food.html");
    }

    public function modifyFoodPage()
    {
        echo $this->view("pages/food.html", ["name" => "Pizza"]);
    }

    public function checkInputDataIsEmpty(string $food_name, $food_ingredients, $food_price, $food_weight) : bool
    {
        if (!empty($food_name) && !empty($food_ingredients) && !empty($food_price) && !empty($food_weight))
        {
            return true;
        }
        return false;
    }
    public function addFoodAction()
    {
        $food = new Food();

        $food_name = $_POST["foodName"];
        $food_ingredients = $_POST["foodIngredients"];
        $food_price = $_POST["foodPrice"];
        $food_weight = $_POST["foodWeight"];

        if($this->checkInputDataIsEmpty($food_name,$food_ingredients,$food_price, $food_weight))
        {
            $food->addFoodToBataDase($food_name, $food_ingredients, $food_price, $food_weight);
            echo $this->view("pages/food.html");
        }
        else
        {
            echo $this->view("pages/food.html", ["mes" => "Va rugam completati toate campurile"]);
        }
    }
}

session_destroy();