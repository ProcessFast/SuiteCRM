<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class ViewHelloActionView extends ViewDetail {


	function ViewHelloActionView(){
		parent::ViewDetail();
	}
	
	function display() {
		echo "hello";
	}

}

?>