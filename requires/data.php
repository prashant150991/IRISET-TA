<?php

//include 'officer.php';

class Data {

    private $officerData;
    private $details;
    private $count;

    /**
     * @return mixed
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count) {
        $this->count = $count;
    }

    public function setOfficer($officer) {

        $officerData = new Officer();
        $this->officerData->setName($officer->name);
        $this->officerData->setDesignation($officer->designation);
        $this->officerData->setMonth($officer->month);
        $this->officerData->setPayBand($officer->payBand);
        $this->officerData->setBasicPay($officer->basicPay);
        $this->officerData->setDateOfJoining($officer->dateOfJoining);
        $this->officerData->setZoneOrUnit($officer->zoneOrUnit);
        $this->officerData->setDivision($officer->division);
        $this->officerData->setPfNumber($officer->pfNumber);
        $this->officerData->setPerDayTA($officer->perDayTA);
        return $officerData;

    }

    public function __construct($officerData, $details, $count) {

        $this->officerData = new Officer($officerData->getName(),
            $officerData->getDesignation(), $officerData->getMonth(), $officerData->getPayBand(),
            $officerData->getBasicPay(), $officerData->getdateOfJoining(), $officerData->getZoneOrUnit(), $officerData->getDivision(), $officerData->getPfNumber(), $officerData->getPerDayTA());

        $this->details = [];
        $this->details = $details;
        $this->count = $count;

    }

    /**
     * @return mixed
     */
    public function getOfficerData() {
        return $this->officerData;
    }

    /**
     * @param mixed $officerData
     */
    public function setOfficerData($officerData) {
        $this->officerData = $officerData;
    }

    /**
     * @return mixed
     */
    public function getDetails() {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details) {
        $this->details = $details;
    }



}