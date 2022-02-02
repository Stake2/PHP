<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><body onLoad="Define_Colors_And_Styles();">
<center>

<!-- Website header -->
<?php echo $zoom_animation; ?>

<!-- Website computer title -->
<<?php echo $h2; ?> class="w3-center <?php echo $first_text_color; ?> <?php echo $zoom_animation_class; ?> <?php echo $computer_variable; ?>">
<p><br /><b><?php echo $title_with_icon; ?></b><br /><br /><p>
</<?php echo $h2; ?>>
</div>

<!-- Website mobile title -->
<?php echo $zoom_animation; ?>
<<?php echo $h4; ?> class="w3-center <?php echo $first_text_color; ?> <?php echo $zoom_animation_class; ?> <?php echo $mobile_variable; ?>">
<p><br /><b><?php echo $title_with_icon; ?></b><br /><br /><p>
</<?php echo $h4; ?>>
</div>
<?php echo $header_hr; ?>

<!-- Website Images -->
<div class="w3-center">
<?php echo $website_images_variable; ?></div>

<?php echo $header_hr; ?>\n

<!-- Computer website header description -->
<<?php echo $h2; ?> class="w3-center <?php echo $first_text_color; ?> <?php echo $computer_variable; ?>">
<?php echo $header_description; ?>\n
</<?php echo $h2; ?>>

<!-- Mobile website header description -->
<<?php echo $h4; ?> class="w3-center <?php echo $first_text_color; ?> <?php echo $mobile_variable; ?>">
<?php echo $header_description; ?>\n
</<?php echo $h4; ?>>

<br />
<!-- End of header -->