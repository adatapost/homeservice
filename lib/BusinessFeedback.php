<?php
class BusinessFeedback {
    public $feedId,
           $fromUserId,
           $toUserId,
           $feedType,
           $feedDesc,
           $feedDate,
           $feedAction,
           $publish;

    public function addBusinessFeedback() {
        $d = new Db();
        return $d->nonQuery("insert into business_feedback 
        (from_user_id, to_user_id, feed_type,feed_desc,feed_date,feed_action,publish) 
        values (?,?,?,?,?,?,?)",function($st) {
        $st->bind_param("iissssi",$this->fromUserId,$this->toUserId, $this->feedTye, 
        $this->feedDesc, $this->feedDate,$this->publish);
        });  
    }
    public function updateBusinessFeedback() {
        $d = new Db();
        return $d->nonQuery("update business_feedback set
        feed_type=?,feed_desc=?,feed_action=?,publish=? where feed_id=?",function($st) {
        $st->bind_param("sss11", $this->feedTye, 
        $this->feedDesc, $this->feedDate,$this->publish,$this->feedId);
        });  
    }
    public function deleteBusinessFeedback() {
        $d = new Db();
        return $d->nonQuery("delete from  business_feedback where feed_id=?",function($st) {
        $st->bind_param("i",$this->feedId);
        });  
    }

     public function allTo($toUserId) {
        $sql = "select * from business_feedback where to_user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$toUserId);
            
        });
      }
      public function allFrom($fromUserId) {
        $sql = "select * from business_feedback where from_user_id=?";
        $db = new Db();
        return $db->queryAll($sql,function($st) {
            $st->bind_param("i",$fromUserId);
            
        });
      }

      public function all() {
        $sql = "select * from business_feedback order by feed_id desc";
        $db = new Db();
        return $db->queryAll($sql,function($st) { });
      }
   
}