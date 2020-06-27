<?php 

echo $btns[1].$btns[2];
echo '<hr class="'.$sitehr.'" />';

echo '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' id="cetoggle1btn" onClick="Cetoggle2cmnd();">'.'<'.$n.'>'.$editbtntxt1.': '.$icons[10].'</'.$n.'>'.'</button>';

echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$n.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$n.'>'.'</button>';
echo '<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$n.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$n.'>'.'</button>';
echo $divc."\n";
echo '<hr class="'.$sitehr.' '.$computervar.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$n.' class="'.$textstyle.' '.$computervar.'" id="teste1div" style="text-align:left;">';
echo $divzoomanim;

include $yearmakerfilephp;

echo '</'.$n.'>'."\n";
echo $divc."\n";

echo '<script>
var text = document.getElementById("teste1div").innerHTML;
var text2 = document.getElementById("teste1div").textContent;

function copyToClipboard1() {
    navigator.clipboard.writeText(text);
	console.log("Diario Webiste: Text copied to the clipboard: " + text);
}

function copyToClipboard2() {
    navigator.clipboard.writeText(text2);
	console.log("Diario Webiste: Text copied to the clipboard: " + text2);
}
</script>';

echo '<div class="'.$mobilevar.'">';
echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$m.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$m.'>'.'</button>';
echo '<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$m.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$m.'>'.'</button>';
echo $divc."\n";
echo '<hr class="'.$sitehr.' '.$mobilevar.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$m.' class="'.$textstyle.' '.$mobilevar.'" id="teste3div" style="text-align:left;">';
echo $divzoomanim;

include $yearmakerfilephp;

echo '</'.$m.'>'."\n";
echo $divc."\n";

?>