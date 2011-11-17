<?php

/*** Include Base Template Class ***/
include ROOT . DS . "core" . DS ."BaseSetup.class.php";
/*** Include Base Template Class ***/
include ROOT . DS . "core" . DS ."Assets.class.php";
/*** Include Base Template Class ***/
include ROOT . DS . "core" . DS ."ModelBase.class.php";
/*** Include Base Controller Class ***/
include ROOT . DS . "core" . DS ."ControllerBase.class.php";
/*** Include Base Template Class ***/
include ROOT . DS . "core" . DS ."Template.class.php";
/*** Include Base Router Class ***/
include ROOT . DS . "core" . DS ."Router.class.php";
/*** Include Base Config Class ***/
include ROOT . DS . "core" . DS ."vfConfig.class.php";

include ROOT . DS . "core" . DS ."setup.php";

include ROOT . DS . "core" . DS ."setup_modules.php";

$router = new Router();
$router->displasher();
 
?>
