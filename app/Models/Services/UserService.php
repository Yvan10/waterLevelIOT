<?php

namespace Models\Services;


use Models\Brokers\UserBroker;
use Models\User;
use Models\Validators\UserValidator;
use stdClass;
use Zephyrus\Application\Form;

class UserService
{
    public static function registerHandler(Form $form): stdClass
    {
        UserValidator::assert($form);
        $broker = new UserBroker();
        $userId = $broker->insertUser(new User($form->buildObject()));
        return $broker->findById($userId);
    }

    public static function read(int $id): ?stdClass
    {
        return (new UserBroker())->findById($id);
    }
}