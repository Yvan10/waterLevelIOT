<?php namespace Models\Validators;

use Models\Brokers\UserBroker;
use Zephyrus\Application\Rule;

class CustomRule
{
    public static function userAvailable(string $errorMessage = ""): Rule
    {
        return new Rule(function($data) {
            /**
             * Example of custom rule that could verify user availability
             * from Database.
             */
            return !in_array($data, ['blewis', 'dtucker', 'admin', 'root']);
        }, $errorMessage);
    }

    public static function usernameAvailable(int $userId, string $errorMessage = ""): Rule
    {
        return new Rule(function ($username) use($userId) {
            $user = (new UserBroker())->findByUsername($username, true);
            if (is_null($user)) return true;
            return $userId == 0 ? false : $user->id == $userId;
        }, $errorMessage);
    }



}
