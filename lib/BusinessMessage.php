<?php
class BusinessMessage {
    public $messageId,
           $fromUserId,
           $toUserId,
           $messageTitle,
           $messageDesc,
           $messageDate;

    public function addMessage() {
        $d = new Db();
        return $d->nonQuery("insert into business_message 
        (from_user_id, to_user_id, message_title, message_desc,message_date) 
        values (?,?,?,?,?)",function($st) {
        $st->bind_param("isssi",$this->fromUserId,$this->toUserId, $this->messageTitle, 
        $this->messageDesc, $this->messageDate);
        });        
    }
     public function delMessage() {
        $d = new Db();
        return $d->nonQuery("delete from  business_message 
        where message_id=?",function($st) {
        $st->bind_param("i",$this->messageId);
        });        
    }

    public function allTo($toUserId) {
        $sql = "select * from business_message where to_user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$toUserId);
            
        });
      }
      public function allFrom($fromUserId) {
        $sql = "select * from business_message where from_user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$fromUserId);
            
        });
      }

}