<?php
namespace App\Guards;

use Framework\Guard;

class Authenticated implements Guard
{
    public function handle(array $params = null)
    {
        session_start();
        if (!isset($_SESSION['email']))
            $this->reject();
    }

    public function reject()
    {
        header("Location: /login");
    }
}
