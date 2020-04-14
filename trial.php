<?php

include 'officer.php';
include 'details.php';
include 'data.php';
include 'enddata.php';
include 'display.php';

class Trial {

    /**
     * Trial constructor.
     */
    public function __construct() {



    }

    /**
     * Utility function to display in a formatted way.
     */
    public function display($data) {

//        echo "<pre>";
//        var_dump($data);
//        echo "<pre>";

    }

    public function tabularDisplay($data) {

        echo "<table border = '1px solid black'>";

        echo "<th>";
        echo "Date";
        echo "</th>";
        echo "<th>";
        echo "Train";
        echo "</th>";
        echo "<th>";
        echo "Dep Time";
        echo "</th>";
        echo "<th>";
        echo "Arr Time";
        echo "</th>";
        echo "<th>";
        echo "From Stn";
        echo "</th>";
        echo "<th>";
        echo "To Stn";
        echo "</th>";
        echo "<th>";
        echo "Distance";
        echo "</th>";
        echo "<th>";
        echo "Days";
        echo "</th>";
        echo "<th>";
        echo "Objective";
        echo "</th>";
        for ($i = 0; $i < count($data); $i++) {
//            $this->display($row);
            echo "<tr>";
            echo "<td>";
            echo $data[$i]->getDate();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getTrain();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getDepTime();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getArrTime();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getFromStation();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getToStation();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getDistance();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getDays();
            echo "</td>";
            echo "<td>";
            echo $data[$i]->getObjective();
            echo "</td>";
            echo "</tr>";

        }

        echo "</table>";

    }

    /**
     * Utility function to redirect to a specified URL.
     */
    public function redirect($url) {

        header('Location:'.$url);

    }

    public function formatDate($date) {

        $date = strtotime($date);
        return date("d-M-Y",$date);

    }

    public function getData() {

        if (isset($_POST['tutu'])) {

//            echo "hello";

            $officerData = $this->setOfficerData();
            $detailsData = $this->setDetailsData();
            $data = new Data($officerData, $detailsData, count($detailsData));
//            $this->display($officerData);
//            $this->display($detailsData);
            return $data;

        }
        else {

//            echo "hellommmm";
            $this->redirect("./form3.php");

        }

    }

    public function setOfficerData() {

        $name = trim($_POST['name']);
        $designation = trim($_POST['designation']);
        $month = trim($_POST['month']);
        $payBand = trim($_POST['payBand']);
        $basicPay = trim($_POST['basicPay']);
        $dateOfJoining = trim($_POST['dateOfJoining']);

        $officerData = new Officer($name, $designation, $month, $payBand, $basicPay, $dateOfJoining);
//        $this->display($officerData);
        return $officerData;

    }

    public function setDetailsData() {

        $array = [];

        if (isset($_POST['tutu'])) {

            $rows = $_POST['ttt'];
//            $this->display("ttt = ".$rows);
            $truee = 1;
            $counter = 1;
            while ($truee <= $rows) {

                $startDate = "startDate_".$counter;
                $endDate = "endDate_".$counter;
                $train = "train_".$counter;
                $depTime = "depTime_".$counter;
                $arrTime = "arrTime_".$counter;
                $fromStation = "fromStation_".$counter;
                $toStation = "toStation_".$counter;
                $objective = "objective_".$counter;
                $distance = "distance_".$counter;
                $days = "days_".$counter;

                if (!isset($_POST[$startDate]) || $_POST[$startDate] == "") {

                    if ($truee == $rows) {
                        break;
                    }
                    else {
                        $counter++;
                    }

                }
                else {
                    if (isset($_POST[$startDate])) {
                        $startDate = $this->formatDate(trim($_POST[$startDate]));
                    }
                    else {
                        $startDate = "";
                    }
                    if (isset($_POST[$endDate])) {
                        $endDate = $this->formatDate(trim($_POST[$endDate]));
                    }
                    else {
                        $endDate = "";
                    }
                    if (isset($_POST[$train])) {
                        $train = trim($_POST[$train]);
                    }
                    else {
                        $train = "";
                    }
                    if (isset($_POST[$depTime])) {
                        $depTime = trim($_POST[$depTime]);
                    }
                    else {
                        $depTime = "";
                    }
                    if (isset($_POST[$arrTime])) {
                        $arrTime = trim($_POST[$arrTime]);
                    }
                    else {
                        $arrTime = "";
                    }
                    if (isset($_POST[$fromStation])) {
                        $fromStation = trim($_POST[$fromStation]);
                    }
                    else {
                        $fromStation = "";
                    }
                    if (isset($_POST[$toStation])) {
                        $toStation = trim($_POST[$toStation]);
                    }
                    else {
                        $toStation = "";
                    }
                    if (isset($_POST[$objective])) {
                        $objective = trim($_POST[$objective]);
                    }
                    else {
                        $objective = "";
                    }
                    if (isset($_POST[$distance])) {
                        $distance = trim($_POST[$distance]);
                    }
                    else {
                        $distance = "";
                    }
                    $days = "";
                    $details = new Details("", $startDate, $endDate, $train, $depTime, $arrTime, $fromStation, $toStation, $objective, $distance, $days);
                    array_push($array, $details);
                    $counter++;
                    $truee++;

                }

            }

        }
        else {

//            $this->display("Nooooo!");

        }
        return $array;

    }

