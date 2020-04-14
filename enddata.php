<?php


class EndData {

    private $type = "-";
    private $date = "-";
    private $startDate = "-";
    private $endDate = "-";
    private $depTime = "-";
    private $arrTime = "-";
    private $fromStation = "-";
    private $toStation = "-";
    private $train = "-";
    private $objective = "-";
    private $distance = "-";
    private $days = "-";

    /**
     * EndData constructor.
     * @param string $type
     * @param string $date
     * @param string $startDate
     * @param string $endDate
     * @param string $depTime
     * @param string $arrTime
     * @param string $fromStation
     * @param string $toStation
     * @param string $objective
     * @param string $distance
     * @param string $days
     */
//    public function __construct($type, $date, $startDate, $endDate, $depTime, $arrTime, $fromStation, $toStation, $train, $objective, $distance, $days) {
//        $this->type = $type;
//        $this->date = $date;
//        $this->startDate = $startDate;
//        $this->endDate = $endDate;
//        $this->depTime = $depTime;
//        $this->arrTime = $arrTime;
//        $this->fromStation = $fromStation;
//        $this->toStation = $toStation;
//        $this->train = $train;
//        $this->objective = $objective;
//        $this->distance = $distance;
//        $this->days = $days;
//    }

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
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDate() {
        return $this->date;
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