<?php
class City
{
  public 
  $cityId,
  $stateId,
  $countryId,
  $cityName,
  $stateName,
  $countryName;

  /*:--------------- City ------------------------:*/

  public function addCity() {
    $d = new Db();
    return $d->nonQuery("insert into city (city_name,state_id) values (?,?)",function($st) {
      $st->bind_param("si",$this->cityName, $this->stateId);
    });
  }
  public function deleteCity() {
    $d = new Db();
    return $d->nonQuery("delete from city where city_id=?",function($st) {
      $st->bind_param("i",$this->cityId);
    });
  }
  public function updateCity() {
    $d = new Db();
    return $d->nonQuery("update city set city_name=? where city_id=?",function($st) {
      $st->bind_param("si",$this->cityName, $this->cityId);
    });
  }
  public function getCity() {
    $d = new Db();
    $rows = $d->queryAll("select * from city where city_id=?", function($st) {
      $st->bind_param("i",$this->cityId);
    });
    if(!empty($rows))
     return $rows[0];
  }
  public function getCities() {
    $d = new Db();
    return $d->queryAll("select * from city where state_id=?",function($st) {
      $st->bind_param("i",$this->stateId);
    });
  }  
  


  /*:--------------- State ------------------------:*/

  public function addState() {
    $d = new Db();
    return $d->nonQuery("insert into `state` (state_name,country_id) values (?,?)",function($st) {
      $st->bind_param("si",$this->stateName,$this->countryId);
    });
  }
  public function deleteState() {
    $d = new Db();
    return $d->nonQuery("delete from state where state_id=?",function($st) {
      $st->bind_param("i",$this->stateId);
    });
  }
  public function updateState() {
    $d = new Db();
    return $d->nonQuery("update state set state_name=? where state_id=?",function($st) {
      $st->bind_param("si",$this->stateName,$this->stateId);
    });
  }
  public function getState() {
    $d = new Db();
    $rows = $d->queryAll("select * from state where state_id=?", function($st) {
      $st->bind_param("i",$this->stateId);
    });
    if(!empty($rows))
     return $rows[0];
  }
  public function getStates() {
    $d = new Db();
    return $d->queryAll("select * from state where country_id=?",function($st) {
      $st->bind_param("i",$this->countryId);
    });
  }  
  

  /*:--------------- Country ----------------------:*/

  public function addCountry() {
    $d = new Db();
    return $d->nonQuery("insert into country (country_name) values (?)",function($st) {
      $st->bind_param("s",$this->countryName);
    });
  }
  public function deleteCountry() {
    $d = new Db();
    return $d->nonQuery("delete from country where country_id=?",function($st) {
      $st->bind_param("i",$this->countryId);
    });
  }
  public function updateCountry() {
    $d = new Db();
    return $d->nonQuery("update country set country_name=? where country_id=?",function($st) {
      $st->bind_param("si",$this->countryName, $this->countryId);
    });
  }
  public function getCountry() {
    $d = new Db();
    $rows = $d->queryAll("select * from country where country_id=?", function($st) {
      $st->bind_param("i",$this->countryId);
    });
    if(!empty($rows))
     return $rows[0];
  }
  public function getCountries() {
    $d = new Db();
    return $d->queryAll("select * from country",function($param) { });
  }
}