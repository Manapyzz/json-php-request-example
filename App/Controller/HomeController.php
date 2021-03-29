<?php

namespace App\Controller;

use App\Model\AccountModel;
use Framework\Controller;

class HomeController extends Controller
{

    public function homepage()
    {
        $accountModel = new AccountModel();
        $accounts = $accountModel->getAll();

        $this->renderTemplate('homepage.html.twig', [
            'accounts' => $accounts
        ]);
    }

    public function searchAccount()
    {
        $accounts = [];

        if (isset($_GET['search']) && strlen($_GET['search']) > 0)
        {
            $accountModel = new AccountModel();
            $accounts = $accountModel->search($_GET['search']);
        }

        $this->renderTemplate('account-list.html.twig', [
            'accounts' => $accounts
        ]);
    }
}