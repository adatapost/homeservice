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

  function getCountryList($countryId=0) {
    $d = new City();
    $rows = $d->getCountries();
    foreach($rows as $r) {
      if($countryId == $r["country_id"]) {
        echo "<option selected value='$r[country_id]'>$r[country_name]</option>";
      } else {
        echo "<option value='$r[country_id]'>$r[country_name]</option>";
      }

    }
  }

  function getStateList($countryId=0,$stateId=0) {
    $d = new City();
    $d->countryId = $countryId;
    $rows = $d->getStates();
    foreach($rows as $r) {
      if($stateId == $r["state_id"]) {
        echo "<option selected value='$r[state_id]'>$r[state_name]</option>";
      } else {
        echo "<option value='$r[state_id]'>$r[state_name]</option>";
      }
      
    }
  }

  function getCityList($stateId=0,$cityId) {
    $d = new City();
    $d->stateId = $stateId;
    $d->cityId = $cityId;
    $rows = $d->getCities();
    foreach($rows as $r) {
      if($cityId == $r["city_id"]) {
        echo "<option selected value='$r[city_id]'>$r[city_name]</option>";
      } else {
        echo "<option value='$r[city_id]'>$r[city_name]</option>";
      }
      
    }
  }

  function getCategoryList($categoryId=0) {
    $d = new Category();
    $rows = $d->getCategories();
    foreach($rows as $r) {
      if($countryId == $r["category_id"]) {
        echo "<option selected value='$r[category_id]'>$r[category_name]</option>";
      } else {
        echo "<option value='$r[category_id]'>$r[category_name]</option>";
      }
      
    }
  }


  
  function cn() {
    return new mysqli("localhost","root","","home_db",3308);
  }

// Autoload PHP classes 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Variables

$cmd = post("cmd");
$message = "";