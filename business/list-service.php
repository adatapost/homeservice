<?php 
$title = "Services::Business";
include_once "../templates/business/header.php";

$bs = new BusinessService();
$bs->userId = session("userId");
$rows = $bs->all();
?>
<div class="card">
  <div class="card-header">
     List the services
  </div>
  <div class="card-body">
     <h6><a href="create-service.php">Create Service</a></h6>
     <table class="table table-bordered">
       <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Available?</th>
        <th></th>
       </tr>
       <?php foreach ($rows as $r) { ?>
           <tr>
            <td><?=$r['service_title']?></td>
            <td><?=$r['service_desc']?></td>
            <td><img style='width: 100px' src="../assets/photo/<?=$r['business_photo']?>" /></td>
            <td><?=($r['avilable'] ? 'Yes' : 'No')?></td>
            <td>
              <form method="post" action="create-service.php">
                <input type="hidden" name="service_id" value="<?=$r['service_id']?>" />
                <button name="cmd" value="Edit">Edit</button>
              </form>
            </td>
           </tr>
       <?php }?>

     </table>

  </div>
</div>
<?php include_once "../templates/business/footer.php" ?>