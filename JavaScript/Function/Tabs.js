function openCity(evt, cityName) {
	// Declara todas as variáveis
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