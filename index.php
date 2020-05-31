<?php

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    require "config/autoload.php";
    require "config/config.php";
   
    use config\autoload as autoload;
    use config\router as router;
    use config\request as request;

    autoload::Start();

    session_start();
    $_SESSION['error']=null;
    
    router::route(new request());

    

?>