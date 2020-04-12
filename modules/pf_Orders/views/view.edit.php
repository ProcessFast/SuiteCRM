<?php

require_once('include/MVC/View/views/view.edit.php');

class pf_OrdersViewEdit extends ViewEdit {

    /**
     * Edit view constructor function
     */
    function pf_OrdersViewEdit() {
        parent::ViewEdit();
    }

    /**
     * This method displays the data to the screen. Place the logic to display output to the screen here.
     */
    function display() {                
        parent::display();
        echo '<script>$(document).ready(function () {$("#pf_data_offerings_pf_orders_name").parents(".edit-view-row-item").addClass("hidden");
        });</script>';
        
    }

}

?>