<?php 
namespace config;

class autoload {
        
    public static function Start() {
        spl_autoload_register(function($classPath)
        {
            $class = ROOT .'/'. str_replace("\\", "/", $classPath) . ".php";
            
            include_once($class);
        });
    }
}

?>