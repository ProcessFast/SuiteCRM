<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        2 => 
        array (
          0 => 'account_type',
          1 => 
          array (
            'name' => 'supplier_type_c',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER_TYPE',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'title_production_sys_c',
            'studio' => 'visible',
            'label' => 'LBL_TITLE_PRODUCTION_SYS',
          ),
          1 => 
          array (
            'name' => 'current_reporting_solution_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_REPORTING_SOLUTION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'account_notes_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_NOTES',
          ),
          1 => 
          array (
            'name' => 'biggest_problem_to_solve_c',
            'label' => 'LBL_BIGGEST_PROBLEM_TO_SOLVE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'client_types_c',
            'studio' => 'visible',
            'label' => 'LBL_CLIENT_TYPES',
          ),
          1 => 
          array (
            'name' => 'current_ops_insights_client_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_OPS_INSIGHTS_CLIENT',
          ),
        ),
        7 => 
        array (
          0 => '',
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 'industry',
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tax_id_c',
            'label' => 'LBL_TAX_ID',
          ),
          1 => 'annual_revenue',
        ),
        2 => 
        array (
          0 => 'employees',
          1 => 'parent_name',
        ),
        3 => 
        array (
          0 => 'campaign_name',
        ),
      ),
    ),
  ),
);
$viewdefs['Accounts']['EditView']['templateMeta'] = array (
  'form' => 
  array (
    'buttons' => 
    array (
      0 => 'SAVE',
      1 => 'CANCEL',
    ),
  ),
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
  'includes' => 
  array (
    0 => 
    array (
      'file' => 'modules/Accounts/Account.js',
    ),
  ),
  'useTabs' => false,
  'tabDefs' => 
  array (
    'LBL_ACCOUNT_INFORMATION' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
    'LBL_PANEL_ADVANCED' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
  ),
);
?>
