<?php
  function post($key) { return empty($_POST[$key]) ? "" : $_POST[$key];  }
  function get($key) { return empty($_GET[$key]) ? "" : $_GET[$key];  }
  function cookie($key) { return empty($_COOKIE[$key]) ? "" : $_COOKIE[$key];  }
  function session($key) { return empty($_SESSION[$key]) ? "" : $_SESSION[$key];  }
  function delSession($key) { if(session($key)) unset($_SESSION[$key]);  }
  function createCookie($key,$value,$time_sec=null) { 
     if($time_sec)
       setcookie($key,$value,$time_sec);
     else
       setcookie($key,$value);
  }
  function delCookie($key) { 
     setcookie($key,$value,time()-1);
  }
  function glb($key) { return empty($GLOBALS[$key]) ? "" : $GLOBALS[$key];  }
  
  function cn() {
    return new mysqli("localhost","root","","home_db",3308);
  }

// Autoload PHP classes

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});