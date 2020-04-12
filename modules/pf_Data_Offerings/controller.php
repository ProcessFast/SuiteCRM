<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('include/MVC/Controller/SugarController.php');
class pf_Data_OfferingsController extends SugarController{        
    
    /**
     * Edit action of our module which will be executed when we add or edit any record
     */
    function action_EditView()
    {        
        $oOrder = $this->loadOrder($this->bean);
        $this->bean->order_status = $oOrder->order_status;
        // Assigned view file which is located at \custom\modules\<module-name>\views\view.edit.php
        $this->view = 'edit';
    }        
    
    /**
     * DetailView action of our module which will be executed when we open detail view of any record
     */
    function action_DetailView()
    {        
        $oOrder = $this->loadOrder($this->bean);
        $this->bean->order_status = $oOrder->order_status;
        $this->bean->pf_data_offerings_pf_orders_name = $oOrder->order_number;
        $this->bean->assigned_user_name = $oOrder->assigned_user_name;
        $this->bean->date_entered = $oOrder->date_entered;
        if(strtotime($this->bean->date_modified) < strtotime($oOrder->date_modified)){
            $this->bean->date_modified = $oOrder->date_modified;
        }        
        // Assigned view file which is located at \custom\modules\<module-name>\views\view.detail.php
        $this->view = 'detail';
    }
    
    public function loadOrder($focus) {
        $order_id = $focus->pf_data_offerings_pf_orderspf_orders_idb;
        $oOrder = BeanFactory::getBean('pf_Orders', $order_id);
        return $oOrder;
    }
    
    /**
     * This is the broadest specification and gives the user full control over the Save process.
     * It will be executed whenever we submit the form either in edit or add new.
     */
    public function action_save()
    {
        // Inside the save function we will get bean (means model object) which holds the all information we have passed from form.
        $focus = $this->bean;
        $account_id = $this->createAccount($focus);
        $service_contact_id = $this->createServiceContact($focus);
        $billing_contact_id = $this->createBillingContact($focus);
        $location_id = $this->createLocation($focus);
        $order_id = $this->createOrder($focus);

        // Set all returned primary key to our bean object to save id in db table
        $this->bean->account_id1_c = $account_id;
        $this->bean->pf_data_offerings_fp_event_locationsfp_event_locations_ida = $location_id;
        $this->bean->contact_id_c = $service_contact_id;
        $this->bean->contact_id1_c = $billing_contact_id;
        $this->bean->pf_data_offerings_pf_orderspf_orders_idb = $order_id;
        $this->bean->save();
    }
    
    /**
     * This is where the view is being setup. 
     * At this point the developer could set a redirect url, do some post save processing, or set a different view.
     */
    public function post_save(){
        $focus = $this->bean;
        $params = array(
            'module'=> 'pf_Data_Offerings',
            'action'=>'DetailView',
            'record' => $this->bean->id
        );
        SugarApplication::redirect('index.php?' . http_build_query($params));
    }    
    
    /**
     * Create the new record OR Update existing record inside Account module
     * @param object $focus
     * @return will return primary key of record
     */
    function createAccount($focus){
        if(!empty($focus->account_id1_c)){                  
            $account_id = $focus->account_id1_c;
            // Get Account Object 
            $oAccount = BeanFactory::getBean('Accounts', $account_id);
        }else{
            // Get Account Object 
            $oAccount = BeanFactory::getBean('Accounts');
        }        
        $oAccount->name = $focus->name;
        $oAccount->tax_id_c = $focus->tax_id;
        $oAccount->email1 = $focus->billing_email;        
        $oAccount->phone_office = $focus->billing_phone;
        $oAccount->account_type = 'Customer';
        $oAccount->billing_address_street = $focus->billing_street_address;
        $oAccount->billing_address_city = $focus->billing_city;
        $oAccount->billing_address_state = $focus->billing_state;
        $oAccount->billing_address_postalcode = $focus->billing_zip_code;
        $oAccount->save();
        return $oAccount->id;
    }
    
