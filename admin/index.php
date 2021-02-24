<?php 
$title = "Dashboard::Admin";
include_once "../templates/admin/header.php";

$d = new Db();
$d->exec("select * from user_role",
function($st) {
   $ar=[0,""];
   $st->bind_result($ar[0], $ar[1]);

   while($st->fetch()) {
     echo "<br/>", $ar[0], $ar[1];
   }
});
?>
<h2>Admin Dashboard</h2>

<?php include_once "../templates/admin/footer.php" ?>