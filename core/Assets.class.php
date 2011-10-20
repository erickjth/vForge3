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
                foreach( $assets_ini["js"] as $js){
                    echo "<script type='text/javascript' src='".vfConfig::get_config("path_assets_js").DS.$js."'></script>";
                }
            }
        } 
    }
    
    static function print_css(){
        GLOBAL $assets_ini;
        if( $assets_ini ){
            //print js files
            if( count( $assets_ini["css"] ) ){
                foreach( $assets_ini["css"] as $css){
                    echo "<link rel='stylesheet' type='text/css' media='screen' href='".vfConfig::get_config("path_assets_css").DS.$css."' />";
                }
            }
        }
    }
}

?>
