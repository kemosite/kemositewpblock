function optionsModal() {

	console.log("Modal is ready for developing");

	const dialog = document.getElementById("accessibilityModal");
	const showButton = document.querySelector("a#showAccessibilityModal");
	const closeButton = document.querySelector("button#closeAccessibilityModal");

	// "Show the dialog" button opens the dialog modally
	showButton.addEventListener("click", () => {
	  dialog.showModal();
	});

	// "Close" button closes the dialog
	closeButton.addEventListener("click", () => {
	  dialog.close();
	});

}

function updateLinks() {

	try {

		let a_elements = document.querySelectorAll("a");

		if (a_elements) {
			a_elements.forEach( function(a_element) {

				if (a_element.getAttribute("aria-label") === null) {
					a_element.setAttribute("aria-label", "Get more information about " + a_element.innerText);
				}

				if (a_element.getAttribute("tabindex") === null) {
					a_element.setAttribute("tabindex", "0");
				}
				
			});
		}

		// Apple Voiceover Fix
		let br_elements = document.querySelectorAll("br");

		if (br_elements) {
			br_elements.forEach( function(br_element) {

				if (br_element.getAttribute("aria-hidden") === null) {
					br_element.setAttribute("aria-hidden", "true" );
				}
				
			});
		}

	}

	catch( e ) {

		console.log( e );

	}

}

document.addEventListener("DOMContentLoaded", function() {

	// Add Options Modal
	optionsModal();

	// Update links last
	updateLinks();

});