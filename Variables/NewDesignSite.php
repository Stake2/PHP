<?php 

echo '
<div id="menuH" style="opacity: 1; transition-delay: 0s;" class="active activeHover">
<div id="menuHbox">
<nav>
<div id="boxLogo">
<a href="'.$siteurl.'" title="'.$sitetitulo.'"><img src="'.$imglink.'" alt="'.$sitetitulo.'"><'.$m.' style="font-weight: bold!important;white-space: nowrap;">'.$sitetitulo.'</'.$m.'></a>
</div>
<div class="actionMenuUser" title="'.$newdesigntxts[0].'" alt="'.$newdesigntxts[0].'">
<div class="menu_btns avatarUser">
<i class="fas fa-book pqnttext" title="'.$newdesigntxts[0].'" style="font-size:16px;font-weight:bold;"></i>			
</div>
<div class="js_boxCliente" style="display: none;">
<ul class="menuLi">';

$i = 0;
while ($i <= $storiesnumb - 1) {
	if ($i == 0) {
		$linktarget = "_self";
	}

	else {
		$linktarget = '_newtab';
	}

	echo '<a href="'.$storylinks[$i].'" title="'.$stories[$i].'" target="'.$linktarget.'"><button class="w3-btn '.$btnstyle3.'" '.$roundedborderstyle.'>'.$stories[$i].' <i class="fas fa-book w3-text-black" style="font-size: 16px;font-weight: bold;width: 16px;"></i></button></a> '."\n";

	$i++;
}

echo '				</ul>
				</div>
			</div>';


echo '
			<div class="actionMenu" title="'.$newdesigntxts[1].'" alt="'.$newdesigntxts[1].'">
				<div class="menu_btns">
					<i class="fas fa-bars pqnttext" title="'.$newdesigntxts[1].'" style="font-size:16px;font-weight:bold;"></i>
				</div>
				<ul class="menu" style="display: none;">';

include $capbtngeneratorphp;

echo '
					<i>&nbsp;</i>
					<i>&nbsp;</i>
					<i>&nbsp;</i>
				</ul>
			</div>
		</nav>
	</div>
</div>
';

echo '
<div id="corpo">';

echo '<script type="text/javascript" language="javascript">'."
	function MM_jumpMenu(targ, selObj, restore) {
		eval(targ + ".'"'.".location='".'"'.' + selObj.options[selObj.selectedIndex].value + '.'"'."'".'"'.");
		if (restore)
			selObj.selectedindex = 0;
	}
</script>";

echo '
<div class="conteudoBox">';

include $chapterreaderglobal;

echo '</div>
</div>
';

?>