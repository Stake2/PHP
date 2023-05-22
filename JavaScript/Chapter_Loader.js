// Chapter_Loader.js

function Add_Text_To_Element(url, element) {
	var request = new XMLHttpRequest()
	request.open("GET", url, true)
	request.send()
	request.onreadystatechange = process

	function process(event) {
		element.innerHTML = event.target.response
	}
}

function Load_Chapter(chapter_tab_id) {
	var chapter_number = Number(chapter_tab_id.split("_")[1])
	var chapter_text_element = document.getElementById(chapter_tab_id + "_text")

	var link = website["link"]

	// Split link to remove parameters
	if (link.includes("?") == true) {
		link = link.split("?")[0]
	}

	var chapter_file = link + "Chapters/" + languages["user"] + "/" + Add_Leading_Zeroes(chapter_number) + ".txt"
	print(chapter_file)

	//Add_Text_To_Element(chapter_file, chapter_text_element)
}