<!-- This file is used to markup the public-facing widget. -->
<div id="date-time" class="date-time" style="color: <?php echo $text_color ?>;
  background-color: <?php echo $background_color ?>;
  font-family: <?php echo $font_family ?>;
  font-size: <?php echo $font_size ?>;">
  <h4 class="widget-title" style="text-align: left;">GMT+1 Time</h4>
  <ul>
    <li>
     <div class="time" style="display: inline-block;"></div>
     <div class="date" style="display: inline-block;"></div>
    </li>
  </ul>
</div>
<script type="text/javascript">
  update('<?php echo $args["widget_id"]; ?>',
    '<?php echo $time_format; ?>',
    '<?php echo $date_format; ?>');
</script>
