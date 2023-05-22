<?php

$website_comment_form = "\n".
'<div class="'.$computer_variable.'">
<form name="'.$website_information["english_title"].'-comment" method="POST" data-netlify="True">
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$name_text.':</b><br />
<textarea type="text" name="name" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$comment_what_you_think_on_story_text.':</b><br />

<textarea type="text" name="comment" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea>
<h2><button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="float:right;margin-top:-10px;'.$rounded_border_style_2.'"><b>'.$send_form_text.'</b>: <i class="fas fa-paper-plane"></i></button></h2>

</span>
</form>
</div>

<div class="'.$mobile_variable.'">
<form name="'.$website_information["english_title"].'-comment" method="POST" data-netlify="True">
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$name_text.':</b><br />
<textarea type="text" name="name" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$comment_what_you_think_on_story_text.':</b><br />

<textarea type="text" name="comment" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="float:right;margin-top:-10px;'.$rounded_border_style_2.'"><b>'.$send_form_text.'</b>: <i class="fas fa-paper-plane"></i></button></h2>

</span>
</form>
</div>

</div>'.
"\n";

$comment_card_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

$comment_card_template = "<".$h4_element.' class="'.$comment_card_style.'" style="text-align: left;'.$rounded_border_style_2.'">'."\n".
'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".
"<b>{}</b><br />"."\n".
"<b>{}: </b>{}"."\n".'<br />'."\n";

# Chapter text and title
if ($story_website_settings["show_chapter_on_comment"] == True) {
	$comment_card_template .= "<b>{}: "."</b>"."{}"."<br />"."\n";
}

$comment_card_template .= '<hr class="'.$third_full_border.'" />{}'."\n"."<br /><br />"."\n".
$computer_div."<br />".$div_close."\n".
$div_close."\n".'</'.$h4_element.'>'."\n"."<br />"."\n"."\n";

?>