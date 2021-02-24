<?php 
$title = "Recover";
include_once "templates/public/header.php";



?>
<div class="card row g-3 col-md-4 center">
  <h5 class="card-header"><?=$title?></h5>
  <div class="card-body">
   
    <form method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user_email" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Invalid email</div>
        </div>
         
        <div class="mb-3">
            <button class="btn btn-primary" name="cmd" value="Recover">Recover password</button>
        </div>
        <div class="mb-3">
            <?=$message?>
        </div>
    </form>
  </div>
</div>

<?php include_once "templates/public/footer.php" ?>