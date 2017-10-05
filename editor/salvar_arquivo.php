<?php
$link =$_POST["caminho"];
$conteudo=$_POST["conteudo"];

//copy($link,$link.'bak');

$fp = fopen($link, 'w');

//fwrite($fp, stripslashes($conteudo));
fwrite($fp,$conteudo);

fclose($fp);


?>