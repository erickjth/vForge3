<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author Erick
 */

class task_model extends ModelBase{
    
    var $id;
    var $name;
    var $date_start;
    var $date_end;
    var $percent;
    var $priority;
    var $state;
    var $resources;
    var $user_id;
    
    function get_tasks(){
        $tasks = $this->db->get_records("vf_task");
        return $tasks;
    }
    
    function get_tasks_by_parent($pid){
        $tasks = array();
        $sql = sprintf("SELECT p.id,p.priority,p.percent,p.name,p.description,p.courseid,p.parent,p.state,p.user_to,p.user_from,p.date_start,p.date_end,p.created,p.updated,count(c.id) as c_child
                        FROM {vf_task} p
                        LEFT JOIN {vf_task} c ON c.parent = p.id
                        WHERE p.parent = %s
                        GROUP BY p.id", $pid);

        if(!$tasks = $this->db->get_records_sql( $sql )){
            $tasks = array();
        }
        
        return $tasks;
    }
    
}

?>
