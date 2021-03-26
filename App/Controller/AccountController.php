<?php

namespace App\Controller;

use App\Model\AccountModel;

class AccountController
{
    public function getAll()
    {
        $accountModel = new AccountModel();
        $accounts = $accountModel->getAll();

        $response = [
            'status' => 'success',
            'message' => '',
            'data' => $accounts
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get(int $id)
    {
        $response = [
            'status' => 'error',
            'message' => 'account does not exist',
            'data' => null
        ];

        $accountModel = new AccountModel();
        $account = $accountModel->get($id);

        if (!empty($account))
        {
            $response = [
                'status' => 'success',
                'message' => '',
                'data' => $account
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function create()
    {
        $requestParameters = json_decode(file_get_contents('php://input'), true);

        $response = [
            'status' => 'error',
            'message' => 'could not create account',
            'data' => null
        ];

        $accountModel = new AccountModel();
        $isAccountHasBeenCreated = $accountModel->create($requestParameters['amount'], $requestParameters['number'], $requestParameters['userId']);

        if ($isAccountHasBeenCreated)
        {
            $response = [
                'status' => 'success',
                'message' => 'account has been created',
                'data' => null
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}