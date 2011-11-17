<?php

$exclude_path = array( "base","layout" );

if ($handle = opendir(MOD_PATH)) { // if the folder exploration is sucsessful, continue
            while (false !== ($file = readdir($handle))) { // as long as storing the next file to $file is successful, continue
                if ($file != '.' && $file != '..' && !in_array($file, $exclude_path)) {
                    $path = MOD_PATH.DS.$file;
                    if (is_dir($path) ) {
                        if(is_file( $path.DS."settings.php"  ) ){
                            
                            include_once $path.DS."settings.php";
                            $setting_class= $file."_setup";
                            $module_setting = new $setting_class();
                            
                        }

                    }
                }
            }
            closedir($handle);
        }


?>
