<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseSetup
 *
 * @author Erick
 */
abstract class BaseSetup {
    
    var $assets;
    var $sql_file;
    var $models;
    var $_module_name;
    var $_version;

    function init(){
        $this->install_module();
    }
    
    function install_module(){
        GLOBAL $DB;
        
        if( !isset( $this->_module_name ) && !$this->_module_name ){
              return;
        }

        $module = $DB->get_record("vf_modules" , array( "name"=>$this->_module_name ) );
        
        if( !$module  ){
            echo "Installing module '".$this->_module_name."', in proccess!....";
            
            $mod = new stdClass();
            $mod->name = $this->_module_name;
            $mod->version = $this->_version;
            $mod->hidden = 0;
            $DB->insert_record("vf_modules",$mod);

            echo "<br>  ->Installing DB..Not implement yet.";
            
            //IS NO INSTALLED PROCESS
            /*$base_module_path = vfConfig::get_config("path_modules").DS.$this->mname.DS;
            if(is_dir( $base_module_path."install" )){
                if(is_file( $base_module_path."install".DS."db.php") ){
                    include_once $base_module_path."install".DS."db.php";
                    if( isset($SQL_CREATE) && count( $SQL_CREATE) ){
                        foreach($SQL_CREATE as $s){
                            $DB->Execute($s);
                        }  
                    }
                }
            }*/
            
            
            
        }else{
            //Check version
            if( $module->version < $this->_version ){
                echo "Module '".$this->_module_name."' need it installed. This functional is no present yet.";
            }
            
            $this->setup_addon();
            
        }
        return;
    }
    
    function setup_addon(){
        GLOBAL $assets_ini;

        $assets_ini["modules"][$this->_module_name] = array();
        
        if( count( $this->assets)  ){
            if( isset($this->assets["js"]) && count( $this->assets["js"] ) ){
                foreach ( $this->assets["js"] as $js ){
                    $assets_ini["modules"][$this->_module_name]["js"][] = $js;
                }
            }
            if( isset($this->assets["css"]) && count( $this->assets["css"] ) ){
                foreach ( $this->assets["css"] as $js ){
                    $assets_ini["modules"][$this->_module_name]["css"][] = $js;
                }
            }
        }
        
    }
    
    
    
}

?>
