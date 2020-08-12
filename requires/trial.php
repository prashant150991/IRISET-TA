<?php

include 'officer.php';
include 'details.php';
include 'data.php';
include 'enddata.php';
include 'display.php';

class Trial {

    private $glob = 0;

    /**
     * @return int
     */
    public function getGlob() {
        return $this->glob;
    }

    /**
     * @param int $glob
     */
    public function setGlob($glob) {
        $this->glob = $glob;
    }

    /**
     * Trial constructor.
     */
    public function __construct() {



    }

    /**
     * Utility function to display in a formatted way.
     */
    public function display($m, $data) {

        $glob = $this->getGlob();
        if ($m == 1 || $glob == 1) {
            echo "<pre>";
            var_dump($data);
            echo "<pre>";
        }

    }

    /**
     * Utility function to display in a tabular format.
     */
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

    /**
     * Utility function to convert date in any given format to d-M-Y
     */
    public function formatDate($date) {

        $date = strtotime($date);
        return date("d-M-Y",$date);

    }

    /**
     * Utility function to get Officer details and the travel details and 
     * set it to Data object.
     */
    public function getData() {

        if (isset($_POST['tutu'])) {

            $officerData = $this->setOfficerData();
            $detailsData = $this->setDetailsData();
            $data = new Data($officerData, $detailsData, count($detailsData));
            return $data;

        }
        else {
            $this->redirect("./form.php");
        }

    }

    /**
     * Utility function to set Officer data into Officer object.
     */
    public function setOfficerData() {

        $name = trim($_POST['name']);
        $designation = trim($_POST['designation']);
        $month = trim($_POST['month']);
        $payBand = trim($_POST['payBand']);
        $basicPay = trim($_POST['basicPay']);
        $dateOfJoining = trim($_POST['dateOfJoining']);

        $officerData = new Officer($name, $designation, $month, $payBand, $basicPay, $dateOfJoining);
        return $officerData;

    }

    /**
     * Utility function to set Travel details data into Details object.
     */
    public function setDetailsData() {

        $array = [];

        if (isset($_POST['tutu'])) {

            $rows = $_POST['ttt'];
            $this->display(0, "ttt = ".$rows);
            $truee = 1;
            $counter = 1;
//            echo $rows;
            while ($counter <= $rows) {
//                break;
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
                $conti = "conti_".$counter;

                if (!isset($_POST[$startDate]) || $_POST[$startDate] == "") {

                    $counter++;

                }
                else {

                    if (isset($_POST[$conti])) {

                        if ($_POST[$conti] == "yes") {
                            $conti = true;
                        }
                        else {
                            $conti = false;
                        }
                    }
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
                    $details = new Details($days, $startDate, $endDate, $train, $depTime, $arrTime, $fromStation, $toStation, $objective, $distance, $days, $conti);
                    array_push($array, $details);
                    $counter++;
                    $truee++;

                }

            }

        }
        else {

//            $this->display(0, "Nooooo!");

        }
        return $array;

    }

    /**
     * Utility function to tell if a given is travel entry or stay entry.
     */
    public function isTravel($row) {

        if ($row->getTrain() != "") {

            return true;

        }
        else {

            return false;

        }

    }

    /**
     * Utility function to convert time in string to hours.
     */
    public function timeToInt($time) {

        return ((($time[0]-'0')*10 + ($time[1])-'0')*60 + ($time[3]-'0')*10 + ($time[4])-'0')/60;

    }

    /**
     * Utility function to get number of hours between two given times.
     */
    public function getHours($time, $ref) {

        $diff = $this->timeToInt($ref) - $this->timeToInt($time);
        $diff = abs($diff);
        return $diff;

    }

