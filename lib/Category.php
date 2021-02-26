<?php
class Category
{
  public 
  $categoryId,
  $categoryName;
  
  /*:--------------- Category ----------------------:*/

  public function addCategory() {
    $d = new Db();
    return $d->nonQuery("insert into category (category_name) values (?)",function($st) {
      $st->bind_param("s",$this->categoryName);
    });
  }
  public function deleteCategory() {
    $d = new Db();
    return $d->nonQuery("delete from category where category_id=?",function($st) {
      $st->bind_param("i",$this->categoryId);
    });
  }
  public function updateCategory() {
    $d = new Db();
    return $d->nonQuery("update category set category_name=? where category_id=?",function($st) {
      $st->bind_param("si",$this->categoryName, $this->categoryId);
    });
  }
  public function getCategory() {
    $d = new Db();
    $rows = $d->queryAll("select * from category where category_id=?", function($st) {
      $st->bind_param("i",$this->categoryId);
    });
    if(!empty($rows))
     return $rows[0];
  }
  public function getCategories() {
    $d = new Db();
    return $d->queryAll("select * from category",function($param) { });
  }
}