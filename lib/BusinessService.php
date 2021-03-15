<?php
class BusinessService
{
  public 
  $serviceId,
  $userId,
  $serviceTitle,
  $serviceDesc,
  $businessPhoto,
  $available;
  
  public function addBusinessService() {
    $d = new Db();
    return $d->nonQuery("insert into business_service 
    (user_id, service_title, service_desc,business_photo,avilable) 
    values (?,?,?,?,?)",function($st) {
      $st->bind_param("isssi",$this->userId,$this->serviceTitle, $this->serviceDesc, 
      $this->businessPhoto,$this->available);
    });
  }

  public function updateBusinessService() {
    $d = new Db();
    return $d->nonQuery("update business_service 
    set user_id=?, service_title=?, service_desc=?,business_photo=?,avilable = ? where service_id=?",function($st) {
      $st->bind_param("isssii",$this->userId,$this->serviceTitle, $this->serviceDesc, 
      $this->businessPhoto,$this->available,$this->serviceId);
    });
  }

  public function deleteBusinessService() {
    $d = new Db();
    return $d->nonQuery("delete from business_service 
     where service_id=?",function($st) {
      $st->bind_param("i",$this->serviceId);
    });
  }
      public function all() {
        $sql = "select * from business_service where user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$this->userId);
            
        });
      }
      public function getService() {
        $sql = "select * from business_service where service_id=?";
        $db = new Db();
        $rows = $db->queryAll($sql,function($st) {
            $st->bind_param("i",$this->serviceId);
            
        });
        if(!empty($rows))
            return $rows[0];
      }


  
}