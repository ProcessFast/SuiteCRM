/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    console.log("ready!");
    $("#client_info").parent().parent().hide();
    $("#pf_data_offerings_fp_event_locations_name").parent().parent().hide();
    $("#service_providers").parent().parent().hide();    
    $("#service_site_contact").parent().parent().hide();
    $("#billing_contact_info").parent().parent().hide();
    $("#have_data_services").parents(".panel-content").addClass('data-offering-module');
    $("#have_data_services").parents(".edit-view-row-item").addClass('large-label').addClass('full-label');
    $("#current_service_provider").parents(".edit-view-row-item").addClass('large-label').addClass('w30-label');
    
    $("#auto_client_info").parents(".edit-view-row-item").addClass('hidden');
    $("#order_status").parents(".panel-default").addClass('hidden');
    $("#pf_data_offerings_pf_orders_name").parents(".edit-view-row-item").addClass('hidden');
    $("#auto_client_info").val($("#name").val());
    $("#auto_service_provider").parents(".edit-view-row-item").addClass('hidden');
    $("#current_service_provider").parents(".edit-view-row-item").addClass('hidden');
    $("#service_provider_account").parents(".edit-view-row-item").addClass('hidden');
    $("#dataoffering_supplier").parents(".edit-view-row-item").addClass('hidden');
    $("#auto_dataoffering_supplier").val($("#dataoffering_supplier").val());
        
    //$("#cable_speed").parents(".edit-view-row-item").addClass('hidden');
    $("#number_of_static_ip").parents(".edit-view-row-item").addClass('hidden');
    
    if ($('input:radio[name="have_data_services"]').is(':checked') && $('input:radio[name="have_data_services"]:checked').val() == '1') {
        $("#auto_service_provider").parents(".edit-view-row-item").removeClass('hidden');
        $("#current_service_provider").parents(".edit-view-row-item").removeClass('hidden');
        $("#service_provider_account").parents(".edit-view-row-item").removeClass('hidden');
    }
    $("body").on("change", 'input:radio[name="have_data_services"]', 
        function(){
            if ($(this).is(':checked') && $(this).val() == '1') {
                $("#auto_service_provider").parents(".edit-view-row-item").removeClass('hidden');
                $("#current_service_provider").parents(".edit-view-row-item").removeClass('hidden');
                $("#service_provider_account").parents(".edit-view-row-item").removeClass('hidden');
            }else{
                $("#auto_service_provider").parents(".edit-view-row-item").addClass('hidden');
                $("#current_service_provider").parents(".edit-view-row-item").addClass('hidden');
                $("#service_provider_account").parents(".edit-view-row-item").addClass('hidden');
            }
        }
    );
    
    /*if($("#desired_services").val()=='cable'){
        $("#cable_speed").parents(".edit-view-row-item").removeClass('hidden');
    }
    $("body").on("change", "#desired_services", function (e) {
        if($(this).val()=='cable'){
            $("#cable_speed").parents(".edit-view-row-item").removeClass('hidden');
        }else{
            $("#cable_speed").parents(".edit-view-row-item").addClass('hidden');
        }
    });*/    
    
    if ($('input:radio[name="static_ip_needed"]').is(':checked') && $('input:radio[name="static_ip_needed"]:checked').val() == '1') {
        $("#number_of_static_ip").parents(".edit-view-row-item").removeClass('hidden');
    }
    $("body").on("change", 'input:radio[name="static_ip_needed"]', 
        function(){
            if ($(this).is(':checked') && $(this).val() == '1') {
                $("#number_of_static_ip").parents(".edit-view-row-item").removeClass('hidden');
            }else{
                $("#number_of_static_ip").parents(".edit-view-row-item").addClass('hidden');
            }
        }
    );  
    
    if($("#pf_data_offerings_pf_orderspf_orders_idb").val() != '' ){
        $("#order_status").parents(".panel-default").removeClass('hidden');
    }
                
    $("#name,#auto_location,#auto_service_provider,#auto_service_contact,#auto_billing_contact_info,#auto_dataoffering_supplier").parent().addClass('input_container');
    $(".input_container").append('<ul class="auto_list"></ul>');
    $(".input_container input").attr('autocomplete','off');
    $("body").on("keyup", ".input_container input", function (e) {
        auto_complete($(this));
    });
    
    $("body").on("click", ".auto_list li", function (e) {
        type = $(this).data('type');        
        if(type=='service_contact'){
            set_service_contact_item($(this));
        }else if(type=='billing_contact_info'){
            set_billing_contact_item($(this));
        }else if(type=='client_info'){
            set_client_info_item($(this));
        }else if(type=='location'){
            set_location_item($(this));
        }else if(type=='service_provider'){
            set_service_provider_item($(this));
        }else if(type=='dataoffering_supplier'){
            set_dataoffering_supplier_item($(this));
        }                
    });
});

