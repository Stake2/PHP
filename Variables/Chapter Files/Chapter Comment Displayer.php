<?php

#Readings and Comments displayer on chapters
if ($sitename == $sitepequenata and $storyhaschaptercomments == true) {
	if ($capnum1 == 1) {
		echo $commentheader."\n";

		echo $cmntschapter[1]."\n";

		echo $divc."\n";
	}

	if ($capnum1 == 2) {
		echo $commentheader."\n";

		echo $cmntschapter[(4 + $zw)]."\n";
		echo $cmntschapter[(1 + $zw)]."\n";

		echo $divc."\n";
	}

	if ($capnum1 == 3) {
		echo $commentheader."\n";

		echo $cmntschapter[(2 + $zw)]."\n";
		echo $cmntschapter[(5 + $zw)]."\n";

		echo $divc."\n";
	}


	if ($capnum1 == 7) {
		echo $commentheader."\n";

		echo $cmntschapter[0]."\n";

		echo $divc."\n";
	}

	if ($capnum1 == 8) {
		echo $commentheader."\n";

		echo $cmntschapter[(3 + $zw)]."\n";

		echo $divc."\n";
	}

	if ($capnum1 == 1) {
		echo $readingsheader."\n";
	}

	if ($capnum1 > 1 and $capnum1 < 11) {
		echo $readingsheader."\n";

		echo $reads[$h]."\n";
	}

	if ($capnum1 == 2) {
		echo $reads[2]."\n";
	}

	if ($capnum1 == 1) {
		echo $reads[($h - ($mzz + $za))]."\n";
		echo $reads[($h - ($mzz + $zw))]."\n";
	}
}

if ($sitename == $sitenazzevo and $storyhaschaptercomments == true) {
	if ($capnum1 == 1) {
		echo $commentheader."\n";

		echo $cmntschapter[0]."\n";
		echo $cmntschapter[1]."\n";

		echo $divc."\n";
	}
}

if ($sitename == $sitenazzevo and $storycontainsreads) {
	if ($capnum1 == 1) {
		echo $readingsheader."\n";

		echo $reads[0]."\n";
		echo $reads[1]."\n";
	}
}

if ($sitename == $sitespaceliving and $storyhaschaptercomments == true and $storycontainscomments == true) {
	if ($capnum1 == 1) {
		echo $commentheader."\n";

		$i = 0;
		while ($i <= count($cmntschapter) - 1) {
			echo $cmntschapter[$i]."\n";

			$i++;
		}

		#echo $cmntschapter[0]."\n";
		#echo $cmntschapter[1]."\n";

		echo $divc."\n";
	}
}

if ($sitename == $sitespaceliving and $storycontainsreads) {
	if ($capnum1 == 1) {
		echo $readingsheader."\n";

		echo $reads[0]."\n";
		echo $reads[1]."\n";
	}
}

?>