<?php

$website_comment_form = "\n".
'<div class="'.$computer_variable.'">
<form name="'.$website_form_code.'-comment" method="POST" data-netlify="True">
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
<form name="'.$website_form_code.'-comment" method="POST" data-netlify="True">
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

$story_name_website_write_form = "\n".'
<div class="'.$computer_variable.'">
<form name="'.$website_form_code.'-write" method="POST" data-netlify="True">
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$name_text.':</b><br />
<textarea type="text" name="name" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$write_texts_array[1].':</b><br />

<textarea type="text" name="comment" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="float:right;margin-top:-10px;'.$rounded_border_style_2.'"><b>'.$send_form_text.'</b>: <i class="fas fa-paper-plane"></i></button></h2>

</span>
</form>
</div>

<div class="'.$mobile_variable.'">
<form name="'.$website_form_code.'-write" method="POST" data-netlify="True">
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$name_text.':</b><br />
<textarea type="text" name="'.$website_form_code.'-name" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$full_form_style.'" '.$roundedborderstyle.'><b style="white-space: break-spaces;">'.$write_texts_array[1].':</b><br />

<textarea type="text" name="comment" class="'.$form_color_background.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="float:right;margin-top:-10px;'.$rounded_border_style_2.'"><b>'.$send_form_text.'</b>: <i class="fas fa-paper-plane"></i></button></h2>

</span>
</form>
</div>

</div>'.
"\n";

?>