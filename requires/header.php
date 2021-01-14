<?php

if ($this->getOfficerData()->getZoneOrUnit() == "IRISET"){
    include "./headers/iriset_header.php";
}
elseif ($this->getOfficerData()->getZoneOrUnit() == "SCR") {
    include "./headers/scr_header.php";
}
elseif ($this->getOfficerData()->getZoneOrUnit() == "NR") {
    include "./headers/nr_header.php";
}
