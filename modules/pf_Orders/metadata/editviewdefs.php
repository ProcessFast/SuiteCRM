<?php
$module_name = 'pf_Orders';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'order_status',
            'studio' => 'visible',
            'label' => 'LBL_ORDER_STATUS',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'client_order_notes',
            'studio' => 'visible',
            'label' => 'LBL_CLIENT_ORDER_NOTES',
          ),
        ),
      ),
    ),
  ),
);
;
?>
