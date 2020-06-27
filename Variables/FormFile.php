<?php

$formcmnt = "\n".
'<div class="'.$computervar.'">
<form name="'.$formcode.'-comment" method="POST" data-netlify="true">
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$formname.':</b><br />
<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$cmntstxts[5].':</b><br />
<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea>
<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;'.$roundedborderstyle2.'"><i class="fas fa-paper-plane"></i></button></h2>
</span>
</form>
</div>

<div class="'.$mobilevar.'">
<form name="'.$formcode.'-comment" method="POST" data-netlify="true">
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$formname.':</b><br />
<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$cmntstxts[5].':</b><br />
<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;'.$roundedborderstyle2.'"><i class="fas fa-paper-plane"></i></button></h2>
</span>
</form>
</div>

</div>'.
"\n";

$formwrite = "\n".'
<div class="'.$computervar.'">
<form name="'.$formcode.'-write" method="POST" data-netlify="true">
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$formname.':</b><br />
<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$writetxts[1].':</b><br />
<textarea type="text" name="'.$formcode.'-write" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;'.$roundedborderstyle2.'"><i class="fas fa-paper-plane"></i></button></h2>
</span>
</form>
</div>

<div class="'.$mobilevar.'">
<form name="'.$formcode.'-write" method="POST" data-netlify="true">
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$formname.':</b><br />
<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea>
</span><br />
<span class="w3-btn '.$spanstyle.'" '.$roundedborderstyle.'><b>'.$writetxts[1].':</b><br />
<textarea type="text" name="'.$formcode.'-write" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'></textarea> 
<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;'.$roundedborderstyle2.'"><i class="fas fa-paper-plane"></i></button></h2>
</span>
</form>
</div>

</div>'.
"\n";

?>