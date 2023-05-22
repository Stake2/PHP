<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><body<?php if( isset($body_color) == True ){ ?> class="<?php echo $body_color; ?>"<?php } ?>>
<center>
<?php echo $data; ?>

<?php echo $form; ?>

</center>