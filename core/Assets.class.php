<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assest
 *
 * @author erick
 */
class Assets {

    static function print_js(){
        GLOBAL $assets_ini;
        if( $assets_ini ){
            //print js files
            if( count( $assets_ini["js"] ) ){
                header("Content-type: application/javascript");
                foreach( $assets_ini["js"] as $js){
                    echo "<script type='text/javascript' src='".vfConfig::get_config("path_assets_js")."/".$js."'></script>";
                }
                Header("content-type: text/html");
            }
        } 
    }
    
    static function print_css(){
        GLOBAL $assets_ini;
        if( $assets_ini ){
            //print js files
            if( count( $assets_ini["css"] ) ){
                foreach( $assets_ini["css"] as $css){
                    echo "<link rel='stylesheet' type='text/css' media='screen' href='".vfConfig::get_config("path_assets_css")."/".$css."' />";
                }
            }
        }
    }

    static function print_external(){
        GLOBAL $assets_ini;
        
        if( $assets_ini ){
            //print js files
            if( count( $assets_ini["modules"] ) ){
                foreach( $assets_ini["modules"] as $module=>$asset){
                    $path = vfConfig::get_config("path_url_modules")."/".$module."/assets";
                    if( isset($asset["css"]) ){
                        foreach( $asset["css"] as $css){
                            echo "<link rel='stylesheet' type='text/css' media='screen' href='".$path."/css/".$css."' />";
                        }
                    }
                    if( isset($asset["js"]) ){
                        header("Content-type: application/x-js");
                        foreach( $asset["js"] as $js){
                            echo "<script type='text/javascript' src='".$path."/js/".$js."'></script>";
                        }
                        Header("content-type: text/html");
                    } 
                }
            }
        }
    }
    
    static function js_tag($module,$js,$vars=array()){
        if( $module ){
            if( count($vars) ){
                echo "<script type='text/javascript'>";
                foreach($vars as $key=>$val){
                    echo "var $key = '$val';";
                }
                echo "</script>";
            }
            $path = vfConfig::get_config("path_url_modules")."/".$module."/assets";
            echo "<script type='text/javascript' src='".$path."/js/".$js."'></script>";
        }
    }
}

?>