    public function isTravel($row) {

        if ($row->getTrain() != "") {

            return true;

        }
        else {

            return false;

        }

    }

    public function timeToInt($time) {

        return ((($time[0]-'0')*10 + ($time[1])-'0')*60 + ($time[3]-'0')*10 + ($time[4])-'0')/60;

    }

    public function getRate($time, $ref) {

        $this->display("Time ".$time);
        $this->display("Ref ".$ref);

        $diff = $this->timeToInt($ref) - $this->timeToInt($time);
        $diff = abs($diff);
//        $this->display("Diff ".$diff);
        if ($diff >0 && $diff <= 6) {
            return 0.3;
        }
        elseif ($diff > 6 && $diff <= 12) {

            return 0.7;

        }
        elseif ($diff > 12) {
            return 1;
        }

    }

    public function getDay($startD, $endD) {

        $startDa = strtotime($startD);
        $endDa = strtotime($endD);
        $secs = $endDa - $startDa;// == <seconds between the two times>
        $days = $secs / 86400;
        return $days+1;

    }

    public function subDate($date) {

        $date = strtotime($date);
        $date -= 86400;
//        $date /= 86400;
        return date("Y-m-d",$date);

    }

    public function addDate($date) {

        $date = strtotime($date);
        $date += 86400;
//        $date /= 86400;
        return date("Y-m-d",$date);

    }

    public function dateDiff($startD, $endD) {

        $startD = strtotime($startD);
        $endD = strtotime($endD);
        $diff = $endD - $startD;
        $diff/= 86400;
        return $diff;

    }

    function setStay($details, $i) {

        $this->display("i = ".$i);
        $row = new EndData();
        $row->setType("Stay");
        if ($details[$i]->getStartDate() != $details[$i]->getEndDate()) {

            $row->setDate($details[$i]->getStartDate()." to ".$details[$i]->getEndDate());

        }
        else {

            $row->setDate($details[$i]->getStartDate());

        }
        $row->setObjective($details[$i]->getObjective());
        return $row;

    }

    public function setFullRowTravelling($details, $i, $j) {

        $row = new EndData();
        $row->setType("Travel");
        $row->setDate($details[$i]->getStartDate());
        $row->setTrain($details[$i]->getTrain());


        if ($j == 0) {
            $row->setToStation($details[$i]->getToStation());
            $row->setFromStation($details[$i]->getFromStation());
            $row->setDepTime($details[$i]->getDepTime());
            $row->setArrTime($details[$i]->getArrTime());
            $row->setDistance($details[$i]->getDistance());
        }
        $row->setObjective($details[$i]->getObjective());

        return $row;


    }

    public function setHalfRowTravelling($details, $i, $j) {

        $row = new EndData();
        $row->setType("Travel");
        $row->setTrain($details[$i]->getTrain());
        $row->setObjective($details[$i]->getObjective());
        if ($j == 0) {

            $row->setDate($details[$i]->getStartDate());
            $row->setDepTime($details[$i]->getDepTime());
            $row->setFromStation($details[$i]->getFromStation());

        }
        elseif ($j == 1) {

            $row->setDate($details[$i]->getEndDate());
            $row->setArrTime($details[$i]->getArrTime());
            $row->setToStation($details[$i]->getToStation());
            $row->setDistance($details[$i]->getDistance());

        }


        return $row;


    }

