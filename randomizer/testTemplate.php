<?php
  $template = $_POST['template'];
  if (empty($template)) {
      echo 'Please correct the template field';
      return false;
  }else {
      header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?template=".urlencode($template));

  }
  exit;
?>
