<?php


class Instructions {


    /**
     * Instructions constructor.
     */
    public function __construct() {
    }

    public function display() {

        echo "Try to make the journey as continuous as possible.<br>";
        echo "Enter valid dates and time.<br>";
        echo "Enter each journey ans stay seperately even if both are on same day.<br>";

    }

}

$ins = new Instructions();
$ins->display();