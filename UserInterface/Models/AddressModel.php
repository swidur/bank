<?php


namespace UserInterface;


class AddressModel
{
    protected $countryName;
    protected $areaCode;
    protected $cityName;
    protected $streetName;
    protected $houseNumber;
    protected $flatNumber;

//    region Getters and Setters

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }


    /**
     * @return mixed
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param mixed $areaCode
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param mixed $cityName
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * @return mixed
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param mixed $streetName
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    /**
     * @return mixed
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @param mixed $houseNumber
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return mixed
     */
    public function getFlatNumber()
    {
        return $this->flatNumber;
    }

    /**
     * @param mixed $flatNumber
     */
    public function setFlatNumber($flatNumber)
    {
        $this->flatNumber = $flatNumber;
    }
//    endregion
}