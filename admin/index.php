<?php 
$title = "Dashboard::Admin";
include_once "../templates/admin/header.php";

/*:--- variables --------:*/
$country_id =  post("country_id");
$state_id = post("state_id");
$city_id =  post("city_id");
$country_name =  post("country_name");
$state_name =  post("state_name");
$city_name =  post("city_name");
$category_id = post("category_id");
$category_name = post("category_name");

$ct = new City();
$cat = new Category();
$cat_message = "";

if($cmd == "AddCategory") {
  $cat->categoryName = $category_name;
  $cat_message = $cat->addCategory() ? "Category added" : "Can't add!!!";
}

if($cmd == "DeleteCategory") {
  $cat->categoryId = $category_id;
  $cat_message = $cat->deleteCategory() ? "Category deleted" : "Can't delete!!";
}

if($cmd == "AddCountry") {
  $ct->countryName = $country_name;
  $message = $ct->addCountry() ? "Country added" : "Can't add!!!";
}
if($cmd == "UpdateCountry") {
  $ct->countryName = $country_name;
  $ct->countryId = $country_id;
  $message = $ct->updateCountry() ? "Country updated" : "Can't update!!!";
}
if($cmd == "DeleteCountry") {
  $ct->countryId = $country_id;
  $message = $ct->deleteCountry() ? "Country deleted" : "Can't delete!!!";
}

if($cmd == "AddState") {
  $ct->countryId = $country_id;
  $ct->stateName = $state_name;
  $message = $ct->addState() ? "State added" : "Can't add!!!";
}
if($cmd == "UpdateState") {
  $ct->stateId = $state_id;
  $ct->countryId = $country_id;
  $ct->stateName = $state_name;
  $message = $ct->updateState() ? "State updated" : "Can't update!!!";
}
if($cmd == "DeleteState") {
  $ct->stateId = $state_id;
  $message = $ct->deleteState() ? "State deleted" : "Can't delete!!!";
}

if($cmd == "AddCity") {
  $ct->stateId = $state_id;
  $ct->cityName = $city_name;
  $message = $ct->addCity() ? "City added" : "Can't add!!!";
}

if($cmd == "UpdateCity") {
  $ct->stateId = $state_id;
  $ct->cityName = $city_name;
  $ct->cityId = $city_id;
  $message = $ct->updateCity() ? "City updated" : "Can't update!!!";
}
if($cmd == "DeleteCity") {
  $ct->cityId = $city_id;
  $message = $ct->deleteCity() ? "City deleted" : "Can't deleted!!!";
}

?>
<h2>Admin Dashboard</h2>
<div class="row">
   <div class="col-md-2">
      <div class="card">
        <div class="card-header bg-info">User Accounts</div>
        <div class="card-body">
        <ul>
        <?php
          $d = new Db();
          $rows=$d->queryAll("select * from user_role");
          foreach ($rows as $row) {
            ?>
            <li>
              <a href="user.php?role_id=<?=$row['role_id']?>"><?=$row['role_name']?></a>
            </li>
            <?php
          }
        ?>
        </ul>
        </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="card">
            <div class="card-header bg-info">City</div>
            <div class="card-body">
             <form method="post" id="frmCity">
             <div class="row mb-1">
                <div class="col">
                  <select name="country_id" class="form-control" onchange="frmCity.submit()">
                    <option value="">Country</option>
                    <?=getCountryList($country_id)?>                 
                  </select>
                </div>
                <div class="col">
                  <input type="text" class="form-control"  placeholder="country" name="country_name" />
                </div>
                <div class="col">
                  <?php
                   if(empty($country_id)) {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="AddCountry">Add</button>';
                   } else {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="UpdateCountry">Update</button>';
                     echo '<button name="cmd" class="btn btn-sm btn-danger" value="DeleteCountry">X</button>';
                   }
                  ?>
                </div>
             </div>
             <div class="row mb-1">
               <div class="col">
                 <select name="state_id" class="form-control"  onchange="frmCity.submit()">
                  <option value="">State</option> 
                  <?=getStateList($country_id, $state_id)?>
                 </select>
               </div> 
               <div class="col">
                 <input type="text" class="form-control" placeholder="state" name="state_name" />
               </div>
               <div class="col">
                <?php
                   if(empty($state_id)) {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="AddState">Add</button>';
                   } else {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="UpdateState">Update</button>';
                     echo '<button name="cmd" class="btn btn-sm btn-danger" value="DeleteState">X</button>';
                   }
                  ?>
                
                </div>
             </div>
             <div class="row mb-1">
               <div class="col">
                 <select name="city_id" class="form-control" onchange="frmCity.submit()">
                  <option value="">City</option> 
                  <?=getCityList($state_id,$city_id)?>
               </select>
               </div>  
               <div class="col">
                  <input type="text" class="form-control" placeholder="city" name="city_name" />
                </div>
               <div class="col">
                <?php
                   if(empty($city_id)) {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="AddCity">Add</button>';
                   } else {
                     echo '<button name="cmd" class="btn btn-sm btn-primary" value="UpdateCity">Update</button>';
                     echo '<button name="cmd" class="btn btn-sm btn-danger" value="DeleteCity">X</button>';
                   }
                  ?>
                </div>
             </div>
               <p><?=$message?></p>
             </form>
        </div>
      </div>
   </div>

   <div class="col-md-2">
     <div class="card">
        <div class="card-header bg-info">Business Category</div>
        <div class="card-body">
          <form method="post">
             <input type="hidden" name="category_id" value="<?=$category_id?>" />
             <div class="row mb-1">
               <div class="col"><input type="text" class="form-control" name="category_name" placeholder="category"/></div>
               <div class="col"><button name="cmd" class="btn btn-sm btn-primary" value="AddCategory">Add</button></div>
             </div>
         </form>
         <ul style="height: 90px;overflow-x: hidden;overflow-y: auto;">
           <?php foreach($cat->getCategories() as $r) { ?>
            <li>
             <form method="post">
                <input type="hidden" name="category_id" value='<?=$r["category_id"]?>' />
                <div class="row mb-1">
                  <div class="col"><?=$r["category_name"]?></div>
                  <div class="col"><button name="cmd" 
                 onclick="return confirm('Are you sure to delete this category?')"
                class="btn btn-sm btn-danger" value="DeleteCategory">X</button></div>
                </div>
             </form>
            </li>           
           <?php  }?>
         </ul>
         <p><?=$cat_message?></p>
        </div>
     </div>
   </div>
   <div class="col-md-2">

   </div>
</div>



<?php include_once "../templates/admin/footer.php" ?>