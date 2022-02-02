<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><body onLoad="Define_Colors_And_Styles();">
<center>

<?php echo $website_buttons; ?>

<?php echo $website_notification; ?>

<?php echo $change_website_title_script; ?>

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