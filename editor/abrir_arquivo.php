<?php

///home/ronaldoaf13/biscuila.com
$filename = $_POST["caminho"];
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);


echo $contents;

?>
