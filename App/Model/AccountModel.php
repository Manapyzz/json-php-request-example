<?php

namespace App\Model;

use Framework\Model;
use PDO;

class AccountModel extends Model
{
    public function getAll()
    {
        $db = $this->getDb();
        $stmt = $db->prepare('SELECT * FROM account');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get(int $id)
    {
        $db = $this->getDb();
        $stmt = $db->prepare('SELECT * FROM account WHERE id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(int $amount, string $number, int $userId)
    {
        $db = $this->getDb();
        $stmt = $db->prepare('INSERT INTO `account`(`amount`, `number`, `user_id`) VALUES (:amount, :number, :userId)');
        return $stmt->execute([
            'amount' => $amount,
            'number' => $number,
            'userId' => $userId,
        ]);
    }

    public function search($accountNumber)
    {
        $db = $this->getDb();
        $stmt = $db->prepare('SELECT * FROM account WHERE number LIKE :accountNumber');
        $stmt->execute([
            'accountNumber' => '%'.$accountNumber.'%'
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}