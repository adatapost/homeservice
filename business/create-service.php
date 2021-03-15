<?php 
$title = "Services::Business";
include_once "../templates/business/header.php";

$bs = new BusinessService();
$bs->userId = session("userId");
$bs->serviceId = post("service_id");
$bs->serviceTitle =  post("service_title");
$bs->serviceDesc =  post("service_desc");
$bs->available =  post("available");

$isEdit = !empty($bs->serviceId);
if($r=$bs->getService()) {
  $bs->serviceId = $r['service_id'];
  $bs->serviceTitle = $r['service_title'];
  $bs->serviceDesc = $r['service_desc'];
  $bs->businessPhoto = $r['business_photo'];
  $bs->available = $r['avilable'];
}

if($cmd=="Add") {
  if(!empty($_FILES["business_photo"])) {
    $file = $_FILES["business_photo"];
    $bs->businessPhoto = $file["name"];
    @move_uploaded_file($file["tmp_name"],"../assets/photo/" . $bs->businessPhoto);
    
    if($bs->addBusinessService()) {
      $message = "Service created successfully";
     } else {
      $message = "Cannot create a service. Please verify input!";
     }
  }
}


?>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
      Business Service - <?=$isEdit ? 'Update' : 'New'?>
      <a class="btn btn-link" href="list-service.php">Back</a>
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data"  class="needs-validation" novalidate>
           <input type="hidden" name="service_id" value="<?=$bs->serviceId?>" />

           <div class="mb-3">
            <label for="service_title" class="form-label">Service Title</label>
            <input type="text" class="form-control" 
            id="service_title" 
            value="<?=$bs->serviceTitle?>"
            name="service_title" required/>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Required</div>
          </div>

          <div class="mb-3">
            <label for="service_desc" class="form-label">Service Description</label>
            <textarea type="text" rows="5" class="form-control" 
            id="service_desc" 
            name="service_desc" required><?=$bs->serviceDesc?></textarea>
            <div class="invalid-feedback">Required</div>
          </div>

           <div class="mb-3">
            <label for="business_photo" class="form-label">Service Photo</label>
             <input type="file" class="form-control" 
            id="business_photo" 
            name="business_photo" required /> 
            <div class="invalid-feedback">Required</div>
          </div>

          <div class="mb-3">
            <label for="available" class="form-label">Availability of service ? Please check if yes : </label>
             <input type="checkbox" value='1' class="form-check-input" 
            id="available" 
            <?=$bs->available ? 'checked' : ''?>
            name="available" /> 
          </div>
          <div class="mb-3">
           <?php
             if($isEdit) {
              echo '<button class="btn btn-primary" name="cmd" value="Update">Update</button>';
              echo '<button class="btn btn-primary" name="cmd" value="Delete">Delete</button>';
              echo '<button class="btn btn-primary" name="cmd" value="Cancel">Cancel</button>';
             } else {
               echo '<button class="btn btn-primary" name="cmd" value="Add">Add</button>';
             }
           ?>
            
        </div>
        <div class="mb-3">
            <?=$message?>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-3"></div>
</div>

<?php include_once "../templates/business/footer.php" ?>