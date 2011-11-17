<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelBase
 *
 * @author Erick
 */
abstract class ModelBase {
    var $db;
    
    function __construct() {
        GLOBAL $DB;
        $this->db = $DB;
    }
}

?>
