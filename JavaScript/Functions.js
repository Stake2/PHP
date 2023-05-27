// Get divs from page
var divs = document.getElementsByTagName("div")

// Transform divs into array
var array = Array.from(divs)

array.forEach(
	function(div) {
		// Checks if div contains the "input" element
		var add = false

		var children = Array.from(div.children)

		children.forEach(
			function(item) {
				if (item.tagName == "INPUT") {
					add = true
				}
			}
		)

		// Add "click" event listener if div contains the "input" element
		if (add == true) {
			div.addEventListener("click", 
				function(event) {
					// If target is a div, define array as the children of the div 
					if (event.target.tagName == "DIV") {
						var array = event.target.children
					}

					// If target is not a div, define array as the children of the parent element (which is probably the div)
					else {
						var parent = event.target.parentElement

						// If parent is a div, define array as the children of the div
						if (parent.tagName == "DIV") {
							var array = parent.children
						}

						// If parent is not a div, define parent as the parent of the parent element
						// Define the array as the children of the parent element (which is probably now the div)
						else {
							var parent = parent.parentElement

							var array = parent.children
						}
					}

					// Finds the input button and clicks it
					Click_Input(array)
				}
			)
		}
	}
)