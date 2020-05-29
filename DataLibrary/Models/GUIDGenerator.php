<?php


namespace DataLibrary;


class GUIDGenerator
{
    const PERMITTEDCHARS = '0123456789abcdefghijklmnopqrstuvwxyz';

    public static function getGUID()
    {
        return substr(str_shuffle(self::PERMITTEDCHARS), 0, 32);
    }
}