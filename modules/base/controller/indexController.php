<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author erick
 */
class indexController extends ControllerBase{
    
    function index(){
        $this->set_name("base");
        $this->erick = "Hello world";
        $this->view("index");
    }
}

?>
