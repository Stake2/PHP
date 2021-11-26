<!DOCTYPE html>
<head>
<title>Ler Mangá</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="Ler Mangá" />
<meta property="og:site_name" content="Ler Mangá" />
<meta property="og:description" content="Website test." />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<meta name="description" content="Website test." />
<meta name="twitter:card" content="summary" />
<meta name="revised" content="21/08/2021" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />

<!-- JavaScript files -->
<script>
function openCity(evt, cityName) {
	// Declara todas as variaveis
	var i, tabcontent, tablinks;

	// Pega todos os elementos com class="tabcontent" e esconde eles
	tabcontent = document.getElementsByClassName("tabcontent");

	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	// Pega todos os elementos com class="tablinks" e remove o "active"
	tablinks = document.getElementsByClassName("tablinks");

	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}

	// Mostra a aba atual, e adiciona uma "active" classe para o link que abriu a aba
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}

function openCity(cityName) {
	var i;
	var x = document.getElementsByClassName("city");
	var selected_city = document.getElementById(cityName);

	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
    }

	selected_city.style.display = "block";
	selected_city.scrollIntoView();
}

console.log("Tabs Script was loaded.");
</script>

</head>

<body>

<center>
<?php 

$numero_de_paginas = 25;

echo "Número de páginas do mangá: ".$numero_de_paginas;

?>
</center>

<br /><br /><br /><br />
<div id="div-mangá" style="margin-left:15%;margin-right:15%;border-width:2px;border-color:black;border-style:double;border-radius:5%;">
<center>

<h2>Mangá Tal</h2>
<hr>

<?php 

$i = 1;
while ($i <= $numero_de_paginas) {
	if ($i == 1) {
		$style = '';
	}

	if ($i != 1) {
		$style = ' style="display:none;"';
	}

	if ($i != $numero_de_paginas) {
		$onclick = ' onclick="openCity('."'pagina-'".' + '.($i + 1).');"';
	}

	else {
		$onclick = "";
	}

	echo '<div id="pagina-'.$i.'" class="city"'.$style.'>'."\n";
	echo "<br />"."\n";
	echo "<b>Página ".$i.":</b><br /><br />"."\n";
	echo '<a name="pagina-'.$i.'-anchor"></a>';
	echo '<a href="#pagina-'.($i + 1).'-anchor" style="cursor:default;color:black;">';
	echo '<img src="https://servidor-de-imagens.com/pagina-'.$i.'.png" alt="pagina-'.$i.'" width="60%" height="60%" style="border-color:w3-black;border-style:solid;border-radius: 32px;height: auto;max-width: 4000px;"'.$onclick.' />'."\n";
	echo "</a>";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo "<br />"."\n";
	echo '</div>'."\n";

	$i++;
}

?>

<br />
</center>
</div>

</body>
</html>