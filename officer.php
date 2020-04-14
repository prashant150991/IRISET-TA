<?php


class Officer {

    private $name = "";
    private $designation = "";
    private $month = "";
    private $payBand = "";
    private $basicPay = "";
    private $dateOfJoining = "";

    /**
     * Officer constructor.
     * @param string $name
     * @param string $designation
     * @param string $month
     * @param string $payBand
     * @param string $basicPay
     * @param string $dateOfJoining
     */
    public function __construct($name, $designation, $month, $payBand, $basicPay, $dateOfJoining) {
        $this->name = $name;
        $this->designation = $designation;
        $this->month = $month;
        $this->payBand = $payBand;
        $this->basicPay = $basicPay;
        $this->dateOfJoining = $dateOfJoining;
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



}