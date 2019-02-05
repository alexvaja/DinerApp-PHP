<?php

namespace App\Models;

use Framework\Model;

class Food extends Model
{
    protected $table = "food";

//    public function addFoodToBataDase($food_name, $food_ingredients, $food_price, $food_weight)
//    {
//        Model::new(["food_name" => $food_name, "food_ingredients" =>$food_ingredients, "food_price" => $food_price, "food_weight" => $food_weight]);
//    }

    public function addFoodToBataDase($food_name, $food_ingredients, $food_price, $food_weight)
    {
        $vatr = ["food_name" => $food_name, "food_ingredients" => $food_ingredients, "food_price" => $food_price, "food_weight" => $food_weight];
        Model::new($vatr);
    }

    public function deleteFoodFromTableById($id) : bool
    {
        return $this->delete($id);
    }

    public function updateFoodFromTableById(array $where, array $data) : bool
    {
        return $this->update($where, $data);
    }
}