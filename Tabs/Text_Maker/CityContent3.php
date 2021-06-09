<?php 

echo $computer_buttons[1].$computer_buttons[2];
echo '<hr class="'.$sitehr.'" />';

echo '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' id="cetoggle2btn" onClick="Cetoggle4cmnd();">'.'<'.$n.'>'.$edit_text.': '.$icons[10].'</'.$n.'>'.'</button>';

echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard4()">'.'<'.$n.'>'.''.$copy_text_text.': '.$icons[15].'</'.$n.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="copyToClipboard3()">'.'<'.$n.'>'.''.$copy_html_text.': '.$icons[15].'</'.$n.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$computer_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$n.' class="'.$textstyle.' '.$computer_variable.'" id="teste2div" style="text-align:left;">';
echo $div_zoom_animation;

require $story_namemakerfilephp;

echo '</'.$n.'>'."\n";
echo $div_close."\n";

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

echo '<div class="'.$mobile_variable.'">';
echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" onclick="copyToClipboard4()">'.'<'.$m.'>'.''.$copy_text_text.': '.$icons[15].'</'.$m.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" onclick="copyToClipboard3()">'.'<'.$m.'>'.''.$copy_html_text.': '.$icons[15].'</'.$m.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$mobile_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$m.' class="'.$textstyle.' '.$mobile_variable.'" id="teste4div" style="text-align:left;">';
echo $div_zoom_animation;

require $story_namemakerfilephp;

echo '</'.$m.'>'."\n";
echo $div_close."\n";

?>