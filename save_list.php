<?php
$myfile = fopen("data.xml", "w") or die("Unable to open file!");

fwrite($myfile, $_POST[xml]);
fclose($myfile);

return true;
?>