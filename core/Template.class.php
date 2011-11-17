<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author erick
 */
class Template {
    
    var $_vars;
    var $file_template;
    var $with_template;
    
    function __construct($name,$module="base") {
        
        $name = strtolower($name);
        
        //if the view file in module or base
        if( is_file(MOD_PATH.DS.$module.DS.'view'.DS.$name.".php") ){
            $this->file_template = MOD_PATH.DS.$module.DS.'view'.DS.$name.".php";
        }else{
            die("ERROR: Template '{$name}' not found in '{$module}'");
        }

    }
    
    function render(){
        if (!is_readable($this->file_template))
                die("ERROR: Template '{$name}' is forbidden in '{$module}'");
       
       extract($this->_vars);   
       
       if( $this->with_template) include_once vfConfig::get_config("path_default_layout").DS."header.php";
       include_once $this->file_template;
       if( $this->with_template)include_once vfConfig::get_config("path_default_layout").DS."footer.php";
       
    }
    
    
    function __set($name, $value) {
        $this->_vars[$name] = $value;
    }
}

?>
