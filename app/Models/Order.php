<?php

namespace App\Models;

use Framework\Model;

class order extends Model
{
    protected $table = "orders";

    public function addInTableNewDate($id_user, $id_food, $date, $quantity)
    {
        Model::new(["id_user" => $id_user, "id_food" => $id_food, "quantity" => $quantity, "date" => $date]);
    }

    public function getAllOrderfFromTable()
    {
        return $this->getAll();
    }
}