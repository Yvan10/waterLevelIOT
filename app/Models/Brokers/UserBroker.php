<?php

namespace Models\Brokers;


use Models\Person;
use Models\User;
use stdClass;
use Zephyrus\Security\Cryptography;

class UserBroker extends Broker
{
    public function insertUser(User $user): int
    {
        $sql = 'insert into "user" (email,password,username) values (?, ?, ?) returning id';
        return $this->selectSingle($sql, [
            $user->getEmail(),
            $user->generatePassword(),
            $user->getUsername(),
        ])->id;
    }

    public function insertData(stdClass $data): int
    {
        $sql = 'insert into "waterLevel" (data) values (?) ORDER BY id desc LIMIT 1 returning id';
        return $this->selectSingle($sql, [
            $data->distance
        ])->id;
    }

    public function findUser(stdClass $user) {
        $sql = 'SELECT password,id FROM  "user"  WHERE email = ? ';
        return $this->selectSingle($sql, [$user->email]);
    }




    public function getUser(stdClass $user) : ?stdClass
    {
        $sql = 'SELECT * from "user" WHERE username = ?';
        return $this->selectSingle($sql, [$user->username]);
    }

    public function getAllUsername(){
        $sql = 'SELECT * from "user"';
        return $this->select($sql);
    }

    public function updatePassword(int $id, $password)
    {
        $sql = 'UPDATE "user" SET password = ? WHERE id = ?';
        return $this->query($sql, [$password, $id]);
    }

    public function findByUsername($username): ?stdClass
    {
        $sql = 'select * from "user" u where u.username = ?';
        return $this->selectSingle($sql, [$username]);
    }

    public function getEmailFromId(int $id) : ?string
    {

        $sql = 'SELECT u.email FROM "user" u WHERE u.id = ?';
        $result = $this->selectSingle($sql, [$id]);

        return $result->email ?? '';
    }



    public function findById(int $userId): ?stdClass {
        return $this->selectSingle('SELECT * FROM  "user" u WHERE u.id = ?', [
            $userId
        ]);
    }



    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM "user" u WHERE u.email = ?';
        return $this->selectSingle($sql, [$email]);
    }
}