    /**
     * Create the new record OR Update existing record inside Contact module
     * @param object $focus
     * @return will return primary key of record
     */
    function createServiceContact($focus){
        //$oContact = new Contact();
        if(!empty($focus->contact_id_c)){    
            $service_contact_id = $focus->contact_id_c;
            $oContact = BeanFactory::getBean('Contacts', $service_contact_id);
        }else{
            $oContact = BeanFactory::getBean('Contacts');
        }
        $oContact->first_name = $focus->service_first_name;
        $oContact->last_name = $focus->service_last_name;
        $oContact->phone_work = $focus->service_phone;
        $oContact->phone_mobile = $focus->service_phone;
        $oContact->email1 = $focus->service_email;
        $oContact->primary_address_street = $focus->service_street_address;
        $oContact->primary_address_city = $focus->service_city;
        $oContact->primary_address_state = $focus->service_state;
        $oContact->primary_address_postalcode = $focus->service_zip_code;
        $oContact->save();
        return $oContact->id;
    }
    
    /**
     * Create the new record OR Update existing record inside Contact module
     * @param object $focus
     * @return will return primary key of record
     */
    function createBillingContact($focus){
        //$oContact = new Contact();
        if(!empty($focus->contact_id1_c)){ 
            $billing_contact_id = $focus->contact_id1_c;
            $oContact = BeanFactory::getBean('Contacts', $billing_contact_id);
        }else{
            $oContact = BeanFactory::getBean('Contacts');
        }
        $oContact->first_name = $focus->billing_first_name;
        $oContact->last_name = $focus->billing_last_name;
        $oContact->phone_work = $focus->billing_phone;
        $oContact->phone_mobile = $focus->billing_phone;
        $oContact->email1 = $focus->billing_email;  
        $oContact->primary_address_street = $focus->billing_street_address;
        $oContact->primary_address_city = $focus->billing_city;
        $oContact->primary_address_state = $focus->billing_state;
        $oContact->primary_address_postalcode = $focus->billing_zip_code;
        $oContact->save();
        return $oContact->id;
    }
        
    /**
     * Create the new record OR Update existing record inside FP Event Location module
     * @param object $focus
     * @return will return primary key of record
     */
    function createLocation($focus){
        //$oLocation = new FP_Event_Locations();
        if(!empty($focus->pf_data_offerings_fp_event_locationsfp_event_locations_ida)){
            // Get Account Object       
            $location_id = $focus->pf_data_offerings_fp_event_locationsfp_event_locations_ida;
            $oLocation = BeanFactory::getBean('FP_Event_Locations', $location_id);
        }else{
            $oLocation = BeanFactory::getBean('FP_Event_Locations');
        }       
        $oLocation->name = $focus->name." - ".$focus->service_street_address;
        $oLocation->address = $focus->service_street_address;
        $oLocation->address_city = $focus->service_city;
        $oLocation->address_postalcode = $focus->service_zip_code;
        $oLocation->address_state = $focus->service_state;
        $oLocation->save();
        return $oLocation->id;
    }
    
    /**
     * Create the new record OR Update existing record inside pf_order module
     * @param object $focus
     * @return will return primary key of record
     */
    function createOrder($focus){
        //$order = new pf_Orders();
        if(!empty($focus->pf_data_offerings_pf_orderspf_orders_idb)){
            // Get Order Object       
            $order_id = $focus->pf_data_offerings_pf_orderspf_orders_idb;
            $oOrder = BeanFactory::getBean('pf_Orders', $order_id);
        }else{
            $oOrder = BeanFactory::getBean('pf_Orders');
        }       
        if(empty($oOrder->order_number)){
            $oOrder->order_number = "PF-". rand(111111, 999999);
        }
        $oOrder->name = $focus->name." - Data Offering";
        $oOrder->order_status = $focus->order_status;
        $oOrder->save();
        return $oOrder->id;
    }
    
