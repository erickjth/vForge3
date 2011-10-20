<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of taskController
 *
 * @author erick
 */
class taskController extends ControllerBase{
    
    function __construct() {
        parent::__construct("task");
    }
   
    function index(){
        $this->view("add");
    }
    
    function add(){

        $this->data = array(
            "id"=>1,
            "name"=>"Foo",
            "Foo"=>"Bar"
        );
        
        
        $this->view("add");
    }
    
    function update(){

        $this->name = "Erick Jose";
        
        $this->view("update");
        
    }
    
}

?>
