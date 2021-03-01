<?php
include_once "lib/all.php";
 
$expected  = crypt('admin1234', '$2a$07$usesomesillystringforsalt$');
$correct   = crypt('admin1234', '$2a$07$usesomesillystringforsalt$');
$incorrect = crypt('admin123', '$2a$07$usesomesillystringforsalt$');

echo "<pre>$expected</pre>";
var_dump(hash_equals($expected, $correct));
var_dump(hash_equals($expected, $incorrect));

echo "<pre>".  bin2hex(random_bytes(5)) . "</pre>";

?>

 