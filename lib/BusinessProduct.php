<?php
class BusinessProduct
{
  public 
  $productId,
  $userId,
  $productTitle,
  $productDesc,
  $productPhoto,
  $available;
  
  public function addProduct() {
    $d = new Db();
    return $d->nonQuery("insert into business_product 
    (user_id, product_title, product_desc,product_photo,avilable) 
    values (?,?,?,?,?)",function($st) {
      $st->bind_param("isssi",$this->userId,$this->productTitle, $this->productDesc, 
      $this->productPhoto,$this->available);
    });
  }
   public function updateProduct() {
    $d = new Db();
    return $d->nonQuery("update business_product set user_id=?, product_title=?, product_desc=?,product_photo=?,
    avilable=? where product_id=?",function($st) {
      $st->bind_param("isssi",$this->userId,$this->productTitle, $this->productDesc, 
      $this->productPhoto,$this->available,$this->productId);
    });
  }
  public function deleteProduct() {
    $d = new Db();
    return $d->nonQuery("delete from  business_product  where product_id=?",function($st) {
      $st->bind_param("i",$this->productId);
    });
  }
      public function all() {
        $sql = "select * from business_product where user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$this->userId);
            
        });
      }
      public function getProduct() {
        $sql = "select * from business_product where product_id=?";
        $db = new Db();
        $rows = $db->queryAll($sql,function($st) {
            $st->bind_param("i",$this->productId);
        });
        if(!empty($rows))
            return $rows[0];
      }
}