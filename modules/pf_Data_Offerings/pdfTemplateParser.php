<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('modules/AOS_PDF_Templates/templateParser.php');

class pdfTemplateParser extends templateParser{
    /************* Custom logic for removing empty blocks **********/
    static function checkEmpty($converted, $bean){
        $doc = new DOMDocument;
        $doc->loadHTML($converted);
        //$xpath = new DOMXPath($doc);
        foreach ($bean->field_defs as $field_def) {
            if (isset($field_def['name']) && $field_def['name'] != '') {
                $fieldName = $field_def['name'];
                if(empty($bean->$fieldName)){
                    $headerElement = $doc->getElementById('sugar_text_'.$fieldName);    
                    //$headerElement = $xpath->query("//div[@id='sugar_text_'.$fieldName]");
                    if(!empty($headerElement)){
                        $headerElement->parentNode->removeChild($headerElement);
                    }
                }
            }
        }                
        $amendedHtml = $doc->saveHTML();
        return $amendedHtml;
    }
}