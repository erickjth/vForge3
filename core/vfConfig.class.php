<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vfConfig
 *
 * @author erick
 */
class vfConfig {
    
    static function get_config($index){
        GLOBAL $config;
        
        $vars = array(
            "path_default_layout"=>MOD_PATH.DS."layout",
            "path_base_modules"=>MOD_PATH.DS."base",
            "path_core"=>ROOT.DS."core",
            "path_base_url"=>BASE_URL,
            "path_assets"=>ROOT.DS."assets",
            "path_assets_js"=>BASE_URL.DS."assets".DS."js",
            "path_assets_css"=>BASE_URL.DS."assets".DS."css",
            "path_assets_image"=>BASE_URL.DS."assets".DS."image",
        );
        
        if( isset ($vars[$index]) ){
            return $vars[$index];
        }else{
            return null;
        }
        
    }
    
}

?>