// auto_complete : this function will be executed every time we change the text
function auto_complete(obj) {
    obj.parent().find('.auto_list').html('');
    id = obj.attr('id');
    if(id=="name"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadAccounts&type=client_info";
    }else if(id=="auto_location"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadLocations&type=location";
    }else if(id=="auto_service_provider"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadAccounts&type=service_provider";
    }else if(id=="auto_service_contact"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadContacts&type=service_contact";
    }else if(id=="auto_billing_contact_info"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadContacts&type=billing_contact_info";
    }else if(id=="auto_dataoffering_supplier"){
        ajax_url = "index.php?module=pf_Data_Offerings&action=loadAccounts&type=dataoffering_supplier";
    }
    var min_length = 2; // min caracters to display the autocomplete
    var keyword = obj.val();
    if (keyword.length >= min_length) {
        $.ajax({
                url: ajax_url,
                type: 'POST',
                data: {keyword:keyword},
                success:function(data){
                    obj.parent().find('.auto_list').show();
                    obj.parent().find('.auto_list').html(data);
                }
        });
    } else {
        obj.parent().find('.auto_list').hide();
    }
}

function set_service_contact_item(item) {
    name = item.data('name');
    id = item.data('id');
    first_name = item.data('first_name');
    last_name = item.data('last_name');
    email = item.data('email');
    phone = item.data('phone');
    $('#service_site_contact').val(name);
    $('#auto_service_contact').val(name);
    $('#contact_id_c').val(id);
    $('#service_first_name').val(first_name);
    $('#service_last_name').val(last_name);
    $('#service_email').val(email);
    $('#service_phone').val(phone);
    item.parent().hide();
}

function set_billing_contact_item(item) {
    name = item.data('name');
    id = item.data('id');
    first_name = item.data('first_name');
    last_name = item.data('last_name');
    email = item.data('email');
    phone = item.data('phone');
    street_address = item.data('street_address');
    city = item.data('city');
    zip_code = item.data('zip_code');
    state = item.data('state');
    
    $('#billing_contact_info').val(name);
    $('#auto_billing_contact_info').val(name);
    $('#contact_id1_c').val(id);
    $('#billing_first_name').val(first_name);
    $('#billing_last_name').val(last_name);
    $('#billing_email').val(email);
    $('#billing_phone').val(phone);
    $('#billing_street_address').val(street_address);
    $('#billing_city').val(city);
    $('#billing_zip_code').val(zip_code);
    $('#billing_state').val(state);
    item.parent().hide();
}
function set_client_info_item(item) {
    name = item.data('name');
    id = item.data('id');
    tax = item.data('tax');
    
    $('#client_info').val(name);
    $('#auto_client_info').val(name);
    $("#name").val(name);
    $('#account_id1_c').val(id);
    $('#tax_id').val(tax);
    item.parent().hide();
}
function set_location_item(item) {
    name = item.data('name');
    id = item.data('id');
    street_address = item.data('street_address');
    city = item.data('city');
    zip_code = item.data('zip_code');
    state = item.data('state');
    
    $('#pf_data_offerings_fp_event_locations_name').val(name);
    $('#auto_location').val(name);
    $('#pf_data_offerings_fp_event_locationsfp_event_locations_ida').val(id);
    $('#service_street_address').val(street_address);
    $('#service_city').val(city);
    $('#service_zip_code').val(zip_code);
    $('#service_state').val(state);
    item.parent().hide();
}
function set_service_provider_item(item) {
    name = item.data('name');
    id = item.data('id');
    
    $('#service_providers').val(name);
    $('#auto_service_provider').val(name);
    $('#current_service_provider').val(name);
    $('#account_id_c').val(id);    
    item.parent().hide();
}
function set_dataoffering_supplier_item(item) {
    name = item.data('name');
    id = item.data('id');
    
    $('#dataoffering_supplier').val(name);
    $('#auto_dataoffering_supplier').val(name);
    $('#account_id2_c').val(id);    
    item.parent().hide();
}

