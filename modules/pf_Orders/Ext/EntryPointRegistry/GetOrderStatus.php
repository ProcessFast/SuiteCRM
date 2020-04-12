<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
if(!empty($_REQUEST['order_number'])){
    $order_number = $GLOBALS["db"]->quote($_REQUEST['order_number']);
    $sql = "SELECT order_status FROM pf_orders where deleted = 0 and order_number = '".$order_number."'"; 
    $row = $GLOBALS["db"]->fetchOne($sql); 
    if(empty($row)){
    	$row['error'] = "No Order Found.";
    }   
}else{
    $row['error'] = "Please pass the Order number";
}
echo json_encode($row);exit;