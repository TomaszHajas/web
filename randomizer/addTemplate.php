<?php
  $template = $_POST['template'];
  $file = 'templates.txt';
  $currentContent = file_get_contents($file);
  $currentContent .= $template;
  file_put_contents($file, $currentContent);
?>
