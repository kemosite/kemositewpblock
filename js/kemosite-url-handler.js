window.addEventListener("DOMContentLoaded", function() {

	try {

	    // FIND ALL THE LINKS
	    document.querySelectorAll("a").forEach( function(link) {

	    	// Add a listener to all links
			link.addEventListener("click", function(event) {

				
				console.log( "Event" );
				console.log( event );
				console.log( event.srcElement.href );


				// Prevent default behaviour -- namely clicking
				event.preventDefault();

				// Get link properties.
				if ( event.srcElement.href ) {

					let url = event.srcElement.href;

					// Look for local link
					if (url.substr(0,1) == "#") {
						let local_link = document.querySelector("a[name='"+url.substr(1)+"']");
						window.scrollTo({
						  top: local_link.offsetTop,
						  behavior: 'smooth'
						});

					// link away
					} else { 
						document.location.href=url;
					}

				}

			});
	    });

	}

	catch(e) {

		console.log( e );

	}

});