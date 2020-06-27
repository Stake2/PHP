<?php

$sitephpfolder = "C:/Mega/Diario/PHP/";
$url = "https://diario.netlify.app";
$site = 'Watch';
$lang = 'enus';
$global = 'Global';
$folder1 = 'Tabs';

include "C:/Mega/Diario/PHP/".$site."/Variables/V".$site.".php";
include "C:/Mega/Diario/PHP/".$site."/Variables/FilesENUS.php";

 ?>
<!DOCTYPE html>
<head><?php echo $siteheadgeral; ?>
</head>
<body>
<?php echo $sitejs; ?>
<center>

<?php echo $sidemenubtnsptbr."\n".$sidemenubtnsenus."\n"; ?>
<?php echo "\n"; ?>
<div id="myDIV" class="w3-bar mobileHide" style="position:fixed;">
<?php echo $everybtnenus; ?><?php echo "\n"; ?>
<?php echo $pcbtn1."\n"; ?>
</div><?php echo "\n"; ?>
<?php echo $pcbtn2."\n"; ?>

<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>
<div style="background-color:black;<?php echo $margincss3.$border; ?>">
<<?php echo $n3; ?> class="w3-black w3-text-blue <?php echo $mobile0; ?>"><br /><?php echo "".$sitetitulogeral.': <span class="w3-text-yellow">['.$everywatchednumb." ".$mediasptbr.']</span>'."<br />"; ?><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $n3; ?>><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-black w3-text-blue <?php echo $mobile1; ?>"><br /><?php echo "".$sitetitulogeral.': <span class="w3-text-yellow">['.$everywatchednumb." ".$mediasptbr.']</span>'."<br />"; ?><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $m3; ?>><?php echo "\n"; ?>
<img src="<?php echo $siteimg; ?>" class="<?php echo $mobile0; ?>" width="27%" style="background-color:black;<?php echo $border; ?>"><br /><br /><?php echo "\n"; ?>
<img src="<?php echo $siteimg; ?>" class="<?php echo $mobile1; ?>" width="61%" style="background-color:black;<?php echo $border; ?>"><br /><br /><?php echo "\n"; ?>
<<?php echo $n3; ?> class="w3-black w3-text-blue <?php echo $mobile0; ?>">
<?php echo $sitedescptbr; ?>
</<?php echo $n3; ?>><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-black w3-text-blue <?php echo $mobile1; ?>">
<?php echo $sitedescptbr; ?>
</<?php echo $m3; ?>><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
</div><?php echo "\n"; ?>

<?php

include $tabsphp;
echo "\n";

echo "\n";
echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
echo $sitebtn;
echo "\n";
include $sitesbtnphp;
echo "\n";

?>
</center>
</body>
</html>