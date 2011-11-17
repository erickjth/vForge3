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

        //Contruir clase RequestManager para implementar funciones.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            GLOBAL $DB,$USER;
            
            $vfTask = $_POST["task"];
            
            //Implementa validate
            //$this->_model->validate( $vfTask );
            
            $vfTask["date_start"] = ( isset( $vfTask["date_start"] ) )?$this->parserDateToEpoc( $vfTask["date_start"] ):time();
            $vfTask["date_end"] = ( isset( $vfTask["date_end"] ) )?$this->parserDateToEpoc( $vfTask["date_end"] ):null;

            $vfTask["courseid"] = 1;
            $vfTask["user_from"] = $USER->id;
            $vfTask["created"] = time();
            $vfTask["leaf"]=true;
            
            $return = array("success"=>false);
            
            
            if( $vfTask["id"] = $DB->insert_record("vf_task", $vfTask,true) ){
                $vfTask["date_start"] = $this->parserEpocToDate($vfTask["date_start"]);
                $vfTask["date_end"] = ( isset( $vfTask["date_end"] ) )?$this->parserEpocToDate( $vfTask["date_end"] ):null;
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
    
    function edit(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            GLOBAL $DB,$USER;
            
            $vfTask = $_POST["task"];
            //Implementa validate
            //$this->_model->validate( $vfTask );
            $vfTask["date_start"] = ( isset( $vfTask["date_start"] ) )?$this->parserDateToEpoc( $vfTask["date_start"] ):time();
            $vfTask["date_end"] = ( isset( $vfTask["date_end"] ) )?$this->parserDateToEpoc( $vfTask["date_end"] ):null;
            
            $vfTask["user_from"] = $USER->id;
            $vfTask["updated"] = time();
            
            $return = array("success"=>false);
            
            if( $vfTask["id"] = $DB->update_record("vf_task", $vfTask) ){
                $vfTask["date_start"] = $this->parserEpocToDate($vfTask["date_start"]);
                $vfTask["date_end"] = ( isset( $vfTask["date_end"] ) )?$this->parserEpocToDate( $vfTask["date_end"] ):null;
                $return["success"]=true;
                $return["task"]=$vfTask;
            }

            header('Content-type: application/json');
            echo json_encode(  $return );
            exit;
            
        } else {
            if( !isset($_GET["tid"]) )
                die("Error: Seleccione una tarea para editar.");
            else
                $tid = $_GET["tid"];
            
            if (! $task = $this->_model->get_task_by_id($tid) ){
                die("Error: No existe la tarea que intenta editar.");
            }
            
            $task->date_start = $this->parserEpocToDate($task->date_start);
            $task->date_end= ($task->date_end)?$this->parserEpocToDate($task->date_start):"";
            
            $this->task = $task;            
            $this->view("edit", false);
        }
        
    }
    
    private function parserDateToEpoc($date){
        return strtotime($date);
    }
    
    private function parserEpocToDate($date){
        return date("d/m/Y",$date);
    }
    
}

?>
