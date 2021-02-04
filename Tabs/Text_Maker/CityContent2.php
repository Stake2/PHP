<?php 

echo $computer_buttons[1].$computer_buttons[2];
echo '<hr class="'.$sitehr.'" />';

echo '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' id="cetoggle1btn" onClick="Cetoggle2cmnd();">'.'<'.$n.'>'.$editbtntxt1.': '.$icons[10].'</'.$n.'>'.'</button>';

echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$n.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$n.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$n.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$n.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$computer_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$n.' class="'.$textstyle.' '.$computer_variable.'" id="teste1div" style="text-align:left;">';
echo $div_zoom_animation;

include $year_maker_file_php;

echo '</'.$n.'>'."\n";
echo $div_close."\n";

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

echo '<div class="'.$mobile_variable.'">';
echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$m.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$m.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$m.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$m.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$mobile_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$m.' class="'.$textstyle.' '.$mobile_variable.'" id="teste3div" style="text-align:left;">';
echo $div_zoom_animation;

include $year_maker_file_php;

echo '</'.$m.'>'."\n";
echo $div_close."\n";

?>