<?php


class Credits {


    /**
     * Credits constructor.
     */
    public function __construct() {
    }

    public function displayCredits() {

        echo "<div class='box'>";
        echo "<div class='row align-content-center'>";
        echo "<div class='col-md-6 offset-md-3 uuu'>";
        echo "<div class='list-group'>";
        echo "<a href='../'  class='list-group-item list-group-item-primary' style='text-align: center'><h3>Credits</h3></a>";
        echo " <a target='_blank' href='https://github.com/itsmepsk' class='list-group-item list-group-item' style='text-align: center'>Prathamesh Kakade (ADSTE Pakala)</a>";
        echo "<li class='list-group-item' style='text-align: center'>Karamveer Prasad</li>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

    }

    public function displayHead() {

        echo "<html>";
        echo "<head>";
        echo "<title>Travel Allowance Generator</title>";
        echo "<meta charset='utf-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "<link href='../files/css/index.css' rel='stylesheet' type='text/css'>";
        echo "<script href='../files/js/jquery-3.4.1.min.js'></script>";
        echo "<script href='../files/js/bootstrap.min.js'></script>";
        echo "<link href='../files/css/bootstrap.min.css' rel='stylesheet' type='text/css'>";
        echo "</head>";

        echo "<body>";

    }

}

$cr = new Credits();
$cr->displayHead();
$cr->displayCredits();