    public function processData($data) {

        $officerData = $data->getOfficerData();
        $details = $data->getDetails();
        $count = $data->getCount();

        $end = [];
        $ref = "00:00";

        for ($i = 0; $i < $count; $i++) {

            $startDate = $details[$i]->getStartDate();
            $endDate = $details[$i]->getEndDate();
            $startTime = $details[$i]->getDepTime();
            $endTime = $details[$i]->getArrTime();

            if ($this->isTravel($details[$i])) {    //  Travel Entry.

                $this->display("Travel Entry ".$i);
                $this->display("Territory 1");

                if ($i == 0) {  //  If it is the first row.

//                    $this->display("First Row");
                    $this->display("Territory 1.1");

                    if ($i == ($count - 1)) {   //  If it is the only row.

//                        $this->display("Only row");
                        $this->display("Territory 1.1.1");

                        if ($details[$i]->getStartDate() == $details[$i]->getEndDate()) {   //  [a-a]

                            $this->display("Territory 1.1.1.1");
                            $row = $this->setFullRowTravelling($details, $i, 0);

                            $row->setDays($this->getRate($startTime, $endTime));
//                            $this->display($row);
                            array_push($end, $row);

                        }
                        elseif ($details[$i]->getStartDate() != $details[$i]->getEndDate()) {   //  [a-b]

                            $this->display("Territory 1.1.1.2");
                            $row = $this->setHalfRowTravelling($details, $i,0);
                            $row->setDays($this->getRate($startTime, "24:00"));
                            array_push($end, $row);

                            $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                            if ($dd > 1) {

                                $this->display("Territory 1.1.1.2.1");
                                $sd = $details[$i]->getStartDate();
                                for ($jj = 1; $jj < $dd; $jj++) {

                                    $sd = $this->formatDate($this->addDate($sd));
                                    $this->display("Territory 1.1.1.2.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 1);
                                    $row->setDate($sd);
                                    $row->setDays(1);
                                    array_push($end, $row);

                                }

                            }

                            $row = $this->setHalfRowTravelling($details, $i,1);
                            $row->setDays($this->getRate("00:00", $endTime));
                            array_push($end, $row);

                        }

                    }
                    else {  //  First row but not the only row.

                        $this->display("Territory 1.1.2");
                        if ($this->isTravel($details[$i+1])) {      //  If next entry is travel.

                            $this->display("Territory 1.1.2.1");
                            if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     // ([y-a][a-x]) or ([y-b][b-x])
                                //  Continuous journey.
                                $this->display("Territory 1.1.2.1.1");
                                if ($details[$i]->getStartDate() == $details[$i]->getEndDate()) {   //  ([a-a][a-x])

                                    $this->display("Territory 1.1.2.1.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $ref = $startTime;
//                                    $this->display($ref);
                                    array_push($end, $row);

                                }
                                else {  //  ([a-b][b-x])

                                    $this->display("Territory 1.1.2.1.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($startTime, "24:00"));
                                    array_push($end, $row);

                                    $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                    if ($dd > 1) {

                                        $this->display("Territory 1.1.2.1.1.2.1");
                                        $sd = $details[$i]->getStartDate();
                                        for ($jj = 1; $jj < $dd; $jj++) {

                                            $sd = $this->formatDate($this->addDate($sd));
                                            $this->display("Territory 1.1.2.1.1.2.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 1);
                                            $row->setDate($sd);
                                            $row->setDays(1);
                                            array_push($end, $row);

                                        }

                                    }

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }


                            }
                            else {  //  ([a-z][y-x])

                                $this->display("Territory 1.1.2.1.2");
                                //  Not continuous journey.

                            }

                        }
                        else {      //  Next is stay.

                            $this->display("Territory 1.1.2.2");
                            if ($startDate == $endDate) {   //  ([a-a][x-y])

                                $this->display("Territory 1.1.2.2.1");
                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-a][a-y])

                                    $this->display("Territory 1.1.2.2.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $ref = $startTime;
                                    $this->display("Ref ".$ref);
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-a][b-y])

                                    //  Not continuous. Check again.
                                    $this->display("Territory 1.1.2.2.1.2");

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b][x-y])

                                $this->display("Territory 1.1.2.2.2");
                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-b][b-y])

                                    $this->display("Territory 1.1.2.2.2.1");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($startTime, "24:00"));
                                    array_push($end, $row);

                                    $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                    if ($dd > 1) {

                                        $this->display("Territory 1.2.1.1.2.1");
                                        $sd = $details[$i]->getStartDate();
                                        for ($jj = 1; $jj < $dd; $jj++) {

                                            $sd = $this->formatDate($this->addDate($sd));
                                            $this->display("Territory 1.2.1.1.2.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 1);
                                            $row->setDate($sd);
                                            $row->setDays(1);
                                            array_push($end, $row);

                                        }

                                    }

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-b][c-y])

                                    //  Not continuous. Check again.
                                    $this->display("Territory 1.1.2.2.2.2");

                                }

                            }


                        }

                    }

                }
                else {  //  Not the first row.

                    $this->display("Territory 1.2");
                    if ($i == ($count-1)) {     //  If this is the last row.

                        $this->display("Territory 1.2.1");

                        if ($this->isTravel($details[$i-1])) {  //  If previous is travel.

                            $this->display("Territory 1.2.1.1");
                            if ($details[$i - 1]->getEndDate() == $details[$i]->getStartDate()) {

                                $this->display("Territory 1.2.1.1.1");
                                if ($details[$i]->getStartDate() == $details[$i]->getEndDate()) {

                                    $this->display("Territory 1.2.1.1.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($ref, $endTime));
                                    array_push($end, $row);

                                } elseif ($details[$i]->getStartDate() != $details[$i]->getEndDate()) {

                                    $this->display("Territory 1.2.1.1.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                    $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                    if ($dd > 1) {

                                        $this->display("Territory 1.2.1.1.1.2.1");
                                        $sd = $details[$i]->getStartDate();
                                        for ($jj = 1; $jj < $dd; $jj++) {

                                            $sd = $this->formatDate($this->addDate($sd));
                                            $this->display("Territory 1.2.1.1.1.2.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 1);
                                            $row->setDate($sd);
                                            $row->setDays(1);
                                            array_push($end, $row);

                                        }

                                    }

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);
                                }

                            } elseif ($details[$i - 1]->getEndDate() != $details[$i]->getStartDate()) {

                                $this->display("Territory 1.2.1.1.2");
                                //  Not continuous journey.

                            }
                        }
                        else {      //  If previous is stay.

                            $this->display("Territory 1.2.1.2");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                $this->display("Territory 1.2.1.2.1");
                                if ($startDate == $endDate) {       //  ([x-a][a-a])

                                    $this->display("Territory 1.2.1.2.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($ref, $endTime));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b])

                                    $this->display("Territory 1.2.1.2.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                    $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                    if ($dd > 1) {

                                        $this->display("Territory 1.2.1.2.1.2.1");
                                        $sd = $details[$i]->getStartDate();
                                        for ($jj = 1; $jj < $dd; $jj++) {

                                            $sd = $this->formatDate($this->addDate($sd));
                                            $this->display("Territory 1.2.1.2.1.2.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 1);
                                            $row->setDate($sd);
                                            $row->setDays(1);
                                            array_push($end, $row);

                                        }

                                    }

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {

                                $this->display("Territory 1.2.1.2.2");
                                //  Not continuous. Check again.

                            }

                        }
                    }
                    else {

                        $this->display("Territory 1.2.2");
                        if ($this->isTravel($details[$i-1]) && $this->isTravel($details[$i+1])) {       //  Case 1

                            $this->display("Territory 1.2.2.1");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) { //  ([x-a][a-y])

                                $this->display("Territory 1.2.2.1.1");
                                if ($details[$i]->getStartDate() == $details[$i]->getEndDate()) {   //  ([x-a][a-a])

                                    $this->display("Territory 1.2.2.1.1.1");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {   //  ([x-a][a-a][a-y])

                                        $this->display("Territory 1.2.2.1.1.1.1");
                                        if ($details[$i]->getStartDate() == $details[$i + 1]->getEndDate()) { //  ([x-a][a-a][a-a])

                                            $this->display("Territory 1.2.2.1.1.1.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            array_push($end, $row);
                                            if ($details[$i-1]->getStartDate() == $details[$i]->getStartDate()) {

                                                $this->display("Territory 1.2.2.1.1.1.1.1.1");
                                                $ref = $ref;

                                            }
                                            else {

                                                $this->display("Territory 1.2.2.1.1.1.1.1.2");
                                                $ref = $ref;

                                            }

                                        }
                                        elseif ($details[$i]->getStartDate() != $details[$i + 1]->getEndDate()) { //  ([x-a][a-a][a-b])

                                            $this->display("Territory 1.2.2.1.1.1.1.2");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            array_push($end, $row);
                                            if ($details[$i-1]->getStartDate() == $details[$i]->getStartDate()) {

                                                $this->display("Territory 1.2.2.1.1.1.1.2.1");
                                                $ref = $ref;

                                            }
                                            else {

                                                $this->display("Territory 1.2.2.1.1.1.1.2.2");
                                                $ref = $ref;

                                            }

                                        }

                                    }
                                    else {

                                        $this->display("Territory 1.2.2.1.1.1.2");
                                        //  Not continuous journey.

                                    }
                                }
                                elseif ($details[$i]->getStartDate() != $details[$i]->getEndDate()) {   //  ([x-a][a-b])


                                    $this->display("Territory 1.2.2.1.1.2");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $this->display("Territory 1.2.2.1.1.2.1");
                                        if ($details[$i]->getEndDate() == $details[$i+1]->getEndDate()) {     //  ([x-a][a-b][b-b])

                                            $this->display("Territory 1.2.2.1.1.2.1.1");
                                            $row = $this->setHalfRowTravelling($details, $i, 0);
                                            $row->setDays($this->getRate($ref, "24:00"));
                                            array_push($end, $row);

                                            $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                            if ($dd > 1) {

                                                $this->display("Territory 1.2.2.1.1.2.1.1.1");
                                                $sd = $details[$i]->getStartDate();
                                                for ($jj = 1; $jj < $dd; $jj++) {

                                                    $sd = $this->formatDate($this->addDate($sd));
                                                    $this->display("Territory 1.2.2.1.1.2.1.1.1.1");
                                                    $row = $this->setFullRowTravelling($details, $i, 1);
                                                    $row->setDate($sd);
                                                    $row->setDays(1);
                                                    array_push($end, $row);

                                                }

                                            }

                                            $row = $this->setHalfRowTravelling($details, $i, 1);
                                            $ref = "00:00";
                                            array_push($end, $row);
                                        }
                                        elseif($details[$i]->getEndDate() != $details[$i+1]->getEndDate()) {      //  ([x-a][a-b][b-c])

                                            $this->display("Territory 1.2.2.1.1.2.1.2");
                                            $row = $this->setHalfRowTravelling($details, $i, 0);
                                            $row->setDays($this->getRate($ref, "24:00"));
                                            array_push($end, $row);

                                            $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                            if ($dd > 1) {

                                                $this->display("Territory 1.2.2.1.1.2.1.2.1");
                                                $sd = $details[$i]->getStartDate();
                                                for ($jj = 1; $jj < $dd; $jj++) {

                                                    $sd = $this->formatDate($this->addDate($sd));
                                                    $this->display("Territory 1.2.2.1.1.2.1.2.1.1");
                                                    $row = $this->setFullRowTravelling($details, $i, 1);
                                                    $row->setDate($sd);
                                                    $row->setDays(1);
                                                    array_push($end, $row);

                                                }

                                            }

                                            $row = $this->setHalfRowTravelling($details, $i, 1);
                                            $ref = "00:00";
                                            array_push($end, $row);

                                        }

                                    }
                                    else {

                                        $this->display("Territory 1.2.2.1.1.2.2");
                                        //  Not continuous journey.

                                    }


                                }

                            }
                            else {

                                $this->display("Territory 1.2.2.1.2");
                                //  Not continuous journey.

                            }

                        }
                        elseif ($this->isTravel($details[$i-1]) && !$this->isTravel($details[$i+1])) {      //  Case 2

                            $this->display("Territory 1.2.2.2");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y][p-z])

                                $this->display("Territory 1.2.2.2.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a][y-z])

                                    $this->display("Territory 1.2.2.2.1.1");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $this->display("Territory 1.2.2.2.1.1.1");
                                        if ($details[$i]->getEndDate() == $details[$i+1]->getEndDate()) {   //  ([x-a][a-a][a-a])

                                            $this->display("Territory 1.2.2.2.1.1.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            array_push($end, $row);

                                        }
                                        elseif ($details[$i]->getEndDate() != $details[$i+1]->getEndDate()) {   //  ([x-a][a-a][a-b])

                                            $this->display("Territory 1.2.2.2.1.1.1.2");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            array_push($end, $row);

                                        }

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous.
                                        $this->display("Territory 1.2.2.2.1.1.2");

                                    }

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b][y-z])

                                    $this->display("Territory 1.2.2.2.1.2");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-z])

                                        $this->display("Territory 1.2.2.2.1.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $row->setDays($this->getRate($ref, "24:00"));
                                        array_push($end, $row);

                                        $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                        if ($dd > 1) {

                                            $this->display("Territory 1.2.1.1.2.1");
                                            $sd = $details[$i]->getStartDate();
                                            for ($jj = 1; $jj < $dd; $jj++) {

                                                $sd = $this->formatDate($this->addDate($sd));
                                                $this->display("Territory 1.2.1.1.2.1.1");
                                                $row = $this->setFullRowTravelling($details, $i, 1);
                                                $row->setDate($sd);
                                                $row->setDays(1);
                                                array_push($end, $row);

                                            }

                                        }

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-z])

                                        //  Not continuous travel.
                                        $this->display("Territory 1.2.2.2.1.2.2");

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {

                                //  Not Continuous.
                                $this->display("Territory 1.2.2.2.2");

                            }

                        }
                        elseif (!$this->isTravel($details[$i-1]) && !$this->isTravel($details[$i+1])) {     //  Case 3

                            $this->display("Territory 1.2.2.3");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y]

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {

                                        //  Not continuous.

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $row->setDays($this->getRate($ref, "24:00"));
                                        array_push($end, $row);

                                        $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                        if ($dd > 1) {

                                            $this->display("Territory 1.2.1.2.1.2.1");
                                            $sd = $details[$i]->getStartDate();
                                            for ($jj = 1; $jj < $dd; $jj++) {

                                                $sd = $this->formatDate($this->addDate($sd));
                                                $this->display("Territory 1.2.1.2.1.2.1.1");
                                                $row = $this->setFullRowTravelling($details, $i, 1);
                                                $row->setDate($sd);
                                                $row->setDays(1);
                                                array_push($end, $row);

                                            }

                                        }

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous.

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {

                                //  Not continuous. Check again.

                            }

                        }
                        elseif (!$this->isTravel($details[$i-1]) && $this->isTravel($details[$i+1])) {       //  Case 4

                            $this->display("Territory 1.2.2.4");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous.

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $row->setDays($this->getRate($ref, "24:00"));
                                        array_push($end, $row);

                                        $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

                                        if ($dd > 1) {

                                            $this->display("Territory 1.2.1.2.1.2.1");
                                            $sd = $details[$i]->getStartDate();
                                            for ($jj = 1; $jj < $dd; $jj++) {

                                                $sd = $this->formatDate($this->addDate($sd));
                                                $this->display("Territory 1.2.1.2.1.2.1.1");
                                                $row = $this->setFullRowTravelling($details, $i, 1);
                                                $row->setDate($sd);
                                                $row->setDays(1);
                                                array_push($end, $row);

                                            }

                                        }

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous.

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {

                                //  Not continuous.

                            }

                        }

                    }

                }

            }
            else {  //  Stay Entry.
                $this->display("Stay Entry ".$i);
                $this->display("Territory 2");
                if ($i == 0) {  //  If first entry.

                    $this->display("Territory 2.1");
                    if ($i == ($count-1)) { //  If the only stay entry.

                        $this->display("Territory 2.1.1");
                        $row = $this->setStay($details, $i);
                        $row->setDays($this->getDay($startDate, $endDate));
                        array_push($end, $row);

                    }
                    else {

                        $this->display("Territory 2.1.2");
                        if ($this->isTravel($details[$i+1])) {  //  If next is a travel entry.

                            $this->display("Territory 2.1.2.1");
                            if ($startDate == $endDate) {   //  ([a-a][x-y])

                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-a][a-y])

                                    $row = $this->setStay($details, $i);
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-a][b-y])

                                    //  Not continuous. Check again.

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b][x-y])

                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-b][b-y])

                                    $row = $this->setStay($details, $i);
                                    $row->setDays($this->getDay($startDate, $this->subDate($endDate)));
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-b][c-y])

                                    //  Not continuous. Check again.

                                }

                            }

                        }
                        elseif (!$this->isTravel($details[$i+1])) { //  If next is a stay entry.

                            $this->display("Territory 2.1.2.2");
                            if ($startDate == $endDate) {   //  ([a-a])

                                $this->display("Territory 2.1.2.2.1");
                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-a][a-x])

                                    $this->display("Territory 2.1.2.2.1.1");
                                    $row = $this->setStay($details, $i);
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-a][b-x])

                                    //  Not continuous. Check again.
                                    $this->display("Territory 2.1.2.2.1.2");
                                    if ($this->getDay($details[$i]->getEndDate(), $details[$i+1]->getStartDate()) == 2) {

                                        $this->display("Territory 2.1.2.2.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $row->setDays($this->getDay($startDate, $endDate));
                                        array_push($end, $row);

                                    }
                                    else {

                                        $this->display("Territory 2.1.2.2.1.2.2");
                                        //  Not continuous. Check again.

                                    }

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b])

                                $this->display("Territory 2.1.2.2.2");
                                if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([a-b][b-y])

                                    $this->display("Territory 2.1.2.2.2.1");
                                    $row = $this->setStay($details, $i);
                                    $row->setDays($this->getDay($startDate, $this->subDate($endDate)));
                                    $ref = "00:00";
                                    array_push($end, $row);

                                }
                                elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([a-b][c-y])

                                    $this->display("Territory 2.1.2.2.2.2");
                                    //  Not continuous. Check again.
                                    $daa = $this->getDay($details[$i]->getEndDate(), $details[$i+1]->getStartDate());
