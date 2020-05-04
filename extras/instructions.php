<?php


//require 'header.php';

class Instructions {


    /**
     * Instructions constructor.
     */
    public function __construct() {
    }

    public function display() {

        echo "<div class='box'>";
        echo "<div class='row align-content-center'>";
        echo "<div class='col-md-6 offset-md-3 uuu'>";
        echo "<div class='list-group'>";
        echo "<li class='list-group-item list-group-item-primary' style='text-align: center'><h3>Instructions</h3></li>";
        echo "<li class='list-group-item'>Enter all the journey and travel entries sequentially.</li>";
        echo "<li class='list-group-item'>Enter valid dates and time.</li>";
        echo "<li class='list-group-item'>Enter each journey and stay seperately even if both are on same day.</li>";
        echo "<li class='list-group-item'>If not travelled by train, enter the used mode of transport.(e.g. Bus or Flight)</li>";
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
        echo "<link href='./files/css/index.css' rel='stylesheet' type='text/css'>";
    echo "<script href='./files/js/jquery-3.4.1.min.js'></script>";
    echo "<script href='./files/js/bootstrap.min.js'></script>";
    echo "<link href='files/css/bootstrap.min.css' rel='stylesheet' type='text/css'>";
    echo "</head>";

    echo "<body>";

    }

}


$ins = new Instructions();
$ins->displayHead();
$ins->display();