<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CustomLogicHooks {

    function processRecord($bean, $event, $args) {        
        $oOrder = $this->loadOrder($bean);
        $bean->order_status = $oOrder->order_status;
        $bean->pf_data_offerings_pf_orders_name = $oOrder->order_number;
        if(strtotime($bean->date_modified) < strtotime($oOrder->date_modified)){
            $bean->date_modified = $oOrder->date_modified;
        } 
        $bean->order_number = $oOrder->order_number;
    }
    public function loadOrder($focus) {
        $order_id = $focus->pf_data_offerings_pf_orderspf_orders_idb;
        $oOrder = BeanFactory::getBean('pf_Orders', $order_id);
        return $oOrder;
    }
}