//                                    $this->display("daa ".$daa);
                                    if ($daa == 2) {

                                        $this->display("Territory 2.1.2.2.2.2.1");
                                        $row = $this->setStay($details, $i);
                                        $row->setDays($this->getDay($startDate, $endDate));
                                        array_push($end, $row);

                                    }
                                    else {

                                        $this->display("Territory 2.1.2.2.2.2.2");
                                        //  Not continuous. Check again.

                                    }

                                }

                            }

                        }

                    }

                }
                else {

                    $this->display("Territory 2.2");
                    if ($i == ($count-1)) { //  If last entry.

                        $this->display("Territory 2.2.1");
                        if ($this->isTravel($details[$i-1])) {

                            $this->display("Territory 2.2.1.1");
                            if($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {      //  ([x-a][a-y])

                                $this->display("Territory 2.2.1.1.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display("Territory 2.2.1.1.1.1");
                                    $row = $this->setStay($details, $i);
                                    $row->setDays($this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display("Territory 2.2.1.1.1.2");
                                    $row = $this->setStay($details, $i);

                                    $row->setDays($this->getDay($startDate, $endDate)-1+$this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {     //  ([x-a][b-y])

                                //  Not continuous.
                                $this->display("Territory 2.2.1.1.2");

                            }

                        }
                        elseif (!$this->isTravel($details[$i-1])) {

                            $this->display("Territory 2.2.1.2");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) { //  ([x-a][a-y])

                                $this->display("Territory 2.2.1.2.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])


                                    $row = $this->setStay($details, $i);
                                    $this->display("Ref ".$ref);
                                    $row->setDays($this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b])

                                    $row = $this->setStay($details, $i);
                                    $row->setDays($this->getDay($this->addDate($startDate), $endDate)+ $this->getRate($ref, "24:00"));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display("Territory 2.2.1.2.2");
                                $row = $this->setStay($details, $i);
                                $row->setDays($this->getDay($startDate, $endDate));
                                array_push($end, $row);

                            }

                        }

                    }
                    else {

                        $this->display("Territory 2.2.2");

                        if ($this->isTravel($details[$i-1]) && $this->isTravel($details[$i+1])) {   //  Case 5

                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $row = $this->setStay($details, $i);
                                        $this->display("Ref ".$ref);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $row = $this->setStay($details, $i);
//                                        $row->setDays($this->getDay($startDate, $this->subDate($endDate)));
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getRate($ref, "24:00"));
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous. Check again.

                                    }
                                }

                            }
                            elseif ($details[$i-1]->getStartDate() != $details[$i]->getEndDate()) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.

                            }

                        }
                        elseif ($this->isTravel($details[$i-1]) && !$this->isTravel($details[$i+1])) {  //  Case 6

                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $row = $this->setStay($details, $i);
                                        $this->display("Ref ".$ref);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $row = $this->setStay($details, $i);
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getRate($ref, "24:00"));
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous.

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.

                            }

                        }
                        elseif (!$this->isTravel($details[$i-1]) && !$this->isTravel($details[$i+1])) {     //  Case 7

                            $this->display("Territory 2.2.2.3");
                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                $this->display("Territory 2.2.2.3.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display("Territory 2.2.2.3.1.1");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //([x-a][a-a][a-y])

                                        $this->display("Territory 2.2.2.3.1.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.
                                        $this->display("Territory 2.2.2.3.1.1.2");
                                        if ($this->getDay($details[$i]->getEndDate(), $details[$i+1]->getStartDate()) == 2) {    //  ([x-a][a-a][b-y])

                                            $this->display("Territory 2.2.2.3.1.1.2.1");
                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getRate($ref, "24:00"));
                                            array_push($end, $row);
                                            $ref = "00:00";

                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.1.1.2.2");
                                            //  Not continuous. Check again.

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display("Territory 2.2.2.3.1.2");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $this->display("Territory 2.2.2.3.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getRate($ref, "24:00"));
                                        $ref = "00:00";
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        $this->display("Territory 2.2.2.3.1.2.2");
                                        //  Not continuous. Check again.
                                        if ($this->getDay($details[$i]->getEndDate(), $details[$i+1]->getStartDate()) == 2) {

                                            $this->display("Territory 2.2.2.3.1.2.2.1");
                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getDay($this->addDate($startDate), $endDate)+ $this->getRate($ref, "24:00"));
                                            array_push($end, $row);

                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.1.2.2.2");

                                        }

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display("Territory 2.2.2.3.2");

                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display("Territory 2.2.2.3.2.1");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][b-b][b-y])

                                        $this->display("Territory 2.2.2.3.2.1.1");
                                        if ($this->getDay($details[$i-1]->getEndDate(), $details[$i]->getStartDate()) == 2) {

                                            $this->display("Territory 2.2.2.3.2.1.1.1");
//                                            $this->display("yoyoyoy");
                                            $row = $this->setStay($details, $i);
//                                            $row->setDays($this->getDay($startDate, $endDate));
                                            $ref = "00:00";
                                            array_push($end, $row);


                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.2.1.1.2");
                                            //  Not continuous. Check again.

                                        }

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][b-b][c-y])

                                        $this->display("Territory 2.2.2.3.2.1.2");
                                        if ($this->getDay($details[$i-1]->getEndDate(), $details[$i]->getStartDate()) == 2) {

                                            $this->display("Territory 2.2.2.3.2.1.2.1");
//                                            $this->display("yoyoyoy");
                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getDay($startDate, $endDate));
                                            array_push($end, $row);


                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.2.1.2.2");
                                            //  Not continuous. Check again.

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display("Territory 2.2.2.3.2.2");
                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][b-c][c-y])

                                        $this->display("Territory 2.2.2.3.2.2.1");
                                        if ($this->getDay($details[$i-1]->getEndDate(), $details[$i]->getStartDate()) == 2) {

                                            $this->display("Territory 2.2.2.3.2.2.1.1");
//                                            $this->display("yoyoyoy");
                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getDay($startDate, $this->subDate($endDate)));
                                            $ref = "00:00";
                                            array_push($end, $row);


                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.2.2.1.2");
                                            //  Not continuous. Check again.

                                        }

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][b-c][d-y])

                                        $this->display("Territory 2.2.2.3.2.2.2");
                                        if ($this->getDay($details[$i-1]->getEndDate(), $details[$i]->getStartDate()) == 2) {

                                            $this->display("Territory 2.2.2.3.2.2.2.1");
//                                            $this->display("yoyoyoy");
                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getDay($startDate, $endDate));
                                            array_push($end, $row);

                                        }
                                        else {

                                            $this->display("Territory 2.2.2.3.2.2.2.2");
                                            //  Not continuous. Check again.

                                        }

                                    }
                                }

                            }

                        }
                        elseif (!$this->isTravel($details[$i-1]) && $this->isTravel($details[$i+1])) {      //  Case 8

                            if ($details[$i-1]->getEndDate() == $details[$i]->getStartDate()) {     //  ([x-a][a-y])

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][a-y])

                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][b-y])

                                        $row = $this->setStay($details, $i);
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate)) + $this->getRate($ref, "24:00"));
                                        array_push($end, $row);

                                    }
                                    elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous. Check again.

                                    }

                                }

                            }
                            elseif ($details[$i-1]->getEndDate() != $details[$i]->getStartDate()) {     //  ([x-a][b-y])

                                if ($this->getDay($details[$i-1]->getEndDate(), $details[$i]->getStartDate()) == 2) {

                                    if ($startDate == $endDate) {   //  ([x-a][b-b])

                                        if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][b-b][b-y])

                                            $row = $this->setStay($details, $i);
                                            $ref = "00:00";
                                            array_push($end, $row);

                                        }
                                        elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][b-b][c-y])

                                            //  Not continuous. Check again.

                                        }

                                    }
                                    elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                        if ($details[$i]->getEndDate() == $details[$i+1]->getStartDate()) {     //  ([x-a][b-c][c-y])

                                            $row = $this->setStay($details, $i);
                                            $row->setDays($this->getDay($startDate, $this->subDate($endDate)));
                                            $ref = "00:00";
                                            array_push($end, $row);

                                        }
                                        elseif ($details[$i]->getEndDate() != $details[$i+1]->getStartDate()) {     //  ([x-a][b-c][d-y])

                                            //  Not continuous. Check again.

                                        }

                                    }

                                }
                                else {

                                    //  Not continuous. Check again.

                                }

                            }

                        }
                    }

                }

            }

        }

        return $end;

    }

}

$trial = new Trial();

$data = $trial->getData();

//$trial->display($data);

$final = $trial->processData($data);    // Process the data.
//$trial->display($final);

//$trial->display($final[0]->getTrain());
//$trial->tabularDisplay($final);
//
$display = new Display($data->getOfficerData(), $final);
$display->display();