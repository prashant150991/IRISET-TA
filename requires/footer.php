<?php

if ($this->getOfficerData()->getZoneOrUnit() == "IRISET"){
    include "./footers/iriset_footer.php";
}
else {
    include "./footers/scr_footer.php";
}