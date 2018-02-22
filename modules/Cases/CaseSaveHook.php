<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class CaseSaveHook
{
    var $module = 'Cases';
    private $slug_size = 65530;
    
    /**
     * @param aCase $case
     */
    public function saveCase($bean, $event, $arguments)
    {
        $text = $bean->description;
        if (!$text) {
            return;
        }
        $bean->description = '';
        if (strlen($text) > $this->slug_size) {
            $bean->description = substr($text, 0, $this->slug_size) . '...';
        }else{
            $bean->description = $text;
        }                
    }
}