    /**
     * Utility function to tell the slab of given number of hours. i.e, 03 or 07 or 1
     */
    public function getDiv($diff) {

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

    /**
     * Utility function which gives slab from given two times.
     */
    public function getRate($time, $ref) {

        $diff = $this->getHours($time, $ref);
        return $this->getDiv($diff);

    }

    /**
     * Utility function to get number of days between two given dates.
     */
    public function getDay($startD, $endD) {

        $days = $this->dateDiff($startD, $endD);
        return $days+1;

    }

    /**
     * Utility function to subtract 1 day from given date.
     */
    public function subDate($date) {

        $date = strtotime($date);
        $date -= 86400;
        return date("Y-m-d",$date);

    }

    /**
     * Utility function to add 1 day from given date.
     */
    public function addDate($date) {

        $date = strtotime($date);
        $date += 86400;
        return date("Y-m-d",$date);

    }

    /**
     * Utility function to get difference between two given dates.
     */
    public function dateDiff($startD, $endD) {

        $startD = strtotime($startD);
        $endD = strtotime($endD);
        $diff = $endD - $startD;
        $diff/= 86400;
        return $diff;

    }

    /**
     * Utility function to add a stay entry.
     */
    public function setStay($details, $i) {

        $this->display(0, "i = ".$i);
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

    /**
     * Utility function to add a transit entry.
     */
    public function setTransit($startDate, $endDate) {

        $row = new EndData();
        if ($startDate == $endDate) {

            $row->setDate($startDate);

        }
        else {

            $row->setDate($startDate." to ".$endDate);

        }
        $row->setObjective("Transit.");
        $row->setDays($this->getDay($startDate, $endDate));
        return $row;

    }

    /**
     * Utility function to add a travelling entry starting and ending on same day.
     * $j=0 for above case.
     * $j=1 for setting a day on which neither the journey starts nor ends.
     */
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

    /**
     * Utility function to add a travelling entry extending to more than 1 day.
     * $j=0 for originating day.
     * $j=1 for ending day.
     */
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

    /**
     * Utility function to add a travelling entry which does not have originating 
     * nor ending journey on a given day but lies between the two.
     */
    public function setMidTravel($details, $i, $end) {

        $dd = $this->dateDiff($details[$i]->getStartDate(), $details[$i]->getEndDate());

        if ($dd > 1) {

            $this->display(0, "Territory setMidTravel()");
            $sd = $details[$i]->getStartDate();
            for ($jj = 1; $jj < $dd; $jj++) {

                $sd = $this->formatDate($this->addDate($sd));
                $row = $this->setFullRowTravelling($details, $i, 1);
                $row->setDate($sd);
                $row->setDays(1);
                array_push($end, $row);

            }

        }

        return $end;

    }

    /**
     * Utility function to add a transit entry.
     */
    public function setContiRows($details, $i, $end) {

        $sd = $details[$i]->getEndDate();
        $ed = $details[$i+1]->getStartDate();
        $dd = $this->dateDiff($sd, $ed);
        if ($dd > 1) {

            $sd = $this->formatDate($this->addDate($sd));
            $ed = $this->formatDate($this->subDate($ed));
            $row = $this->setTransit($sd, $ed);
            array_push($end, $row);
            $ref = "00:00";

        }
        else {

            $ref = "00:00";

        }
        return $end;

    }

    /**
     * Main function which does all the processing and calculations.
     */
    public function processData($data) {

        $officerData = $data->getOfficerData();
        $details = $data->getDetails();
        $count = $data->getCount();

        $end = [];
        $ref = "00:00";
        $add = 0;

        for ($i = 0; $i < $count; $i++) {

            $startDate = $details[$i]->getStartDate();
            $endDate = $details[$i]->getEndDate();
            $startTime = $details[$i]->getDepTime();
            $endTime = $details[$i]->getArrTime();
            $current = $details[$i];
            if ($i+1 < $count) {
                $next = $details[$i+1];
                $nextStartDate = $details[$i + 1]->getStartDate();
                $nextEndDate = $details[$i+1]->getEndDate();
                $nextStartTime = $details[$i+1]->getDepTime();
                $nextEndTime = $details[$i+1]->getArrTime();
            }
            if ($i > 0) {
                $prev = $details[$i-1];
                $prevStartDate = $details[$i-1]->getStartDate();
                $prevEndDate = $details[$i-1]->getEndDate();
                $prevStartTime = $details[$i-1]->getDepTime();
                $prevEndTime = $details[$i-1]->getArrTime();

            }

            if ($this->isTravel($current)) {    //  Travel Entry.

                $this->display(0, "Travel Entry ".$i);
                $this->display(0, "Territory 1");

                if ($i == 0) {  //  If it is the first row.

                    $this->display(0, "Territory 1.1");

                    if ($i == ($count - 1)) {   //  If it is the only row.

                        $this->display(0, "Territory 1.1.1");

                        if ($startDate == $endDate) {   //  [a-a]

                            $this->display(0, "Territory 1.1.1.1");
                            $row = $this->setFullRowTravelling($details, $i, 0);
                            $row->setDays($this->getRate($startTime, $endTime));
                            array_push($end, $row);

                        }
                        elseif ($startDate!= $endDate) {   //  [a-b]

                            $this->display(0, "Territory 1.1.1.2");
                            $row = $this->setHalfRowTravelling($details, $i,0);
                            $row->setDays($this->getRate($startTime, "24:00"));
                            array_push($end, $row);

                            $end = $this->setMidTravel($details, $i, $end);

                            $row = $this->setHalfRowTravelling($details, $i,1);
                            $row->setDays($this->getRate("00:00", $endTime));
                            array_push($end, $row);

                        }

                    }
                    else {  //  First row but not the only row.

                        $this->display(0, "Territory 1.1.2");
                        if ($this->isTravel($next)) {      //  If next entry is travel.

                            $this->display(0, "Territory 1.1.2.1");
                            if ($endDate == $nextStartDate) {     // ([y-a][a-x]) or ([y-b][b-x])
                                //  Continuous journey.
                                $this->display(0, "Territory 1.1.2.1.1");
                                if ($startDate == $endDate) {   //  ([a-a][a-x])

                                    $this->display(0, "Territory 1.1.2.1.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($startTime, $endTime);
//                                    $this->dasp("Add = ".$add);
                                    array_push($end, $row);

                                    if ($endTime == $nextStartTime) {

                                        $this->display(0, "Territory 1.1.2.1.1.1.1");
                                        $ref = $nextStartTime;
                                        $this->dasp("Ref = ".$ref);

                                    }
                                    else {

                                        $this->display(0, "Territory 1.1.2.1.1.1.2");
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.1.2.1.1.1.2.1");
                                            $add+= $this->getHours($endTime, $nextStartTime);
                                            $ref = $nextStartTime;


                                        }
                                        else {

                                            $this->display(0, "Territory 1.1.2.1.1.1.2.2");
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                else {  //  ([a-b][b-x])

                                    $this->display(0, "Territory 1.1.2.1.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($startTime, "24:00"));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $add += $this->getHours($endTime, "00:00");
                                    if ($details[$i+1]->getConti() == true) {

                                        $ref = $endTime;

                                    }
                                    else {

                                        $ref = $details[$i+1]->getDepTime();

                                    }

//                                    $ref = "00:00";
                                    array_push($end, $row);

                                }

                            }
                            else {  //  ([a-z][y-x])

                                //  Not continuous journey.
                                $this->display(0, "Territory 1.1.2.1.2");

                                if ($startDate == $endDate) {   //  ([a-a][c-y])

                                    $this->display(0, "Territory 1.1.2.1.2.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    if ($details[$i+1]->getConti() == true) {

                                        $this->display(0, "Territory 1.1.2.1.2.1.1");
                                        $row->setDays($this->getRate($startTime, "24:00"));
                                        array_push($end, $row);

                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";
                                    }
                                    else {

                                        $this->display(0, "Territory 1.1.2.1.2.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $row->setDays($this->getRate($startTime, $endTime));
                                        array_push($end, $row);
                                        $ref = $details[$i+1]->getDepTime();

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([a-b][c-y])

                                    $this->display(0, "Territory 1.1.2.1.2.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $row->setDays($this->getRate($startTime, "24:00"));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    if ($details[$i+1]->getConti() == true) {

                                        $this->display(0, "Territory 1.1.2.1.2.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $row->setDays(1);
                                        array_push($end, $row);

                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";
                                    }
                                    else {

                                        $this->display(0, "Territory 1.1.2.1.2.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $row->setDays($this->getRate("00:00", $endTime));
                                        array_push($end, $row);
                                        $ref = $details[$i+1]->getDepTime();

                                    }

                                }

                            }

                        }
                        else {      //  Next is stay.

                            $this->display(0, "Territory 1.1.2.2");
                            if ($startDate == $endDate) {   //  ([a-a][x-y])

                                $this->display(0, "Territory 1.1.2.2.1");
                                if ($endDate == $nextStartDate) {     //  ([a-a][a-y])

                                    $this->display(0, "Territory 1.1.2.2.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($startTime, $endTime);
                                    $ref = $endTime;
                                    $this->display(0, "Ref ".$ref);
                                    array_push($end, $row);

                                }
                                elseif ($endDate != $nextStartDate) {     //  ([a-a][b-y])

                                    //  Not continuous. Check again.
                                    $this->display(0, "Territory 1.1.2.2.1.2");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($startTime, $endTime);
                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 1.1.2.2.1.2.1");
                                        $add+= $this->getHours($endTime, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);

                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";
                                        $add = 0;

                                    }
                                    else {

                                        $this->display(0, "Territory 1.1.2.2.1.2.2");
                                        $row->setDays($this->getDiv($add));
                                        $ref = "00:00";
                                        array_push($end, $row);
                                        $add = 0;

                                    }

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b][x-y])

                                $this->display(0, "Territory 1.1.2.2.2");
                                if ($endDate == $nextStartDate) {     //  ([a-b][b-y])

                                    $this->display(0, "Territory 1.1.2.2.2.1");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($startTime, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);
                                    $add = 0;

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $add+= $this->getHours("00:00", $endTime);
                                    $ref = $endTime;
                                    array_push($end, $row);

                                }
                                elseif ($endDate != $nextStartDate) {     //  ([a-b][c-y])

                                    //  Not continuous. Check again.
                                    $this->display(0, "Territory 1.1.2.2.2.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($startTime, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);
                                    $add = 0;

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $add+= $this->getHours("00:00", $endTime);
                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 1.1.2.2.2.2.1");
                                        $add+= $this->getHours($endTime, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);

                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";
                                        $add = 0;

                                    }
                                    else {

                                        $this->display(0, "Territory 1.1.2.2.2.2.2");
                                        $row->setDays($this->getDiv($add));
                                        $ref = "00:00";
                                        $add = 0;
                                        array_push($end, $row);

                                    }

                                }

                            }

                        }

                    }

                }
                else {  //  Not the first row.

                    $this->display(0, "Territory 1.2");
                    if ($i == ($count-1)) {     //  If this is the last row.

                        $this->display(0, "Territory 1.2.1");

                        if ($this->isTravel($prev)) {  //  If previous is travel.

                            $this->display(0, "Territory 1.2.1.1");
                            if ($prevEndDate == $startDate) {   //  ([x-a][a-y])

                                $this->display(0, "Territory 1.2.1.1.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 1.2.1.1.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, $endTime);
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);
                                    $this->dasp("Add = ".$add);
                                    $this->dasp("Ref = ".$ref);

                                }
                                elseif ($startDate != $endDate) {     //  ([x-a][a-b])

                                    $this->display(0, "Territory 1.2.1.1.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);
                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous journey.
                                $this->display(0, "Territory 1.2.1.1.2");

                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.1.1.2.1");

                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, $endTime);
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.1.1.2.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);

                                }

                            }
                        }
                        else {      //  If previous is stay.

                            $this->display(0, "Territory 1.2.1.2");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 1.2.1.2.1");
                                if ($startDate == $endDate) {       //  ([x-a][a-a])

                                    $this->display(0, "Territory 1.2.1.2.1.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, $endTime);
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b])

                                    $this->display(0, "Territory 1.2.1.2.1.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 1.2.1.2.2");

                                if ($startDate == $endDate) {       //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.1.2.2.1");
                                    $row = $this->setFullRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, $endTime);
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.1.2.2.2");
                                    $row = $this->setHalfRowTravelling($details, $i, 0);
                                    $add+= $this->getHours($ref, "24:00");
                                    $this->display(0, "Hours is ".$add);
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                    $end = $this->setMidTravel($details, $i, $end);

                                    $row = $this->setHalfRowTravelling($details, $i, 1);
                                    $row->setDays($this->getRate("00:00", $endTime));
                                    array_push($end, $row);

                                }

                            }

                        }
                    }
                    else {  //  Not the first aor last row.

                        $this->display(0, "Territory 1.2.2");
                        if ($this->isTravel($prev) && $this->isTravel($next)) {       //  Case 1

                            $this->display(0, "Territory 1.2.2.1");
                            if ($prevEndDate == $startDate) { //  ([x-a][a-y])

                                //  Continuous.
                                $this->display(0, "Territory 1.2.2.1.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 1.2.2.1.1.1");
                                    if ($endDate == $nextStartDate) {   //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 1.2.2.1.1.1.1");

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.1.1.1.1.1");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            $add+= $this->getHours($ref, $endTime);
                                            $ref = $nextStartTime;
                                            array_push($end, $row);

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.1.1.1.2");
                                            $row = $this->setFullRowTravelling($details, $i, 0);
                                            $add+= $this->getHours($ref, $endTime);
                                            array_push($end, $row);
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.1.1.1.1.2.1");
                                                $add+= $this->getHours($endTime, $nextStartTime);
                                                $ref = $nextStartTime;

                                            }
                                            else {

                                                $this->display(0, "Territory 1.2.2.1.1.1.1.2.2");
                                                $ref = $nextStartTime;

                                            }

                                        }

                                    }
                                    else {  //  ([x-a][a-a][b-y])

                                        //  Not continuous journey.
                                        $this->display(0, "Territory 1.2.2.1.1.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.1.1.1.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = 0;
                                            $ref = "00:00";
                                            $add+= $this->getHours($ref, $nextStartTime);
                                            $ref = $nextStartTime;


                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.1.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = $nextStartTime;

                                        }
                                    }
                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])


                                    $this->display(0, "Territory 1.2.2.1.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 1.2.2.1.1.2.1");

                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        $add = 0;
                                        array_push($end, $row);

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        array_push($end, $row);

                                        if ($endTime = $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.1.1.2.1.1");
                                            $add+= $this->getHours("00:00", $endTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.1.2.1.2");
                                            $add+= $this->getHours("00:00", $endTime);
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.1.1.2.1.2.1");
                                                $add+= $this->getHours($endTime, $nextStartTime);
                                                $ref = $nextStartTime;

                                            }
                                            else {

                                                $this->display(0, "Territory 1.2.2.1.1.2.1.2.2");
                                                $ref = $nextStartTime;

                                            }

                                        }

                                    }
                                    else {  // ([x-a][a-b][c-y])

                                        //  Not continuous journey.
                                        $this->display(0, "Territory 1.2.2.1.1.2.2");

                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        $add = 0;
                                        array_push($end, $row);

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours("00:00", $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.1.1.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = $nextStartTime;
                                            $add = $this->getHours("00:00", $nextStartTime);

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.1.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            else {  //  ([x-a][b-y])

                                //  Not continuous journey.
                                $this->display(0, "Territory 1.2.2.1.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.2.1.2.1");
                                    if ($endDate == $nextStartDate) {   //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 1.2.2.1.2.1.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.1.2.1.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.2.1.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.1.2.1.1.2.1");
                                                $add+= $this->getHours($endTime, $nextStartTime);
                                                $ref = $nextStartTime;

                                            }
                                            else {

                                                $this->display(0, "Territory 1.2.2.1.2.1.1.2.2");
                                                $ref = $nextStartTime;

                                            }

                                        }

                                    }
                                    elseif ($endDate != $nextStartDate) { //  ([x-a][b-b][c-y])

                                        $this->display(0, "Territory 1.2.2.1.2.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.1.2.1.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);

                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.2.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $add = 0;
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.2.1.2.2");
                                    if ($endDate == $nextStartDate) {   //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 1.2.2.1.2.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        array_push($end, $row);
                                        $add+= $this->getHours("00:00", $endTime);

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.1.2.2.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.2.2.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.1.2.2.1.2.1");
                                                $add+= $this->getHours($endTime, $nextStartTime);
                                                $ref = $nextStartTime;


                                            } else {

                                                $this->display(0, "Territory 1.2.2.1.2.2.1.2.2");
                                                $ref = $nextStartTime;

                                            }

                                        }

                                    }
                                    elseif ($endDate != $nextStartDate) { //  ([x-a][b-c][d-y])

                                        $this->display(0, "Territory 1.2.2.1.2.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours("00:00", $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.1.2.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);

                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.1.2.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $add = 0;
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }

                            }

                        }
                        elseif ($this->isTravel($prev) && !$this->isTravel($next)) {      //  Case 2  [T-T-S]

                            $this->display(0, "Territory 1.2.2.2");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y][p-z])

                                $this->display(0, "Territory 1.2.2.2.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a][y-z])

                                    $this->display(0, "Territory 1.2.2.2.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 1.2.2.2.1.1.1");

                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 1.2.2.2.1.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.2.1.1.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;
                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.2.1.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b][y-z])

                                    $this->display(0, "Territory 1.2.2.2.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-z])

                                        $this->display(0, "Territory 1.2.2.2.1.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details,$i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-z])

                                        //  Not continuous travel.
                                        $this->display(0, "Territory 1.2.2.2.1.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);


                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.2.1.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.2.1.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not Continuous.
                                $this->display(0, "Territory 1.2.2.2.2");

                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.2.2.2.1");
                                    if ($endDate == $nextStartDate) {   //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 1.2.2.2.2.2.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;

                                    }
                                    elseif ($endDate != $nextStartDate) { //  ([x-a][b-b][c-y])

                                        $this->display(0, "Territory 1.2.2.2.2.2.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.2.2.2.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.2.2.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.2.2.2.2");
                                    if ($endDate == $nextStartDate) {   //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 1.2.2.2.2.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;

                                    }
                                    elseif ($endDate != $nextStartDate) { //  ([x-a][b-c][d-y])

                                        $this->display(0, "Territory 1.2.2.2.2.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.2.2.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $add = 0;

                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.2.2.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $add = 0;
                                            $ref = "00:00";

                                        }

                                    }

                                }

                            }

                        }
                        elseif (!$this->isTravel($prev) && !$this->isTravel($next)) {     //  Case 3  [S-T-S]

                            $this->display(0, "Territory 1.2.2.3");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y]

                                $this->display(0, "Territory 1.2.2.3.1");

                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 1.2.2.3.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 1.2.2.3.1.1.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        $this->display(0, "Territory 1.2.2.3.1.1.2");
                                        //  Not continuous. Check again.
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.3.1.1.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.3.1.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 1.2.2.3.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 1.2.2.3.1.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        $this->display(0, "Territory 1.2.2.3.1.2.2");
                                        //  Not continuous. Check again.
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.3.1.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.3.1.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 1.2.2.3.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.2.3.2.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 1.2.2.3.2.1.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 1.2.2.3.2.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.3.2.1.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.3.2.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.2.3.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 1.2.2.3.2.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;
                                        $ref = "00:00";
                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;


                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 1.2.2.3.2.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;
                                        $ref = "00:00";
                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.3.2.2.2.1");
                                            $add+= $this->getHours($endTime, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;
                                            $end = $this->setContiRows($details, $i, $end);

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.3.2.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }

                        }
                        elseif (!$this->isTravel($prev) && $this->isTravel($next)) {       //  Case 4     [S-T-T]

                            $this->display(0, "Territory 1.2.2.4");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 1.2.2.4.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 1.2.2.4.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 1.2.2.4.1.1.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add += $this->getHours($ref, $endTime);
                                        array_push($end, $row);
                                        $ref = $endTime;

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.4.1.1.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {
                                            $this->display(0, "Territory 1.2.2.4.1.1.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.4.1.1.1.2.1");
                                                $add += $this->getHours($ref, $nextStartTime);
                                                $ref = $nextStartTime;

                                            } else {

                                                $this->display(0, "Territory 1.2.2.4.1.1.1.2.2");
                                                $ref = $nextStartTime;

                                            }
                                        }
                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 1.2.2.4.1.1.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add += $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.4.1.1.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);

                                            $ref = "00:00";
                                            $add = $this->getHours($ref, $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.4.1.1.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }
                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 1.2.2.4.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 1.2.2.4.1.2.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add += $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add += $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        array_push($end, $row);

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.4.1.2.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {
                                            $this->display(0, "Territory 1.2.2.4.1.2.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.4.1.2.1.2.1");
                                                $add += $this->getHours($ref, $nextStartTime);
                                                $ref = $nextStartDate;

                                            } else {

                                                $this->display(0, "Territory 1.2.2.4.1.2.1.2.2");
                                                $ref = $nextStartTime;

                                            }
                                        }

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 1.2.2.4.1.2.2");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add += $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);


                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add += $this->getHours($ref, $endTime);
                                        $ref = $endTime;

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.4.1.2.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);

                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = $this->getHours($ref, $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.4.1.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous.
                                $this->display(0, "Territory 1.2.2.4.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 1.2.2.4.2.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 1.2.2.4.2.1.1");
                                        $row = $this->setFullRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;
                                        array_push($end, $row);

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.4.2.1.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {
                                            $this->display(0, "Territory 1.2.2.4.2.1.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.4.2.1.1.2.1");
                                                $add += $this->getHours($ref, $nextStartTime);
                                                $ref = $nextStartTime;

                                            } else {

                                                $this->display(0, "Territory 1.2.2.4.2.1.1.2.2");
                                                $ref = $nextStartTime;

                                            }
                                        }

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 1.2.2.4.2.1.2");
                                        $row = $this->setFullRowTravelling($details, $i);
                                        $add+= $this->getHours($ref, $endTime);
                                        $ref = $endTime;

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.4.2.1.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            $ref = "00:00";
                                            $add = $this->getHours($ref, $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.4.2.1.2.2");
                                            $add = 0;
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 1.2.2.4.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 1.2.2.4.2.2.1");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);
                                        array_push($end, $row);

                                        if ($endTime == $nextStartTime) {

                                            $this->display(0, "Territory 1.2.2.4.2.2.1.1");
                                            $ref = $nextStartTime;

                                        }
                                        else {
                                            $this->display(0, "Territory 1.2.2.4.2.2.1.2");
                                            if ($next->getConti() == true) {

                                                $this->display(0, "Territory 1.2.2.4.2.2.1.2.1");
                                                $add += $this->getHours($ref, $nextStartTime);
                                                $ref = $nextStartTime;

                                            } else {

                                                $this->display(0, "Territory 1.2.2.4.2.2.1.2.2");
                                                $ref = $nextStartTime;

                                            }
                                        }

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 1.2.2.4.2.2.2");
                                        $row = $this->setHalfRowTravelling($details, $i, 0);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                        $end = $this->setMidTravel($details, $i, $end);

                                        $row = $this->setHalfRowTravelling($details, $i, 1);
                                        $add+= $this->getHours($ref, $endTime);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 1.2.2.4.2.2.2.1");
                                            $add+= $this->getHours($ref, "24:00");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 1.2.2.4.2.2.2.2");
                                            $row->setDays($this->getDiv($add));
                                            array_push($end, $row);
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }
            else {  //  Stay Entry.
                $this->display(0, "Stay Entry ".$i);
                $this->display(0, "Territory 2");
                if ($i == 0) {  //  If first entry.

                    $this->display(0, "Territory 2.1");
                    if ($i == ($count-1)) { //  If the only stay entry.

                        $this->display(0, "Territory 2.1.1");
                        $row = $this->setStay($details, $i);
                        $row->setDays($this->getDay($startDate, $endDate));
                        array_push($end, $row);

                    }
                    else {

                        $this->display(0, "Territory 2.1.2");
                        if ($this->isTravel($next)) {  //  If next is a travel entry.  [S-T]

                            $this->display(0, "Territory 2.1.2.1");
                            if ($startDate == $endDate) {   //  ([a-a][x-y])

                                $this->display(0, "Territory 2.1.2.1.1");
                                if ($endDate == $nextStartDate) {     //  ([a-a][a-y])

                                    $this->display(0, "Territory 2.1.2.1.1.1");
                                    $row = $this->setStay($details, $i);
                                    $add += $this->getHours("00:00", $nextStartTime);
                                    $ref = $nextStartTime;
                                    array_push($end, $row);

                                } elseif ($endDate != $nextStartDate) {     //  ([a-a][b-y])

                                    $this->display(0, "Territory 2.1.2.1.1.2");
                                    //  Not continuous. Check again.
                                    $row = $this->setStay($details, $i);
                                    $row->setDays($this->getDay($startDate, $endDate));
                                    array_push($end, $row);

                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 2.1.2.1.1.2.1");
                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = $nextStartTime;
                                        $add += $this->getHours("00:00", $nextStartTime);

                                    } else {

                                        $this->display(0, "Territory 2.1.2.1.1.2.2");
                                        $ref = $nextStartTime;

                                    }

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b][x-y])

                                $this->display(0, "Territory 2.1.2.1.2");
                                if ($endDate == $nextStartDate) {     //  ([a-b][b-y])

                                    $this->display(0, "Territory 2.1.2.1.2.1");
                                    $row = $this->setStay($details, $i);
                                    $add += $this->getDay($startDate, $this->subDate($endDate));
                                    $row->setDays($add);
                                    array_push($end, $row);
                                    $add = 0;
                                    $add += $this->getHours("00:00", $nextStartTime);
                                    $ref = $nextStartTime;

                                } elseif ($endDate != $nextStartDate) {     //  ([a-b][c-y])

                                    //  Not continuous. Check again.
                                    $this->display(0, "Territory 2.1.2.1.2.2");
                                    $row = $this->setStay($details, $i);
                                    $add += $this->getDay($startDate, $endDate);
                                    $row->setDays($add);
                                    array_push($end, $row);
                                    $add = 0;
                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 2.1.2.1.2.2.1");
                                        $end = $this->setContiRows($details, $i, $end);
                                        $add += $this->getHours("00:00", $nextStartTime);
                                        $ref = $nextStartTime;
                                    } else {

                                        $this->display(0, "Territory 2.1.2.1.2.2.2");
                                        $ref = $nextStartTime;

                                    }

                                }

                            }

                        } elseif (!$this->isTravel($next)) { //  If next is a stay entry.

                            $this->display(0, "Territory 2.1.2.2");
                            if ($startDate == $endDate) {   //  ([a-a])

                                $this->display(0, "Territory 2.1.2.2.1");
                                if ($endDate == $nextStartDate) {     //  ([a-a][a-x])

                                    $this->display(0, "Territory 2.1.2.2.1.1");
                                    $row = $this->setStay($details, $i);
                                    $ref = "00:00";
                                    array_push($end, $row);

                                } elseif ($endDate != $nextStartDate) {     //  ([a-a][b-x])

                                    //  Not continuous. Check again.
                                    $this->display(0, "Territory 2.1.2.2.1.2");
                                    $row = $this->setStay($details, $i);
                                    $add += 24;
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);
                                    $add = 0;

                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 2.1.2.2.1.2.1");
                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";

                                    } else {

                                        $this->display(0, "Territory 2.1.2.2.1.2.2");
                                        $ref = "00:00";

                                    }

                                }

                            }
                            elseif ($startDate != $endDate) {   //  ([a-b])

                                $this->display(0, "Territory 2.1.2.2.2");
                                if ($endDate == $nextStartDate) {     //  ([a-b][b-y])

                                    $this->display(0, "Territory 2.1.2.2.2.1");
                                    $row = $this->setStay($details, $i);
                                    $add += $this->getDay($startDate, $this->subDate($endDate));
                                    $row->setDays($add);
                                    array_push($end, $row);
                                    $ref = "00:00";
                                    $add = 0;

                                } elseif ($endDate != $nextStartDate) {     //  ([a-b][c-y])

                                    //  Not continuous. Check again.
                                    $this->display(0, "Territory 2.1.2.2.2.2");
                                    $row = $this->setStay($details, $i);
                                    $add += $this->getDay($startDate, $endDate);
                                    $row->setDays($add);
                                    array_push($end, $row);
                                    $add = 0;
                                    if ($next->getConti() == true) {

                                        $this->display(0, "Territory 2.1.2.2.2.2.1");
                                        $end = $this->setContiRows($details, $i, $end);
                                        $ref = "00:00";

                                    } else {

                                        $this->display(0, "Territory 2.1.2.2.2.2.2");
                                        $ref = "00:00";

                                    }

                                }

                            }

                        }

                    }

                }
                else {

                    $this->display(0, "Territory 2.2");
                    if ($i == ($count-1)) { //  If last entry.

                        $this->display(0, "Territory 2.2.1");
                        if ($this->isTravel($prev)) {

                            $this->display(0, "Territory 2.2.1.1");
                            if($prevEndDate == $nextStartDate) {      //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.1.1.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.1.1.1.1");
                                    $row = $this->setStay($details, $i);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.1.1.1.2");
                                    $row = $this->setStay($details, $i);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDay($this->addDate($startDate), $endDate)+$this->getDiv($add));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous.
                                $this->display(0, "Territory 2.2.1.1.2");
                                $row = $this->setStay($details, $i);
                                $add+= $this->getDay($startDate, $endDate);
                                $row->setDays($add);
                                array_push($end, $row);

                            }

                        }
                        elseif (!$this->isTravel($prev)) {

                            $this->display(0, "Territory 2.2.1.2");
                            if ($prevEndDate == $startDate) { //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.1.2.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.1.2.1.1");
                                    $row = $this->setStay($details, $i);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDiv($add));
                                    array_push($end, $row);

                                }
                                elseif ($startDate != $endDate) {       //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.1.2.1.2");
                                    $row = $this->setStay($details, $i);
                                    $add+= $this->getHours($ref, "24:00");
                                    $row->setDays($this->getDay($this->addDate($startDate), $endDate)+ $this->getDiv($add));
                                    array_push($end, $row);

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 2.2.1.2.2");
                                $row = $this->setStay($details, $i);
                                $add+= $this->getDay($startDate, $endDate);
                                $row->setDays($add);
                                array_push($end, $row);

                            }

                        }

                    }
                    else {

                        $this->display(0, "Territory 2.2.2");

                        if ($this->isTravel($prev) && $this->isTravel($next)) {   //  Case 5  [T-S-T]

                            $this->display(0, "Territory 2.2.2.1");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.2.1.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.2.1.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 2.2.2.1.1.1.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, $nextStartTime);
                                        $this->display(0, "Add = ".$add);
                                        $ref = $nextStartTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.1.1.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        $add = 0;
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.1.1.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add+= $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.1.1.1.2.2");
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.2.1.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 2.2.2.1.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getDiv($add));
                                        $add = $this->getHours("00:00", $nextStartTime);
                                        $ref = $nextStartTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.1.1.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.1.1.2.2.1");
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.1.1.2.2.2");
                                            $ref = $nextStartTime;

                                        }

                                    }
                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 2.2.2.1.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 2.2.2.1.2.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 2.2.2.1.2.1.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, $nextStartTime);
                                        $ref = $nextStartTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.1.2.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.1.2.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.1.2.1.2.2");
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.2.1.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 2.2.2.1.2.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getDiv($add));
                                        $add = $this->getHours("00:00", $nextStartTime);
                                        $ref = $nextStartTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.1.2.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add += $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.1.2.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $this->display(0, "Add is .".$add);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.1.2.2.2.2");
                                            $ref = $nextStartTime;
                                            $add = 0;
                                            $this->display(0, "Add is .".$add);

                                        }

                                    }
                                }


                            }

                        }
                        elseif ($this->isTravel($prev) && !$this->isTravel($next)) {  //  Case 6  [T-S-S]

                            $this->display(0, "Territory 2.2.2.2");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.2.2.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.2.2.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 2.2.2.2.1.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.2.1.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.2.1.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.2.1.1.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.2.2.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 2.2.2.2.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getDiv($add));
                                        $ref = "00:00";
                                        $add = 0;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 2.2.2.2.1.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.2.1.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.2.1.2.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 2.2.2.2.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 2.2.2.2.2.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 2.2.2.2.2.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.2.2.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.2.2.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.2.2.1.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 2.2.2.2.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 2.2.2.2.2.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $this->subDate($endDate)));
                                        $ref = "00:00";
                                        $add = 0;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous.
                                        $this->display(0, "Territory 2.2.2.2.2.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.2.2.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {
                                            $this->display(0, "Territory 2.2.2.2.2.2.2.2");

                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }

                        }
                        elseif (!$this->isTravel($prev) && !$this->isTravel($next)) {     //  Case 7  [S-S-S]

                            $this->display(0, "Territory 2.2.2.3");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.2.3.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.2.3.1.1");
                                    if ($endDate == $nextStartDate) {     //([x-a][a-a][a-y])

                                        $this->display(0, "Territory 2.2.2.3.1.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.3.1.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.3.1.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.3.1.1.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.2.3.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 2.2.2.3.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getDiv($add));
                                        $ref = "00:00";
                                        $add = 0;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.3.1.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.3.1.2.2.1");
                                            $end = $this->setContiRows($details, $i, $row);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.3.1.2.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                //  Not continuous. Check again.
                                $this->display(0, "Territory 2.2.2.3.2");

                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 2.2.2.3.2.1");
                                    if ($endDate == $nextStartDate) {     //([x-a][b-b][b-y])

                                        $this->display(0, "Territory 2.2.2.3.2.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.3.2.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.3.2.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.3.2.1.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 2.2.2.3.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 2.2.2.3.2.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $this->subDate($endDate)));
                                        array_push($end, $row);
                                        $ref = "00:00";
                                        $add = 0;

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.3.2.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.3.2.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = "00:00";
                                            $add = 0;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.3.2.2.2.2");
                                            $ref = "00:00";
                                            $add = 0;

                                        }

                                    }

                                }

                            }

                        }
                        elseif (!$this->isTravel($prev) && $this->isTravel($next)) {      //  Case 8  [S-S-T]

                            $this->display(0, "Territory 2.2.2.4");
                            if ($prevEndDate == $startDate) {     //  ([x-a][a-y])

                                $this->display(0, "Territory 2.2.2.4.1");
                                if ($startDate == $endDate) {   //  ([x-a][a-a])

                                    $this->display(0, "Territory 2.2.2.4.1.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-a][a-y])

                                        $this->display(0, "Territory 2.2.2.4.1.1.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, $nextStartTime);
                                        $ref = $nextStartTime;
                                        array_push($end, $row);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-a][b-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.4.1.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.4.1.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.4.1.1.2.2");
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][a-b])

                                    $this->display(0, "Territory 2.2.2.4.1.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][a-b][b-y])

                                        $this->display(0, "Territory 2.2.2.4.1.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate)) + $this->getDiv($add));
                                        array_push($end, $row);
                                        $add = $this->getHours("00:00", $nextStartTime);
                                        $ref = $nextStartTime;

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][a-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.4.1.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add)+$this->getDay($this->addDate($startDate), $endDate));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.4.1.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $ref = $nextStartTime;
                                            $add = $this->getHours("00:00", $nextStartTime);

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.4.1.2.2.2");
                                            $ref = $nextStartTime;
                                            $add = 0;

                                        }

                                    }

                                }

                            }
                            elseif ($prevEndDate != $startDate) {     //  ([x-a][b-y])

                                $this->display(0, "Territory 2.2.2.4.2");
                                if ($startDate == $endDate) {   //  ([x-a][b-b])

                                    $this->display(0, "Territory 2.2.2.4.2.1");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-b][b-y])

                                        $this->display(0, "Territory 2.2.2.4.2.1.1");
                                        $row = $this->setStay($details, $i);
                                        array_push($end, $row);
                                        $add+= $this->getHours($ref, $nextStartTime);
                                        $ref = $nextStartTime;

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-b][c-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.4.2.1.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDiv($add));
                                        array_push($end, $row);

                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.4.2.1.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.4.2.1.2.2");
                                            $add = 0;
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }
                                elseif ($startDate != $endDate) {   //  ([x-a][b-c])

                                    $this->display(0, "Territory 2.2.2.4.2.2");
                                    if ($endDate == $nextStartDate) {     //  ([x-a][b-c][c-y])

                                        $this->display(0, "Territory 2.2.2.4.2.2.1");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate), $this->subDate($endDate))+$this->getDiv($add));
                                        array_push($end, $row);
                                        $ref = $nextStartTime;
                                        $add = $this->getHours("00:00", $nextStartTime);

                                    }
                                    elseif ($endDate != $nextStartDate) {     //  ([x-a][b-c][d-y])

                                        //  Not continuous. Check again.
                                        $this->display(0, "Territory 2.2.2.4.2.2.2");
                                        $row = $this->setStay($details, $i);
                                        $add+= $this->getHours($ref, "24:00");
                                        $row->setDays($this->getDay($this->addDate($startDate),$endDate)+$this->getDiv($add));
                                        array_push($end, $row);
                                        if ($next->getConti() == true) {

                                            $this->display(0, "Territory 2.2.2.4.2.2.2.1");
                                            $end = $this->setContiRows($details, $i, $end);
                                            $add = $this->getHours("00:00", $nextStartTime);
                                            $ref = $nextStartTime;

                                        }
                                        else {

                                            $this->display(0, "Territory 2.2.2.4.2.2.2.2");
                                            $add = 0;
                                            $ref = $nextStartTime;

                                        }

                                    }

                                }

                            }

                        }
                    }

                }

            }

            $this->display(0, "Add = ".$add);
            $this->display(0, "Ref = ".$ref);

        }

        return $end;

    }

}

$trial = new Trial();   //  Create a new object of current class.

$data = $trial->getData();  //  Fetch the data from the form.

$final = $trial->processData($data);    // Process the data.

$display = new Display($data->getOfficerData(), $final);    //  Create a new display object and pass the processed data.
$display->display();    //  Display the data in IRISET format.