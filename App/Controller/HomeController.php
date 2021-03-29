<?php

namespace App\Controller;

use Framework\Controller;

class HomeController extends Controller
{

    public function homepage()
    {
        $this->renderTemplate('homepage.html.twig');
    }
}