<?php


namespace DataLibrary;


use UserInterface\AddressModel;

class AddressProcessor
{
    public static function createUserAddress($userId, AddressModel $addressModel)
    {
        $sql = 'INSERT INTO addresses (userId, countryName, areaCode, cityName, streetName, houseNumber, flatNumber)
                                values(?,?,?,?,?,?,?)';

        return SqlDataAccess::saveData($sql, [
            $userId,
            $addressModel->getCountryName(),
            $addressModel->getAreaCode(),
            $addressModel->getCityName(),
            $addressModel->getStreetName(),
            $addressModel->getHouseNumber(),
            $addressModel->getFlatNumber()]);
    }
}