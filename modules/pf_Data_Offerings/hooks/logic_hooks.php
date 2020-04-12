<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$hook_version = 1;
$hook_array = Array();
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'ProcessRecord', 'custom/modules/pf_Data_Offerings/CustomLogicHooks.php','CustomLogicHooks', 'processRecord');
?>