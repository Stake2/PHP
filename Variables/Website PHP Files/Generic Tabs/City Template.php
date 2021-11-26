<a name="<?php echo $tabcode; ?>"></a><?php echo "\n"; ?>
<div id="<?php echo $tabcode; ?>" class="<?php echo $tab_style; ?>" <?php echo $hide_tabs_text; ?>><?php echo "\n"; ?>
<?php echo $big_space."\n"; ?>
<<?php echo $h2_element; ?> <?php echo 'class="'.$computer_variable.' '.$full_tab_style.'" style="'.$margin_style_10percent_rounded_border.'">'; ?><?php echo "\n"; ?>
<?php echo $margin."\n"; ?>
<?php 

$mobile_version = False;
require $tab_content;

?>
<?php echo $div_close."\n"; ?>
<?php echo $h2c."\n"; ?>
<?php echo $div_close."\n"; ?>
<?php echo "\n"; ?>
<a name="<?php echo $tabcode_mobile; ?>"></a><?php echo "\n"; ?>
<div id="<?php echo $tabcode_mobile; ?>" class="<?php echo $tab_style_mobile; ?>" <?php echo $hide_tabs_text; ?>><?php echo "\n"; ?>
<?php echo $big_space."\n"; ?>
<<?php echo $h4_element; ?> <?php echo 'class="'.$mobile_variable.' '.$full_tab_style.'" style="'.$margin_style_10percent_rounded_border.'">'; ?><?php echo "\n"; ?>
<?php echo $margin."\n"; ?>
<?php 

$mobile_version = True;
require $tab_content_mobile;

?>
<?php echo $div_close."\n"; ?>
<?php echo $h4_close."\n"; ?>
<?php echo $div_close."\n"; ?>