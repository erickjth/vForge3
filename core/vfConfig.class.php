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
            "path_modules"=>MOD_PATH,
            "path_default_layout"=>MOD_PATH.DS."layout",
            "path_base_modules"=>MOD_PATH.DS."base",
            "path_core"=>ROOT.DS."core",
            "path_base_url"=>BASE_URL,
            "path_assets"=>ROOT.DS."assets",
            "path_assets_js"=>BASE_URL."/assets/js",
            "path_assets_css"=>BASE_URL."/assets/css",
            "path_assets_image"=>BASE_URL."/assets/image",
            "path_url_modules"=>BASE_URL."/modules",
        );
        
        if( isset ($vars[$index]) ){
            return $vars[$index];
        }else{
            return null;
        }
        
    }
    
}

?>
