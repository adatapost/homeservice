<?php 
$title = "Register";
include_once "templates/public/header.php";

$ua = new UserAccount();

$ua->userId = post("user_id");
$ua->userEmail = post("user_email");
$ua->userPass = post("user_pass");
$userPassConfirm = post("user_pass_confirm");
$ua->userMobile = post("user_mobile");
$ua->roleId = post("user_category");
$ua->created = toDay();
$ua->acStatus = 1;
if($cmd == "Register") {
    if($ua->userPass == $userPassConfirm) {
        $ua->userPass = passHash($ua->userPass);
      if($ua->createUser()) {
        $message = "User account created successfully!";
       } else {
        $message = "Sorry! Cannot create user account. Email or phone already taken!";
       }
    } else {
        $message = "Password and confirm password cannot match! Reenter please";
    }
}
?>
<div class="card row g-3 col-md-4 center">
  <h5 class="card-header"><?=$title?></h5>
  <div class="card-body">
    
    <form method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user_email" 
            name="user_email" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Email required</div>
        </div>
        <div class="mb-3">
            <label for="user_pass" class="form-label">Password</label>
            <input type="password" name="user_pass" class="form-control" id="user_pass" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Password is required</div>
        </div>
        <div class="mb-3">
            <label for="user_pass_confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="user_pass_confirm" id="user_pass" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Confirm password is required</div>
        </div>
        <div class="mb-3">
            <label for="user_mobile" class="form-label">Mobile</label>
            <input type="tel" class="form-control" 
            name="user_mobile" id="user_mobile" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Mobile is required</div>
        </div>
        <div class="mb-5">
            <label for="user_category" class="form-check-label">User account type</label>
            <div class="form-check-inline">
                <input type="radio" class="form-check-input" 
                name="user_category" id="user_category" value="2" required />
                 Register as a Business
                <input type="radio" class="form-check-input" 
                name="user_category"  value="3" required/>
                 Register as Visitor
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Select your user account type! Please!</div>
            </div>
         </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="cmd" value="Register">Register yourself</button>
        </div>
        <div class="mb-3">
            <?=$message?>
        </div>
    </form>
  </div>
</div>

<?php include_once "templates/public/footer.php" ?>