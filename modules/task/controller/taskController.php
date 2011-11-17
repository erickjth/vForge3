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
        $this->load_model();
    }
   
    function index(){     
        GLOBAL $DB;
        $this->view("index");
    }
    
    function get_tasks(){
        $return = array();
        
        $pid = (isset($_REQUEST["node"]) && is_numeric($_REQUEST["node"]) && $_REQUEST["node"] != "NaN" )?$_REQUEST["node"]:0;
        
        $tasks = $this->_model->get_tasks_by_parent($pid);

        if($tasks){
            $return["text"]=".";
            $return["leaf"]=false;
            $return["children"]=array();
            foreach($tasks as $task){
                if($task->c_child){
                    $task->iconCls = 'task-folder';
                    $task->leaf = false;
                }else{
                    $task->iconCls = 'task-ele';
                    $task->leaf = true;
                }
                
                if( $task->date_end == 0 || $task->date_end == "null" ){
                    $task->date_end = "";
                }else{
                     $task->date_end = date("d/m/Y",$task->date_end);
                }
                
                $task->date_start = date("d/m/Y",$task->date_start);
               
                $return["children"][]=$task;
                
            }
            
        }
        
        header('Content-type: application/json');
        echo json_encode($return);
        exit();
    }
    
    function add() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            GLOBAL $DB,$USER;
            
            $vfTask = $_POST["task"];
            $vfTask["courseid"] = 1;
            $vfTask["user_from"] = $USER->id;
            $vfTask["created"] = time();
            $vfTask["leaf"]=true;
            
            $return = array("success"=>false);
            if( $vfTask["id"] = $DB->insert_record("vf_task", $vfTask,true) ){
                $return["success"]=true;
                $return["task"]=$vfTask;
            }
            
            header('Content-type: application/json');
            echo json_encode(  $return );
            exit;
            
        } else {
            if( !isset($_GET["pid"]) )
                $this->pid = 0;
            else
                $this->pid = $_GET["pid"];
            
            $this->view("add", false);
        }
    }
    
    function update(){

        $this->name = "Erick Jose";
        
        $this->view("update");
        
    }
    
}

?>
