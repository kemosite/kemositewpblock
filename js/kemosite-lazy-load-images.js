window.addEventListener("DOMContentLoaded", function() {

	let imageObserver;
	let lazyAssetObserver;

	try {

		if ("IntersectionObserver" in window) {

			imageObserver = new IntersectionObserver( function( entries, observer ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						let image = entry.target;
						image.src = image.dataset.src;
						image.classList.remove("lazy");
						imageObserver.unobserve(image);
					}
				});
			});

			lazyAssetObserver = new IntersectionObserver( function( entries, observer ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						let asset = entry.target;
						asset.classList.remove("lazy");
						lazyAssetObserver.unobserve( asset );
					}
				});
			});

		}

	    // FIND ALL THE IMAGES
	    document.querySelectorAll("img").forEach( img => {

	    	if ('loading' in HTMLImageElement.prototype) {
				
				img.loading = "lazy";

			} else if ( imageObserver ) {

				img.dataset.src = img.src;
				img.src = "";
				imageObserver.observe( img );

			}

	    } );

	     document.querySelectorAll(".lazy").forEach( lazy_asset => {

	    	if ( lazyAssetObserver ) {

				lazyAssetObserver.observe( lazy_asset );

			}

	    } );

	}

	catch(e) {

		console.log( e );

	}

});