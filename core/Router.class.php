<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author erick
 */
class Router {

    var $path;
    var $router_file;
    var $controller;
    var $action;
    var $arg;

    function setPath($path=MOD_PATH) {
        if (! is_dir($path)) {
            exit('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }
    
    /*****************
     * Function Displacher: Run actions in class controller.
     *
     * ****************/

    function displasher(){
        $this->hook();
        
        if (!is_readable($this->router_file))
	{
		$this->router_file = MOD_PATH.DS.'base'.DS.'/error404.php';
                $this->controller = 'error404';
	}
        
        /*** include the controller ***/
	include $this->router_file;
        /*** a new controller class instance ***/
	$class = $this->controller . 'Controller';
	$controller = new $class();
        /*** check if the action is callable ***/
	if (is_callable(array($controller, $this->action)) == false)
	{
		$action = 'index';
	}
	else
	{
		$action = $this->action;
	}
	/*** run the action ***/
	$controller->$action();
        
    }
    
    function hook(){
        
        $route = (empty($_GET['m'])) ? '' : $_GET['m'];
        if (empty($route)){$route = 'index';}
	else{
		$parts = explode('/', $route);
		$this->controller = $parts[0];
		if(isset( $parts[1]))
		{
			$this->action = $parts[1];
		}
	}
        if (empty($this->controller))
		$this->controller = 'index';

	/*** Get action ***/
	if (empty($this->action))
		$this->action = 'index';

	/*** set the file path ***/

        if(is_file(MOD_PATH.DS.'base'.DS."controller".DS.$this->controller.'Controller.php') ){
            $this->router_file = MOD_PATH.DS.'base'.DS."controller".DS.$this->controller.'Controller.php';
        }else{
            
            
            if( is_file(MOD_PATH.DS.$this->controller.DS.'controller'.DS.$this->controller.'Controller.php') ){
                $this->router_file = MOD_PATH.DS.$this->controller.DS.'controller'.DS.$this->controller.'Controller.php';
            }else{
                header("HTTP/1.0 404 Not Found");
                exit("ERROR: Controller '{$this->controller}' not found!! ");
            }
        }
        
    }

    
}

?>
