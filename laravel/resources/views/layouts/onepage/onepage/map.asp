<?php

if (isset($_POST["action"]) && $_POST["action"] == "save") {
  //print_r($_POST);
  $filename = 'cachedinputs.json';
  
  $cachedinputs = fopen("cachedinputs.json", "w") or die("Unable to Create file cachedinputs.json!");
  fwrite($cachedinputs, $_POST["cachedinputsData"]);
  fclose($cachedinputs);
  
  echo $_POST["cachedinputsData"];
}
 
die();
?>