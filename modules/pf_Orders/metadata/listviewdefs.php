<?php
$module_name = 'pf_Orders';
$listViewDefs [$module_name] = 
array (
  'ORDER_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ORDER_NUMBER',
    'width' => '10%',
    'default' => true,
    'link' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ORDER_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ORDER_STATUS',
    'width' => '10%',
    'default' => true,
  ),
);
;
?>
