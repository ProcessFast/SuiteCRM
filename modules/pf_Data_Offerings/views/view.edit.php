<?php

require_once('include/MVC/View/views/view.edit.php');

class pf_Data_OfferingsViewEdit extends ViewEdit {

    /**
     * Edit view constructor function
     */
    function pf_Data_OfferingsViewEdit() {
        parent::ViewEdit();
    }

    /**
     * This method displays the data to the screen. Place the logic to display output to the screen here.
     */
    function display() {        
        echo '<link rel="stylesheet" type="text/css" href="custom/themes/dataoffering/css/dataoffering.css" />';
        echo '<script type="text/javascript" src="custom/include/javascript/dataoffering.js"></script>';
        parent::display();
    }

}

?>