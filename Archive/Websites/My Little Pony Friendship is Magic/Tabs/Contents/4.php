<?php

$fimfiction_url_format = "https://www.fimfiction.net/story/{}";

$sats_pastebin_link = "https://pastebin.com/5KapHt8E";

$desuarchive_threads = array(
"https://desuarchive.org/mlp/thread/19946521/",
"https://desuarchive.org/mlp/thread/20005209/",
);

$link_color = $css_texts["white"];

$sunset_at_the_stables_text = Create_Element("b", "", "Sunset at the Stables (".Language_Item_Definer("Homeless Sunset Shimmer ".Create_Element("span", $css_texts["green"], "4chan")." Thread) by", "Thread do ".Create_Element("span", $css_texts["green"], "4chan")." da Sunset Shimmer Sem Casa) por")." Writemook")."<br />"."\n".
Create_Element("b", "", "Pastebin").": ".Make_Link($sats_pastebin_link, $sats_pastebin_link, $link_color, True)."<br />"."\n".
Create_Element("b", "", "Threads").": ".Make_Link($desuarchive_threads[0], $desuarchive_threads[0], $link_color, True)."<br />"."\n".
Make_Link($desuarchive_threads[1], $desuarchive_threads[1], $link_color, True)."<br />"."\n";

$sunset_at_the_stables_text = str_replace("Sunset Shimmer", Create_Element("span", $css_texts["orange"], "Sunset Shimmer"), $sunset_at_the_stables_text);

$fimfiction_story_names_prototype = [
$my_little_pony_fim_name_text." - ".Language_Item_Definer("The Visit of Izaque", "A Visita de Izaque"),
];

$fimfiction_story_names_prototype[0] = str_replace("Izaque", Create_Element("span", $css_texts["orange"], "Izaque"), $fimfiction_story_names_prototype[0]);
$fimfiction_story_names_prototype[0] = str_replace($my_little_pony_fim_name_text, $my_little_pony_name_colored, $fimfiction_story_names_prototype[0]);

$fimfiction_ids = [
"387062",
];

$fimfiction_story_names = array();

$i = 0;
foreach ($fimfiction_ids as $id) {
	$fimfiction_story_names[$id] = $fimfiction_story_names_prototype[$i];

	$i++;
}

foreach (array_keys($fimfiction_story_names) as $fimfiction_key) {
	$key = $fimfiction_key;

	$story_name = $fimfiction_story_names[$key];
	$story_link = format($fimfiction_url_format, array($key));

	Show(Create_Element("b", "", $story_name), $add_br = True);
	Show(Make_Link($story_link, $story_link, $link_color, True), $add_br = True);

	Show("", $add_br = True);
}

Show($sunset_at_the_stables_text, $add_br = True);

$fimfiction_story_names_prototype = [
"Don't Starve!",
"My Little Pony: Don't Starve",
"Fallout: Equestria",
];

$fimfiction_ids = [
"163278",
"74667",
"119190",
];

$fimfiction_story_names = array();

$i = 0;
foreach ($fimfiction_ids as $id) {
	$fimfiction_story_names[$id] = $fimfiction_story_names_prototype[$i];

	$i++;
}

foreach (array_keys($fimfiction_story_names) as $fimfiction_key) {
	$key = $fimfiction_key;

	$story_name = $fimfiction_story_names[$key];
	$story_link = format($fimfiction_url_format, array($key));

	Show(Create_Element("b", "", $story_name), $add_br = True);
	Show(Make_Link($story_link, $story_link, $link_color, True), $add_br = True);

	if ($fimfiction_key != array_reverse(array_keys($fimfiction_story_names))[0]) {
		Show("", $add_br = True);
	}
}

?>