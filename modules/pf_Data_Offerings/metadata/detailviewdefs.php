<?php
$module_name = 'pf_Data_Offerings';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
          'AOS_GENLET' => /* Added extra param for adding print pdf option under detail view action menu */
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_PRINT_AS_PDF}">',
          ),
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'pf_data_offerings_pf_orders_name',
            'studio' => 'visible',
          ),
          1 => 
          array (
            'name' => 'order_status',
            'studio' => 'visible',
            'label' => 'LBL_ORDER_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'studio' => 'visible',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          )
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'studio' => 'visible',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'studio' => 'visible',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'dataoffering_supplier',
            'studio' => 'visible',
            'label' => 'LBL_DATAOFFERING_SUPPLIER',
          )
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'supplier_notes',
            'studio' => 'visible',
          )
        ),
      ),  
      'default' => 
      array (        
        0 => 
        array (
          0 => array (
            'name' => 'client_info',
            'studio' => 'visible',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'tax_id',
            'label' => 'LBL_TAX_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'pf_data_offerings_fp_event_locations_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'service_street_address',
            'label' => 'LBL_SERVICE_STREET_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'service_city',
            'label' => 'LBL_SERVICE_CITY',
          ),
          1 => 
          array (
            'name' => 'service_state',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_STATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'service_zip_code',
            'label' => 'LBL_SERVICE_ZIP_CODE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'have_data_services',
            'studio' => 'visible',
            'label' => 'LBL_HAVE_DATA_SERVICES',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'service_providers',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_PROVIDERS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'current_service_provider',
            'label' => 'LBL_CURRENT_SERVICE_PROVIDER',
          ),
          1 => 
          array (
            'name' => 'service_provider_account',
            'label' => 'LBL_SERVICE_PROVIDER_ACCOUNT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'num_of_site_users',
            'label' => 'LBL_NUM_OF_SITE_USERS',
          ),
          1 => 
          array (
            'name' => 'desired_services',
            'studio' => 'visible',
            'label' => 'LBL_DESIRED_SERVICES',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'cable_speed',
            'studio' => 'visible',
            'label' => 'LBL_CABLE_SPEED',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'static_ip_needed',
            'studio' => 'visible',
            'label' => 'LBL_ STATIC_IP_NEEDED',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'number_of_static_ip',
            'studio' => 'visible',
            'label' => 'LBL_NUMBER_OF_STATIC_IP',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'service_site_contact',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_SITE_CONTACT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'service_first_name',
            'label' => 'LBL_SERVICE_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'service_last_name',
            'label' => 'LBL_SERVICE_LAST_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'service_email',
            'label' => 'LBL_SERVICE_EMAIL',
          ),
          1 => 
          array (
            'name' => 'service_phone',
            'label' => 'LBL_SERVICE_PHONE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'billing_contact_info',
            'studio' => 'visible',
            'label' => 'LBL_BILLING_CONTACT_INFO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'billing_first_name',
            'label' => 'LBL_BILLING_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'billing_last_name',
            'label' => 'LBL_BILLING_LAST_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'billing_email',
            'label' => 'LBL_BILLING_EMAIL',
          ),
          1 => 
          array (
            'name' => 'billing_phone',
            'label' => 'LBL_BILLING_PHONE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_street_address',
            'label' => 'LBL_BILLING_STREET_ADDRESS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'billing_city',
            'label' => 'LBL_BILLING_CITY',
          ),
          1 => 
          array (
            'name' => 'billing_state',
            'studio' => 'visible',
            'label' => 'LBL_BILLING_STATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'billing_zip_code',
            'label' => 'LBL_BILLING_ZIP_CODE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
