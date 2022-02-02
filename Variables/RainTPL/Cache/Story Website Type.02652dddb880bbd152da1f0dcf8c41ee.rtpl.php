<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><!-- Story synopsis -->
<<?php echo $h4; ?> class="<?php echo $first_text_color; ?>" style="<?php echo $margincss1; ?>">
<?php echo $header_description; ?>\n

<!-- Story website info, author(s), chapters, readers, creation date, status -->
<?php echo $author_text; ?>: <?php echo $author; ?><br />
<?php echo $chapter_text; ?>: <?php echo $chapters; ?><br />
<?php echo $readers_text; ?>: <?php echo $readers; ?><br />
<?php echo $creation_date_text; ?>: <?php echo $creation_date; ?><br />
Status: <?php echo $status; ?>
</<?php echo $h4; ?>>
<br />
<!-- End of header -->