<?php


$recivedata=file_get_contents('php://input');

$data=json_decode($recivedata);


return json_encode($data);


?>