/*function send_back(module, id) {
    alert('M new and overided huhh');
    var associated_row_data = associated_javascript_data[id];
    console.log(associated_row_data);
    SUGAR.util.globalEval("var temp_request_data = " + window.document.forms['popup_query_form'].request_data.value);
    if (temp_request_data.jsonObject) {
        var request_data = temp_request_data.jsonObject;
    } else {
        var request_data = temp_request_data;
    }
    console.log(request_data);
    var passthru_data = Object();
    if (typeof(request_data.passthru_data) != 'undefined') {
        passthru_data = request_data.passthru_data;
    }
    var form_name = request_data.form_name;
    console.log(form_name);
    var field_to_name_array = request_data.field_to_name_array;
    console.log(field_to_name_array);
    SUGAR.util.globalEval("var call_back_function = window.opener." + request_data.call_back_function);
    var array_contents = Array();
    var fill_array_contents = function(the_key, the_name) {
        var the_value = '';
        if (module != '' && id != '') {
            console.log(the_key.toUpperCase());
            if (associated_row_data['DOCUMENT_NAME'] && the_key.toUpperCase() == "NAME") {
                the_value = associated_row_data['DOCUMENT_NAME'];
            } /*else if ((the_key.toUpperCase() == 'USER_NAME' || the_key.toUpperCase() == 'LAST_NAME' || the_key.toUpperCase() == 'FIRST_NAME') && typeof(is_show_fullname) != 'undefined' && is_show_fullname && form_name != 'search_form') {
                the_value = associated_row_data['FULL_NAME'];
            }* / else {
                the_value = associated_row_data[the_key.toUpperCase()];
            }
        }
        if (typeof(the_value) == 'string') {
            the_value = the_value.replace(/\r\n|\n|\r/g, '\\n');
        }
        array_contents.push('"' + the_name + '":"' + the_value + '"');
    }
    for (var the_key in field_to_name_array) {
        if (the_key != 'toJSON') {
            if (YAHOO.lang.isArray(field_to_name_array[the_key])) {
                for (var i = 0; i < field_to_name_array[the_key].length; i++) {
                    fill_array_contents(the_key, field_to_name_array[the_key][i]);
                }
            } else {
                fill_array_contents(the_key, field_to_name_array[the_key]);
            }
        }
    }
    var popupConfirm = confirmDialog(array_contents, form_name);
    console.log(array_contents);
    SUGAR.util.globalEval("var name_to_value_array = {" + array_contents.join(",") + "}");
    closePopup();
    var result_data = {
        "form_name": form_name,
        "name_to_value_array": name_to_value_array,
        "passthru_data": passthru_data,
        "popupConfirm": popupConfirm
    };
    console.log(result_data);
    //return false;
    call_back_function(result_data);
}*/