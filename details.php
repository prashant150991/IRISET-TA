<?php


class Details {

    private $date = "";
    private $startDate = "";
    private $endDate = "";
    private $train = "";
    private $depTime = "";
    private $arrTime = "";
    private $fromStation = "";
    private $toStation = "";
    private $objective = "";
    private $distance = "";
    private $days = "";
    private $conti = true;

    /**
     * Details constructor.
     * @param string $date
     * @param string $startDate
     * @param string $endDate
     * @param string $train
     * @param string $depTime
     * @param string $arrTime
     * @param string $fromStation
     * @param string $toStation
     * @param string $objective
     * @param string $distance
     * @param string $days
     */
    public function __construct($date, $startDate, $endDate, $train, $depTime, $arrTime, $fromStation, $toStation, $objective, $distance, $days, $conti) {
        $this->date = $date;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->train = $train;
        $this->depTime = $depTime;
        $this->arrTime = $arrTime;
        $this->fromStation = $fromStation;
        $this->toStation = $toStation;
        $this->objective = $objective;
        $this->distance = $distance;
        $this->days = $days;
        $this->conti = $conti;
    }


    /**
     * @return string
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @return bool
     */
    public function getConti() {
        return $this->conti;
    }

    /**
     * @param bool $conti
     */
    public function setConti($conti) {
        $this->conti = $conti;
    }

    /**
     * @param string $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getStartDate() {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate() {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getTrain() {
        return $this->train;
    }

    /**
     * @param string $train
     */
    public function setTrain($train) {
        $this->train = $train;
    }

    /**
     * @return string
     */
    public function getDepTime() {
        return $this->depTime;
    }

    /**
     * @param string $depTime
     */
    public function setDepTime($depTime) {
        $this->depTime = $depTime;
    }

    /**
     * @return string
     */
    public function getArrTime() {
        return $this->arrTime;
    }

    /**
     * @param string $arrTime
     */
    public function setArrTime($arrTime) {
        $this->arrTime = $arrTime;
    }

    /**
     * @return string
     */
    public function getFromStation() {
        return $this->fromStation;
    }

    /**
     * @param string $fromStation
     */
    public function setFromStation($fromStation) {
        $this->fromStation = $fromStation;
    }

    /**
     * @return string
     */
    public function getToStation() {
        return $this->toStation;
    }

    /**
     * @param string $toStation
     */
    public function setToStation($toStation) {
        $this->toStation = $toStation;
    }

    /**
     * @return string
     */
    public function getObjective() {
        return $this->objective;
    }

    /**
     * @param string $objective
     */
    public function setObjective($objective) {
        $this->objective = $objective;
    }

    /**
     * @return string
     */
    public function getDistance() {
        return $this->distance;
    }

    /**
     * @param string $distance
     */
    public function setDistance($distance) {
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getDays() {
        return $this->days;
    }

    /**
     * @param string $days
     */
    public function setDays($days) {
        $this->days = $days;
    }




}