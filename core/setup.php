<?php

if(is_file(ROOT.DS."config".DS."config.ini") ){
    
    $config = parse_ini_file(ROOT.DS."config".DS."config.ini");
    
    if( $config["with_moodle"] ){
        
        if( isset ($config["path_moodle_config_file"])){
            include_once $config["path_moodle_config_file"]."config.php";
            
            if( $config["with_moodle_session"]  ){
                require_login();
            }
            
        }else{
            exit("ERROR: Moodle config file not found!!!");
        }
        
    }else{
        exit("Using own database, but this one is not support yet.");
    }
    
    if( isset ( $config["path_url"] ) && $config["path_url"] ){
        define("BASE_URL",$config["path_url"]);
    }
}else{
    die("ERROR: Config file not found!!!.");
}


if( is_file(ROOT.DS."config".DS."assets.ini" ) ){ 
    $assets_ini = parse_ini_file(ROOT.DS."config".DS."assets.ini");
}else{
    $assets_ini = null;
}

?>