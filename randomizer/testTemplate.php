<?php

  $template = $_POST['template'];
  $seed = mt_rand(1000000, 9999999);
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?template=".rawurlencode($template)."&seed=".$seed);
  exit;
?>
