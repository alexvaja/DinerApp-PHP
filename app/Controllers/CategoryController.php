<?php

namespace App\Controllers;
use Framework\Controller;

class CategoryController extends Controller
{
    public function loadCategoryPage()
    {
        echo $this->view("pages/category.html");
    }


}