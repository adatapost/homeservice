<?php
class UserAccount
{
	public $userId,$userEmail, $userPass,$userMobile,
$roleId,$created,$acStatus,$cityId,$userAddress1, $userAddress2,
$userFullName, $userPhoto,$stateId,$countryId,$cityName,$stateName,
$countryName, $roleName;


    public function createUser() {
        $db = new Db();
        if($this->findUser()) { // stop if exists
            return false;
        }
        // create a/c
        $sql="insert into user_account (user_email, user_pass, user_mobile, role_id,created,ac_status) values (?,?,?,?,?,?)";
        return $db->nonQuery($sql,function($st) { 
            $st->bind_param("sssisi",$this->userEmail, $this->userPass, $this->userMobile, $this->roleId, $this->created,$this->acStatus);
        });
    }
    public function deleteUser() {
        $db = new Db();
        $sql="delete from user_account where user_id=?";
        return $db->nonQuery($sql,function($st) { 
            $st->bind_param("i",$this->userId);
        });
    }
    public function findUser() {  // find by email or userid or mobile
        $sql = "select * from user_account where user_id=? or user_email=? or user_mobile=?";
        $db = new Db();
        $rows=$db->queryAll($sql,function($st) {
            $st->bind_param("iss",$this->userId, $this->userEmail, $this->userMobile);
        });
        if(!empty($rows)) {
            $r = $rows[0];
            $this->userId = $r["user_id"] ;
            $this->userEmail = $r["user_email"];
            $this->userPass = $r["user_pass"];
            $this->userMobile = $r["user_mobile"];
            $this->userRole = $r["user_role"];
            $this->created = $r["created"];
            $this->acStatus = $r["ac_status"];
        }
        return !empty($rows);
    }
    public function changePassword($newPass) {
        $db = new Db();
        if(!$this->findUser()) { // stop if not exists
            return false;
        }
        // update
        $sql="update user_account set user_pass = ? where user_id=?";
        return $db->nonQuery($sql,function($st) { 
            $st->bind_param("si",$newPass,$this->userId);
        });

    }
    
    public function recoverPassword() {  // Forgot password
        $db = new Db();
        if(!$this->findUser()) { // stop if not exists
            return false;
        }
        // Send password: email 
        // Send("Your password is " . $u->userPass);
        return true;

    }
    public function allUsers($roleId) {
        $sql = "select * from user_account where role_id<>?";
        $db = new Db();
        $rows=$db->queryAll($sql,function($st) {
            $st->bind_param("i",$roleId);
        });
    }
    public function login($userPass) {
        $db = new Db();
        if(!$this->findUser()) { // stop if not exists
            return false;
        }
       return $u->userPass == $userPass; 
    }

    public function createProfile() {

    }
    public function changePhoto() {

    }
    public function changeProfile() {

    }
}