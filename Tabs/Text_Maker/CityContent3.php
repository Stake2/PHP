<?php 

echo $computer_buttons[1].$computer_buttons[2];
echo '<hr class="'.$sitehr.'" />';

echo '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' id="cetoggle2btn" onClick="Cetoggle4cmnd();">'.'<'.$h2_element.'>'.$edit_text.': '.$icons[10].'</'.$h2_element.'>'.'</button>';

echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard4()">'.'<'.$h2_element.'>'.''.$copy_text_text.': '.$icons[15].'</'.$h2_element.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="copyToClipboard3()">'.'<'.$h2_element.'>'.''.$copy_html_text.': '.$icons[15].'</'.$h2_element.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$computer_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$h2_element.' class="'.$textstyle.' '.$computer_variable.'" id="teste2div" style="text-align:left;">';
echo $div_zoom_animation;

require $story_namemakerfilephp;

echo '</'.$h2_element.'>'."\n";
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
echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" onclick="copyToClipboard4()">'.'<'.$h4_element.'>'.''.$copy_text_text.': '.$icons[15].'</'.$h4_element.'>'.'</button>';
echo '<button class="w3-btn '.$first_button_style.'" onclick="copyToClipboard3()">'.'<'.$h4_element.'>'.''.$copy_html_text.': '.$icons[15].'</'.$h4_element.'>'.'</button>';
echo $div_close."\n";
echo '<hr class="'.$sitehr.' '.$mobile_variable.'" />';
echo '<div style="text-align:left;">'."\n";

echo '<'.$h4_element.' class="'.$textstyle.' '.$mobile_variable.'" id="teste4div" style="text-align:left;">';
echo $div_zoom_animation;

require $story_namemakerfilephp;

echo '</'.$h4_element.'>'."\n";
echo $div_close."\n";

?>