<?php

class Display {

    private $end;
    private $officerData;

    /**
     * Display constructor.
     * @param $officerData
     * @param $end
     */
    public function __construct($officerData, $end) {
        $this->officerData = $officerData;
        $this->end = $end;
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
    public function getEnd() {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end) {
        $this->end = $end;
    }

    /**
     * Utility function to convert amount into words.
     */
    public function getIndianCurrency($number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise. "Only";
    }

    /**
     * Utility function to display the Officer name details.
     */
    public function displayNameTable() {

        echo "<script>";
        echo "document.title = 'TA Form - ".$this->getOfficerData()->getName()." (".$this->getOfficerData()->getMonth().")'";
        echo "</script>";

        echo "<table class='t1'>";
        echo "<tr>";
        echo "<td>";
        echo "<div class = 'ddd'>";
        //<!--               	echo "वेतन बैंड/Pay Band: <b>PB-3 15600-39100</b>";
        echo "नाम/Name: <b>". $this->getOfficerData()->getName(). "</b>";
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class = 'ddd'>";
        //                            echo "मूल वेतन/Basic Pay:    <b>56100/- (Level-10 of per 7th CPC)</b>";
        echo "पदनाम/Designation:    <b>". $this->getOfficerData()->getDesignation(). "</b>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo "<div class = 'ddd'>";
        //                            echo "का ग्र तिथि/DOJ:  <b>08 July 2019</b>";
        echo "माह/Month:  <b>" .$this->getOfficerData()->getMonth(). "</b>";
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class = 'ddd'>";
        //                            echo "का ग्र तिथि/DOJ:  <b>08 July 2019</b>";
        $division = ($this->getOfficerData()->getDivision() == "")? "-": $this->getOfficerData()->getDivision();
        echo "माह/Division:  <b>" .$division. "</b>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";

    }

    /**
     * Utility function to display the Officer pay details.
     */
    public function displayPayTable() {

        echo "<table class='t2'>";
        echo "<tr>";
        echo "<td>";
        echo "<div class = 'ddd'>";
//<!--               	echo "वेतन बैंड/Pay Band: <b>PB-3 15600-39100</b>";
        $payBand = ($this->getOfficerData()->getPayBand() == "")? "-": $this->getOfficerData()->getpayBand();
        echo "वेतन बैंड/Pay Band: <b>". $payBand. "</b>";
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class = 'ddd'>";
//                            echo "मूल वेतन/Basic Pay:    <b>56100/- (Level-10 of per 7th CPC)</b>";
        $basicPay = ($this->getOfficerData()->getBasicPay() == "")? "-": $this->getOfficerData()->getBasicPay();
        echo "मूल वेतन/Basic Pay:    <b>". $basicPay. "</b>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo "<div class = 'ddd'>";
//                            echo "का ग्र तिथि/DOJ:  <b>08 July 2019</b>";
        $dateOfJoining = ($this->getOfficerData()->getDateOfJoining() == "")? "-": $this->getOfficerData()->getDateOfJoining();
        echo "का ग्र तिथि/DOJ:  <b>" .$dateOfJoining. "</b>";
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class = 'ddd'>";
//                            echo "का ग्र तिथि/DOJ:  <b>08 July 2019</b>";
        $pfNumber = ($this->getOfficerData()->getPfNumber() == "")? "-": $this->getOfficerData()->getPfNumber();
        echo "का ग्र तिथि/PF Number:  <b>" .$pfNumber. "</b>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";

    }

    /**
     * Utility function to display the Officer details.
     */
    public function displayOfficerData() {

        $this->displayNameTable();
        $this->displayPayTable();


    }

    /**
     * Utility function to display the travel details table head.
     */
    public function displayTravelTableHead() {


            echo "<tr>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "तारीख/Date";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "गाड़ी सं./Train No.";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "प्रस्थान समय/Time Dept.";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "आगमन समय/ Time Arrived";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "स्टेशन ओर से/Station From";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "स्टेशन की ओर/Station To";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "किलोमीटर/";
                        echo "<br>Distance In Km";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "दिन Day";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "यात्रा का उद्देश्य/Object of Journey";
                    echo "</div>";
                echo "</th>";
                echo "<th style = 'width: 10%'>";
                    echo "<div class='ccc'>";
                        echo "दर /रुपयाRate/Amount";
                    echo "</div>";
                echo "</th>";
            echo "</tr>";

    }

    /**
     * Utility function to display a travel entry.
     */
    public function displayTravelEntry($row, $total) {

        echo "<tr>";
        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getDate();
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getTrain();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getDepTime();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getArrTime();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getFromStation();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getToStation();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getDistance();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        $days = $row->getDays();
        if ($days != "-") {
            $days = floatval($days);
            $total+= $days;
        }
        echo $days;
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getObjective();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        if ($days == "-") {
            echo "-";
        }
        else {
            echo $days. "* ".$this->getOfficerData()->getPerDayTA()." = ". $days*$this->getOfficerData()->getPerDayTA();
        }
        echo "</div>";
        echo "</td>";
        echo "</tr>";

        return $total;

    }

    /**
     * Utility function to display a stay entry.
     */
    public function displayStayEntry($row, $total) {

        echo "<tr>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo $row->getDate();
        echo "</div>";
        echo "</td>";

        echo "<td colspan='6'>";
        echo "<div class='ddd'>";
        echo $row->getObjective();
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        $days = $row->getDays();
        if ($days != "-") {
            $days = floatval($days);
            $total+= $days;
        }
        echo $days;
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo "-";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        if ($days != "-") {
            echo $days . " x ".$this->getOfficerData()->getPerDayTA()." = " . $days * $this->getOfficerData()->getPerDayTA();
        }
        else {
            echo "-";
        }
        echo "</div>";
        echo "</td>";
        echo "</tr>";

        return $total;

    }

    /**
     * Utility function to display the total sum.
     */
    public function displayTravelTotal($total) {

        echo "<tr>";

        echo "<td colspan='7'>";
        echo "<div class='ddd'>";
        echo "<b><p align='center'> Total </p></b>";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo "<b>". $total."</b>";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        echo "-";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        echo "<div class='ddd'>";
        $full = $total*$this->getOfficerData()->getPerDayTA();
        echo "<b>".$full."/-</b>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";

        echo "<br/>";
        echo "<br/>";
        echo "<br/>";


        echo "<div class = 'total'>";
        echo "<b>Total TA Claim &nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $full ."/-</b>";
        echo "<br>";
        echo "( In Words	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $this->getIndianCurrency($full). " )";
        echo "</div>";
        return $full;

    }

