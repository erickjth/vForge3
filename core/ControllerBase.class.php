<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerBase
 *
 * @author erick
 */
abstract class ControllerBase {

    var $_template;
    var $_ModuleName;
    var $_vars;
    var $user_session;
    
    
    function __construct($name) {
        GLOBAL $USER;
        $this->_ModuleName = $name;
        $this->user_session = $USER;
    }
    
    protected function load_template($tname) {
        $module;
        if( isset($this->_ModuleName) ){
            $module = $this->_ModuleName;
        }else{
            $module = "base";
        }
        
        $this->_template = new Template($tname,$module);
        
    }

    public function set_name($name){
        $this->_ModuleName = $name;
    }
    
    function render_template(){
        $this->_template->render();
    }
    
    function view($name){
        $this->load_template($name);
        if (count($this->_vars)) {
            foreach ($this->_vars as $k => $v) {
                $this->_template->$k = $v;
            }
        }
        $this->render_template();
    }
    
    public function __set($index, $value) {
        if( $this->_template instanceof Template){
            $this->_template->$index = $value;
        }else{
            $this->_vars[$index] = $value;
        }
    }
    
    abstract function index();

}

?>
