<?php

/*** Include Base Controller Class ***/
include ROOT . DS . "core" . DS ."ControllerBase.class.php";
/*** Include Base Controller Class ***/
include ROOT . DS . "core" . DS ."Template.class.php";
/*** Include Base Router Class ***/
include ROOT . DS . "core" . DS ."Router.class.php";
/*** Include Base Config Class ***/
include ROOT . DS . "core" . DS ."vfConfig.class.php";

include ROOT . DS . "core" . DS ."setup.php";

$router = new Router();
$router->displasher();
 
?>