    /**
     * Utility function to display the Acknowledgement text.
     */
    public function displayAcknowledgement() {

        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        echo "<div class = 'fin'>";
        echo "मैं प्रमाणित करता हूं कि उपर्युक्त .................. इस अवधि के दौरान जिसके
         लिए इस बिल में भत्ता मांगा गया है, रेलवे के कार्य से ड्यूटी पर मुख्यालय स्टेशन से बाहर गए थे.";

        echo "<br/>";
        echo "<br/>";

        echo "<b>I hereby Certify that the above mentioned (".$this->getOfficerData()->getName().") was absent on duty from his headquarters
         station during the period charged for the bill on Railway business.</b>";
        echo "</div>";


    }

    /**
     * Utility function to display the Signature box.
     */
    public function displaySignature() {
        include "./footers/scr_footer.php";
    }

    /**
     * Utility function to display the travel details table body.
     */
    public function displayTravelTableBody() {

        $array = $this->getEnd();
        $total = 0;
        foreach ($array as $row) {
            if ($row->getType() == "Travel") {
                $total = $this->displayTravelEntry($row, $total);
            }
            else {
                $total = $this->displayStayEntry($row, $total);
            }

        }

        $full = $this->displayTravelTotal($total);
        $this->displayAcknowledgement();
//        $this->displaySignature();

    }

    /**
     * Utility function to display the travel details table.
     */
    public function displayTravelData() {

        echo "<table class='table table-bordered t3'>";
        $this->displayTravelTableHead();
        $this->displayTravelTableBody();
        echo "</table>";

    }

    /**
     * Utility function to display the data in formatted way.
     */
    public function display_($data) {

        echo "<pre>";
        var_dump($data);
        echo "<pre>";
        
    }

    /**
     * Main function which displays the data in IRISET format.
     */
    public function display() {
        include "header.php";
        echo "<div class='main'>";
        $this->displayOfficerData();
        $this->displayTravelData();
        echo "</div>";
        include "footer.php";

    }

}

