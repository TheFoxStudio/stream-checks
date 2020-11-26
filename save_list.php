<?php
$myfile = fopen("userdata/".$_POST[userid]."_data.xml", "w") or die("Unable to open file!");

fwrite($myfile, $_POST[xml]);
fclose($myfile);

chmod("userdata/".$_POST[userid]."_data", 0660);

return true;
?>