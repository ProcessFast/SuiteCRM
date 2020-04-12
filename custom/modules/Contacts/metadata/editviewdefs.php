<?php
$viewdefs ['Contacts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
          1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
          2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
          3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
          4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
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
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
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
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'last_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'comment' => 'Work phone number of the contact',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'comment' => 'Mobile phone number of the contact',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'title',
            'comment' => 'The title of the contact',
            'label' => 'LBL_TITLE',
          ),
          1 => 'department',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'displayParams' => 
            array (
              'key' => 'billing',
              'copy' => 'primary',
              'billingKey' => 'primary',
              'additionalFields' => 
              array (
                'phone_office' => 'phone_work',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'avoid_contact_c',
            'label' => 'LBL_AVOID_CONTACT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_notes_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NOTES',
          ),
          1 => 
          array (
            'name' => 'hot_buttons_c',
            'studio' => 'visible',
            'label' => 'LBL_HOT_BUTTONS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ops_insights_user_status_c',
            'studio' => 'visible',
            'label' => 'LBL_OPS_INSIGHTS_USER_STATUS',
          ),
          1 => 
          array (
            'name' => 'conferences_attended_c',
            'studio' => 'visible',
            'label' => 'LBL_CONFERENCES_ATTENDED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'points_c',
            'label' => 'LBL_POINTS',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'pf_data_offerings_contacts_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'facebook_c',
            'label' => 'LBL_FACEBOOK',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'linkedin_c',
            'label' => 'LBL_LINKEDIN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'google_plus_c',
            'label' => 'LBL_GOOGLE_PLUS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'instagram_c',
            'label' => 'LBL_INSTAGRAM',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'twitter_c',
            'label' => 'LBL_TWITTER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'skype_profile_c',
            'label' => 'LBL_SKYPE_PROFILE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'upwork_profile_url_c',
            'label' => 'LBL_UPWORK_PROFILE_URL',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'report_to_name',
            'label' => 'LBL_REPORTS_TO',
          ),
          1 => 'campaign_name',
        ),
      ),
    ),
  ),
);
;
?>
