<?php

namespace Models;

use stdClass;
use Zephyrus\Security\Cryptography;

 class User
{

     private string $username;
     private string $password;
     private string $email;



    public function __construct(stdClass $user)
    {
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function generatePassword(): string
    {
        return Cryptography::hashPassword($this->password);
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }



}