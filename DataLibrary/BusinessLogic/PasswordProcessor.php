<?php


namespace DataLibrary;


class PasswordProcessor
{
    const ALGO = PASSWORD_DEFAULT;
    const COST = 10;

    public static function hashPassword($password)
    {

        return password_hash($password,
            PasswordProcessor::ALGO,
            [PasswordProcessor::COST]);
    }

    public static function verifyPassword($password, $hash)
    {
        return PasswordProcessor::hashPassword($password) === $hash;
    }
}