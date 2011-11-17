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
    var $_model; 
    
    function __construct($name) {
        GLOBAL $USER;
        $this->_ModuleName = $name;
        $this->user_session = $USER;
        
       //if is not installed
       
    }
    
    function load_model($model=null){
        if( !$model ){
            $model = $this->_ModuleName;
        }
        
        include_once MOD_PATH.DS.$model.DS."model".DS.$model."Model.php";
        $modelName = $model."_model";
        $this->_model = new $modelName();
    }

    protected function load_template($tname) {
        
        $module = "";
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
    
    function view($name,$with_template=true){
        $this->load_template($name);
        $this->_template->with_template = $with_template;
        
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
