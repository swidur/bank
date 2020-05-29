<?php


namespace UserInterface;


class IdDocumentModel
{

    protected $docType;
    protected $docSeries;
    protected $docNumber;
    protected $issuerName;
    protected $validDate;


//    region Getters and Setters

    /**
     * @return mixed
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * @param mixed $docType
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;
    }

    /**
     * @return mixed
     */
    public function getDocSeries()
    {
        return $this->docSeries;
    }

    /**
     * @param mixed $docSeries
     */
    public function setDocSeries($docSeries)
    {
        $this->docSeries = $docSeries;
    }

    /**
     * @return mixed
     */
    public function getDocNumber()
    {
        return $this->docNumber;
    }

    /**
     * @param mixed $docNumber
     */
    public function setDocNumber($docNumber)
    {
        $this->docNumber = $docNumber;
    }

    /**
     * @return mixed
     */
    public function getIssuerName()
    {
        return $this->issuerName;
    }

    /**
     * @param mixed $issuerName
     */
    public function setIssuerName($issuerName)
    {
        $this->issuerName = $issuerName;
    }

    /**
     * @return mixed
     */
    public function getValidDate()
    {
        return $this->validDate;
    }

    /**
     * @param mixed $validDate
     */
    public function setValidDate($validDate)
    {
        $this->validDate = $validDate;
    }
//endregion
}