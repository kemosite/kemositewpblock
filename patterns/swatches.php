<?php
/**
 * Title: Swatches
 * Slug: kemositewpblock/swatches
 * Categories: featured
 */
?>

<style>

div.colour-swatches {
	position: fixed;
	right: 0;
	bottom: 0;
	display: none;
}

.colour-swatches .colour-swatches-gang {
	display: flex;
	flex-direction: row;
	/* flex-direction: column */
	flex-wrap: nowrap;
	justify-content: flex-end;
	align-items: flex-end;
	align-content: flex-end;
	gap: 0;
}

.colour-swatches-gang .swatch {
	width: 3rem;
	height: 3rem;
	border: 1px var(--kemosite-cool-black-lab) solid;
}

</style>

<div class="colour-swatches">

<!-- Theme Colour Setting Test -->
<div class="colour-swatches-gang">
<div class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</div>
<div class="swatch swatch-kemosite-wordpress-base-primary-colour" style="background-color: var(--kemosite_wordpress_base_primary_colour);">&nbsp;</div>
<div class="swatch swatch-kemosite-wordpress-secondary-colour" style="background-color: var(--kemosite_wordpress_secondary_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_secondary_hover_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_body_background_color);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_placeholder_color);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_selection_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_success_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_success_hover_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_warning_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_warning_hover_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_alert_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_component_alert_hover_colour);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_header_bg_color);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_main_content_bg_color_light_mode);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_main_content_bg_color_dark_mode);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite_wordpress_footer_bg_color);">&nbsp;</div>
</div>

<!-- Lab CMYK Colour Test -->
<div class="colour-swatches-gang">
<div class="swatch" style="background-color: var(--kemosite-cyan-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-magenta-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-yellow-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-key-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-blue-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-green-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-red-lab);">&nbsp;</div>
</div>

<!-- RGB Variable Colour Test -->
<div class="colour-swatches-gang">
<div class="swatch" style="background-color: var(--kemosite-cool-black-minue-blue-lab);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-blue-rgb);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-green-rgb);">&nbsp;</div>
<div class="swatch" style="background-color: var(--kemosite-red-rgb);">&nbsp;</div>
</div>

<!--
<div class="colour-swatches-gang">
<div class="swatch swatch-test-value" style="background-color: var(--kemosite_wordpress_body_background_color_luminance);">&nbsp;</div>
</div>
-->

</div>

<script>

window.addEventListener("DOMContentLoaded", function() {
	
	/*
	document.querySelectorAll(".swatch-test-value").forEach( test => {
		console.log( "Colour Swatch Test:" );
		let bgColour = getComputedStyle( test ).getPropertyValue("background-color");
		console.log( bgColour );
		let re = /(?<=lab\()\d+(\.\d+)?/gmi;
		let reArray = re.exec( bgColour );
		console.log( reArray[0] );
	});
	*/
	
});

</script>
