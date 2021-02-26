<?php
class Db 
{
   public $server = "localhost";
   public $port='3308';
   public $user="root";
   public $pass="";
   public $database="home_db";

   public function getCn() {
     return new mysqli($this->server, $this->user, $this->pass, $this->database, $this->port);
   }
   public function queryAll($sql,$varFunc = null) {
       $mcn = $this->getCn();
       $st = $mcn->prepare($sql);
       if($varFunc)
         $varFunc($st);
       $st->execute();
       $result = $st->get_result();
       return $result->fetch_all( MYSQLI_ASSOC);
   }
   public function raw($sql,$varFunc) {
       $mcn = $this->getCn();
       $st = $mcn->prepare($sql);
       $varFunc($st);
   }
   public function nonQuery($sql,$varFunc) {
      $mcn = $this->getCn();
      $st = $mcn->prepare($sql);
      $varFunc($st);
      return $st->execute();
   }
}
