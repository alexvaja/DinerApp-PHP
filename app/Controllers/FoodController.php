<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/5/2019
 * Time: 1:06 PM
 */

namespace App\Controllers;


use Framework\Controller;

class FoodController extends Controller
{
    public function loadFoodPage()
    {
        echo $this->view("pages/food.html");
    }
}