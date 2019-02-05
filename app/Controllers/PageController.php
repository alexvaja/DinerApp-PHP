<?php
namespace App\Controllers;

use Framework\Controller;

class PageController extends Controller
{
    public function aboutUsAction()
    {
        return $this->view("pages/about-us.html");
    }

}
