<?php 
$title = "Login";
include_once "templates/public/header.php";
?>
<div class="card row g-3 col-md-4 center">
  <h5 class="card-header">Login</h5>
  <div class="card-body">
    <div class="mb-3">
           <h6><a href="register.php">New user? Register first.</a></h6>
    </div>
    <form method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user_email" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Invalid email</div>
        </div>
        <div class="mb-3">
            <label for="user_pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="user_pass" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Invalid password</div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="cmd" value="Login">Login</button>
        </div>
         <div class="mb-3">
            <?=$message?>
        </div>
        <div class="mb-3">
            <h6><a href="recover.php">Forgot Password?</a></h6>
        </div>
    </form>
  </div>
</div>

<?php include_once "templates/public/footer.php" ?>