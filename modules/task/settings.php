<?php

class task_setup extends BaseSetup{

    function __construct() {
        
        $this->_module_name = "task";
        $this->_version = "1.0";
        $this->init();
        parent::init();
    }
    
    function init(){
        $this->assets = array(
            "js"=>array(
                "ext/bootstrap.js",
                "lib.js"
                ),
            "css"=>array("ext/css/ext-all-gray.css")
        );
    }
}

?>