    /**
     * Retrieve the contacts data
     * This function is used for returning html li tag, which contains all the data to auto fill using autocomplete js
     */
    function action_loadContacts(){ 
        $type = $_GET['type'];
        $this->view = false;
        $keyword = '"%'.$GLOBALS["db"]->quote($_POST['keyword']).'%"';
        $sql = "SELECT id, CONCAT(`first_name`, ' ', `last_name`) as name FROM contacts where deleted = 0 having name LIKE $keyword order by name"; 
        $result = $GLOBALS["db"]->query($sql);
        while ( $row = $GLOBALS["db"]->fetchByAssoc($result) ) {
            $contact_id = $row['id'];
            $oContact = BeanFactory::getBean('Contacts', $contact_id);   
            $row_data = $oContact->fetched_row;            
            $name = $row_data['first_name']." ".$row_data['last_name'];
            $contact_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $name);
            echo '<li data-type="'.$type.'" data-name="'.$name.'" data-id="'.$row['id'].'" data-first_name="'.$row_data['first_name'].'" '
                    . ' data-last_name="'.$row_data['last_name'].'" data-email="'.$row_data['email1'].'" data-phone="'.$row_data['phone_work'].'"'
                    . ' data-street_address="'.$row_data['primary_address_street'].'" data-city="'.$row_data['primary_address_city'].'" '
                    . ' data-zip_code="'.$row_data['primary_address_postalcode'].'" data-state="'.$row_data['primary_address_state'].'" >'.$contact_name.'</li>';
        }        
    }
    
    /**
     * Retrieve the Accounts data
     * This function is used for returning html li tag, which contains all the data to auto fill using autocomplete js
     */
    function action_loadAccounts(){ 
        $type = $_GET['type'];
        $this->view = false;
        $keyword = '"%'.$GLOBALS["db"]->quote($_POST['keyword']).'%"';
        $sql = "SELECT id, name FROM accounts where deleted = 0 and name LIKE $keyword "; 
        if(!empty($type) && $type=='dataoffering_supplier'){
            $sql .= " and account_type = 'supplier' "; 
        }
        $sql .= " order by name "; 
        $result = $GLOBALS["db"]->query($sql);
        while ( $row = $GLOBALS["db"]->fetchByAssoc($result) ) {
            $account_id = $row['id'];
            $oAccount = BeanFactory::getBean('Accounts', $account_id);   
            $row_data = $oAccount->fetched_row;          
            $account_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $row['name']);
            echo '<li data-type="'.$type.'" data-name="'.$row['name'].'" data-id="'.$row['id'].'" data-tax="'.$row_data['tax_id_c'].'" >'.$account_name.'</li>';
        }        
    }
    
    /**
     * Retrieve the Locations data
     * This function is used for returning html li tag, which contains all the data to auto fill using autocomplete js
     */
    function action_loadLocations(){ 
        $type = $_GET['type'];
        $this->view = false;
        $keyword = '"%'.$GLOBALS["db"]->quote($_POST['keyword']).'%"';
        $sql = "SELECT id, name FROM fp_event_locations where deleted = 0 and name LIKE $keyword order by name"; 
        $result = $GLOBALS["db"]->query($sql);
        while ( $row = $GLOBALS["db"]->fetchByAssoc($result) ) {
            $location_id = $row['id'];
            $oLocation = BeanFactory::getBean('FP_Event_Locations', $location_id);   
            $row_data = $oLocation->fetched_row;             
            $location_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $row['name']);
            echo '<li data-type="'.$type.'" data-name="'.$row['name'].'" data-id="'.$row['id'].'" '
                . ' data-street_address="'.$row_data['address'].'" data-city="'.$row_data['address_city'].'" '
                . ' data-zip_code="'.$row_data['address_postalcode'].'" data-state="'.$row_data['address_state'].'" >'.$location_name.'</li>';
        }        
    }
    
    /* For Testing
    function action_hello(){    
        $this->view = 'helloActionView';
    } */
}