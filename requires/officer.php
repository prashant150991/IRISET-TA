<?php


class Officer {

    private $name = "";
    private $designation = "";
    private $month = "";
    private $payBand = "-";
    private $basicPay = "-";
    private $dateOfJoining = "-";
    private $zoneOrUnit = "";
    private $division = "-";
    private $pfNumber = "-";
    private $perDayTA = 0;

    /**
     * Officer constructor.
     * @param string $name
     * @param string $designation
     * @param string $month
     * @param string $payBand
     * @param string $basicPay
     * @param string $dateOfJoining
     * @param string $zoneOrUnit
     * @param string $division
     * @param string $pfNumber
     * @param int $perDayTA
     */
    public function __construct($name, $designation, $month, $payBand, $basicPay, $dateOfJoining, $zoneOrUnit, $division, $pfNumber, $perDayTA)
    {
        $this->name = $name;
        $this->designation = $designation;
        $this->month = $month;
        $this->payBand = $payBand;
        $this->basicPay = $basicPay;
        $this->dateOfJoining = $dateOfJoining;
        $this->zoneOrUnit = $zoneOrUnit;
        $this->division = $division;
        $this->pfNumber = $pfNumber;
        $this->perDayTA = $perDayTA;
    }


    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDesignation() {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getMonth() {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth($month) {
        $this->month = $month;
    }

    /**
     * @return string
     */
    public function getPayBand() {
        return $this->payBand;
    }

    /**
     * @param string $payBand
     */
    public function setPayBand($payBand) {
        $this->payBand = $payBand;
    }

    /**
     * @return string
     */
    public function getBasicPay() {
        return $this->basicPay;
    }

    /**
     * @param string $basicPay
     */
    public function setBasicPay($basicPay) {
        $this->basicPay = $basicPay;
    }

    /**
     * @return string
     */
    public function getDateOfJoining() {
        return $this->dateOfJoining;
    }

    /**
     * @param string $dateOfJoining
     */
    public function setDateOfJoining($dateOfJoining) {
        $this->dateOfJoining = $dateOfJoining;
    }

    /**
     * @return string
     */
    public function getZoneOrUnit()
    {
        return $this->zoneOrUnit;
    }

    /**
     * @param string $zoneOrUnit
     */
    public function setZoneOrUnit($zoneOrUnit)
    {
        $this->zoneOrUnit = $zoneOrUnit;
    }

    /**
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * @param string $division
     */
    public function setDivision($division)
    {
        $this->division = $division;
    }

    /**
     * @return string
     */
    public function getPfNumber()
    {
        return $this->pfNumber;
    }

    /**
     * @param string $pfNumber
     */
    public function setPfNumber($pfNumber)
    {
        $this->pfNumber = $pfNumber;
    }

    /**
     * @return int
     */
    public function getPerDayTA()
    {
        return $this->perDayTA;
    }

    /**
     * @param int $perDayTA
     */
    public function setPerDayTA($perDayTA)
    {
        $this->perDayTA = $perDayTA;
    }



}