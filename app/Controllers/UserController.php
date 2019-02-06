<?php

namespace App\Controllers;

use Framework\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function loadUserMainPage()
    {
        echo $this->view("pages/main-page-user.html");
    }

    public function showAction($id)
    {
        $user = (new User)->get($id);

        return $this->view('user/show.html', ["user" => $user]);
    }


}
