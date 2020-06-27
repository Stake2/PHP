<?php 

echo $btns[1].$btns[2];
echo '<hr class="'.$sitehr.'" />';

echo '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' id="cetoggle2btn" onClick="Cetoggle4cmnd();">'.'<'.$n.'>'.$editbtntxt1.': '.$icons[10].'</'.$n.'>'.'</button>';

echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard4()">'.'<'.$n.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$n.'>'.'</button>';
echo '<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="copyToClipboard3()">'.'<'.$n.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$n.'>'.'</button>';
echo $divc."\n";
echo '<hr class="'.$sitehr.' '.$computervar.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$n.' class="'.$textstyle.' '.$computervar.'" id="teste2div" style="text-align:left;">';
echo $divzoomanim;

include $storymakerfilephp;

echo '</'.$n.'>'."\n";
echo $divc."\n";

echo '<script>
var text3 = document.getElementById("teste2div").innerHTML;
var text4 = document.getElementById("teste2div").textContent;

function copyToClipboard3() {
    navigator.clipboard.writeText(text3);
	console.log("Diario Webiste: Text copied to the clipboard: " + text3);
}

function copyToClipboard4() {
    navigator.clipboard.writeText(text4);
	console.log("Diario Webiste: Text copied to the clipboard: " + text4);
}
</script>';

echo '<div class="'.$mobilevar.'">';
echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" onclick="copyToClipboard4()">'.'<'.$m.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$m.'>'.'</button>';
echo '<button class="w3-btn '.$btnstyle.'" onclick="copyToClipboard3()">'.'<'.$m.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$m.'>'.'</button>';
echo $divc."\n";
echo '<hr class="'.$sitehr.' '.$mobilevar.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$m.' class="'.$textstyle.' '.$mobilevar.'" id="teste4div" style="text-align:left;">';
echo $divzoomanim;

include $storymakerfilephp;

echo '</'.$m.'>'."\n";
echo $divc."\n";

?>