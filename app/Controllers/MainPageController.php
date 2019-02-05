<?php

namespace App\Controllers;

use Framework\Controller;

class MainPageController extends Controller
{

    public function loadMainPage()
    {
        echo $this->view("pages/main-page.html");
    }

    public function loadAction()
    {

    }

}