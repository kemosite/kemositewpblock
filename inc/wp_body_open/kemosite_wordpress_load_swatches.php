<?php

/**
 * [CREATE SHADOW DOM]
 */

function kemosite_wordpress_load_swatches() { ?>

<div hidden>
<!-- <div> -->

<style>

table.swatches :is( td, th ) {
	border: 1px solid;
	white-space: nowrap;
}

div#optotypes-test {
	font-size: 1rem;
}

div.body.test {
	font-size: var(--kemosite-font-size);
	display: table;
	line-height: 100%;
	margin: 0;
	padding: 0;
}

div.body.test_100 { font-weight: 100; }
div.body.test_200 { font-weight: 200; }
div.body.test_300 { font-weight: 300; }
div.body.test_400 { font-weight: 400; }
div.body.test_500 { font-weight: 500; }
div.body.test_600 { font-weight: 600; }
div.body.test_700 { font-weight: 700; }
div.body.test_800 { font-weight: 800; }
div.body.test_900 { font-weight: 900; }
div.body.test_950 { font-weight: 950; }

</style>

<h3>Base Primary Colour and Chroma Tests</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_base_primary_colour</td><td id="swatch-kemosite-wordpress-base-primary-colour" style="background-color: var(--kemosite_wordpress_base_primary_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_base_background_colour</td><td style="background-color: var(--kemosite_wordpress_base_background_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_base_foreground_colour</td><td style="background-color: var(--kemosite_wordpress_base_foreground_colour);"></td></tr>
	</tbody>
</table>

<h3>Reduced Chroma Primary Colour Tests</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_base_primary_reduced_red</td><td style="background-color: var(--kemosite_wordpress_base_primary_reduced_red);"></td></tr>
		<tr><td>--kemosite_wordpress_base_primary_reduced_blue</td><td style="background-color: var(--kemosite_wordpress_base_primary_reduced_blue);"></td></tr>
	</tbody>
</table>

<h3>Colour Value Tests</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_base_primary_red_value</td><td style="background-color: var(--kemosite_wordpress_base_primary_red_value);"></td></tr>
		<tr><td>--kemosite_wordpress_base_primary_green_value</td><td style="background-color: var(--kemosite_wordpress_base_primary_green_value);"></td></tr>
		<tr><td>--kemosite_wordpress_base_primary_blue_value</td><td style="background-color: var(--kemosite_wordpress_base_primary_blue_value);"></td></tr>
	</tbody>
</table>

<h3>Greyscale Tests</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_base_primary_luminance</td><td style="background-color: var(--kemosite_wordpress_base_primary_luminance);"></td></tr>
		<tr><td>--kemosite_wordpress_base_primary_value</td><td style="background-color: var(--kemosite_wordpress_base_primary_value);"></td></tr>
	</tbody>
</table>

<h3>CGATS21-2-CRPC7.xalter</h3>
<table class="swatches">
	<thead>
	
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite-cool-white-lab</td><td style="background-color: var(--kemosite-cool-white-lab);"></td></tr>
		<tr><td>--kemosite-cool-black-lab</td><td style="background-color: var(--kemosite-cool-black-lab);"></td></tr>
	</tbody>
</table>

<h3>Monochromatic</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_monochromatic_3</td><td style="background-color: var(--kemosite_cool_white_monochromatic_3);"></td></tr>
		<tr><td>--kemosite_cool_white_monochromatic_45</td><td style="background-color: var(--kemosite_cool_white_monochromatic_45);"></td></tr>
		<tr><td>--kemosite_cool_white_monochromatic_7</td><td style="background-color: var(--kemosite_cool_white_monochromatic_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_monochromatic_3</td><td style="background-color: var(--kemosite_cool_white_neutral_monochromatic_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_monochromatic_45</td><td style="background-color: var(--kemosite_cool_white_neutral_monochromatic_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_monochromatic_7</td><td style="background-color: var(--kemosite_cool_white_neutral_monochromatic_7);"></td></tr>
		<tr><td>--kemosite_cool_black_monochromatic_3</td><td style="background-color: var(--kemosite_cool_black_monochromatic_3);"></td></tr>
		<tr><td>--kemosite_cool_black_monochromatic_45</td><td style="background-color: var(--kemosite_cool_black_monochromatic_45);"></td></tr>
		<tr><td>--kemosite_cool_black_monochromatic_7</td><td style="background-color: var(--kemosite_cool_black_monochromatic_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_monochromatic_3</td><td style="background-color: var(--kemosite_cool_black_neutral_monochromatic_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_monochromatic_45</td><td style="background-color: var(--kemosite_cool_black_neutral_monochromatic_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_monochromatic_7</td><td style="background-color: var(--kemosite_cool_black_neutral_monochromatic_7);"></td></tr>
	</tbody>
</table>

<h3>Analogous, +30 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_analogous_p30_3</td><td style="background-color: var(--kemosite_cool_white_analogous_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_analogous_p30_45</td><td style="background-color: var(--kemosite_cool_white_analogous_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_analogous_p30_7</td><td style="background-color: var(--kemosite_cool_white_analogous_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_p30_3</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_p30_45</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_p30_7</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_p30_3</td><td style="background-color: var(--kemosite_cool_black_analogous_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_p30_45</td><td style="background-color: var(--kemosite_cool_black_analogous_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_p30_7</td><td style="background-color: var(--kemosite_cool_black_analogous_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_p30_3</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_p30_45</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_p30_7</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_7);"></td></tr>
	</tbody>
</table>

<h3>Analogous, -30 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_analogous_m30_3</td><td style="background-color: var(--kemosite_cool_white_analogous_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_analogous_m30_45</td><td style="background-color: var(--kemosite_cool_white_analogous_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_analogous_m30_7</td><td style="background-color: var(--kemosite_cool_white_analogous_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_m30_3</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_m30_45</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_analogous_m30_7</td><td style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_m30_3</td><td style="background-color: var(--kemosite_cool_black_analogous_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_m30_45</td><td style="background-color: var(--kemosite_cool_black_analogous_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_analogous_m30_7</td><td style="background-color: var(--kemosite_cool_black_analogous_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_m30_3</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_m30_45</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_analogous_m30_7</td><td style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_7);"></td></tr>
	</tbody>
</table>

<h3>Complimentary, +/-180 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_complimentary_3</td><td style="background-color: var(--kemosite_cool_white_complimentary_3);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_45</td><td style="background-color: var(--kemosite_cool_white_complimentary_45);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_7</td><td style="background-color: var(--kemosite_cool_white_complimentary_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_3</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_45</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_7</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_7);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_3</td><td style="background-color: var(--kemosite_cool_black_complimentary_3);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_45</td><td style="background-color: var(--kemosite_cool_black_complimentary_45);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_7</td><td style="background-color: var(--kemosite_cool_black_complimentary_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_3</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_45</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_7</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_7);"></td></tr>
	</tbody>
</table>

<h3>Complimentary, +30 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_complimentary_p30_3</td><td style="background-color: var(--kemosite_cool_white_complimentary_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_p30_45</td><td style="background-color: var(--kemosite_cool_white_complimentary_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_p30_7</td><td style="background-color: var(--kemosite_cool_white_complimentary_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_p30_3</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_p30_45</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_p30_7</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_p30_3</td><td style="background-color: var(--kemosite_cool_black_complimentary_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_p30_45</td><td style="background-color: var(--kemosite_cool_black_complimentary_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_p30_7</td><td style="background-color: var(--kemosite_cool_black_complimentary_p30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_p30_3</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_p30_45</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_p30_7</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_7);"></td></tr>
	</tbody>
</table>

<h3>Complimentary, -30 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_complimentary_m30_3</td><td style="background-color: var(--kemosite_cool_white_complimentary_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_m30_45</td><td style="background-color: var(--kemosite_cool_white_complimentary_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_complimentary_m30_7</td><td style="background-color: var(--kemosite_cool_white_complimentary_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_m30_3</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_m30_45</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_complimentary_m30_7</td><td style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_m30_3</td><td style="background-color: var(--kemosite_cool_black_complimentary_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_m30_45</td><td style="background-color: var(--kemosite_cool_black_complimentary_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_complimentary_m30_7</td><td style="background-color: var(--kemosite_cool_black_complimentary_m30_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_m30_3</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_m30_45</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_complimentary_m30_7</td><td style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_7);"></td></tr>
	</tbody>
</table>

<h3>Triadic, +120 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_triadic_p120_3</td><td style="background-color: var(--kemosite_cool_white_triadic_p120_3);"></td></tr>
		<tr><td>--kemosite_cool_white_triadic_p120_45</td><td style="background-color: var(--kemosite_cool_white_triadic_p120_45);"></td></tr>
		<tr><td>--kemosite_cool_white_triadic_p120_7</td><td style="background-color: var(--kemosite_cool_white_triadic_p120_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_p120_3</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_p120_45</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_p120_7</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_7);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_p120_3</td><td style="background-color: var(--kemosite_cool_black_triadic_p120_3);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_p120_45</td><td style="background-color: var(--kemosite_cool_black_triadic_p120_45);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_p120_7</td><td style="background-color: var(--kemosite_cool_black_triadic_p120_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_p120_3</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_p120_45</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_p120_7</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_7);"></td></tr>
	</tbody>
</table>

<h3>Triadic, -120 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_triadic_m120_3</td><td style="background-color: var(--kemosite_cool_white_triadic_m120_3);"></td></tr>
		<tr><td>--kemosite_cool_white_triadic_m120_45</td><td style="background-color: var(--kemosite_cool_white_triadic_m120_45);"></td></tr>
		<tr><td>--kemosite_cool_white_triadic_m120_7</td><td style="background-color: var(--kemosite_cool_white_triadic_m120_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_m120_3</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_m120_45</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_triadic_m120_7</td><td style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_7);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_m120_3</td><td style="background-color: var(--kemosite_cool_black_triadic_m120_3);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_m120_45</td><td style="background-color: var(--kemosite_cool_black_triadic_m120_45);"></td></tr>
		<tr><td>--kemosite_cool_black_triadic_m120_7</td><td style="background-color: var(--kemosite_cool_black_triadic_m120_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_m120_3</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_m120_45</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_triadic_m120_7</td><td style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_7);"></td></tr>
	</tbody>
</table>

<h3>Square, +90 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_square_p90_33</td><td style="background-color: var(--kemosite_cool_white_square_p90_3);"></td></tr>
		<tr><td>--kemosite_cool_white_square_p90_45</td><td style="background-color: var(--kemosite_cool_white_square_p90_45);"></td></tr>
		<tr><td>--kemosite_cool_white_square_p90_7</td><td style="background-color: var(--kemosite_cool_white_square_p90_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p90_3</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p90_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p90_45</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p90_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p90_7</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p90_7);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p90_3</td><td style="background-color: var(--kemosite_cool_black_square_p90_3);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p90_45</td><td style="background-color: var(--kemosite_cool_black_square_p90_45);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p90_7</td><td style="background-color: var(--kemosite_cool_black_square_p90_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p90_3</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p90_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p90_45</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p90_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p90_7</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p90_7);"></td></tr>
	</tbody>
</table>

<h3>Square, -90 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_square_m90_33</td><td style="background-color: var(--kemosite_cool_white_square_m90_3);"></td></tr>
		<tr><td>--kemosite_cool_white_square_m90_45</td><td style="background-color: var(--kemosite_cool_white_square_m90_45);"></td></tr>
		<tr><td>--kemosite_cool_white_square_m90_7</td><td style="background-color: var(--kemosite_cool_white_square_m90_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_m90_3</td><td style="background-color: var(--kemosite_cool_white_neutral_square_m90_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_m90_45</td><td style="background-color: var(--kemosite_cool_white_neutral_square_m90_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_m90_7</td><td style="background-color: var(--kemosite_cool_white_neutral_square_m90_7);"></td></tr>
		<tr><td>--kemosite_cool_black_square_m90_3</td><td style="background-color: var(--kemosite_cool_black_square_m90_3);"></td></tr>
		<tr><td>--kemosite_cool_black_square_m90_45</td><td style="background-color: var(--kemosite_cool_black_square_m90_45);"></td></tr>
		<tr><td>--kemosite_cool_black_square_m90_7</td><td style="background-color: var(--kemosite_cool_black_square_m90_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_m90_3</td><td style="background-color: var(--kemosite_cool_black_neutral_square_m90_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_m90_45</td><td style="background-color: var(--kemosite_cool_black_neutral_square_m90_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_m90_7</td><td style="background-color: var(--kemosite_cool_black_neutral_square_m90_7);"></td></tr>
	</tbody>
</table>

<h3>Square, +60 Degrees</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_cool_white_square_p60_33</td><td style="background-color: var(--kemosite_cool_white_square_p60_3);"></td></tr>
		<tr><td>--kemosite_cool_white_square_p60_45</td><td style="background-color: var(--kemosite_cool_white_square_p60_45);"></td></tr>
		<tr><td>--kemosite_cool_white_square_p60_7</td><td style="background-color: var(--kemosite_cool_white_square_p60_7);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p60_3</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p60_3);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p60_45</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p60_45);"></td></tr>
		<tr><td>--kemosite_cool_white_neutral_square_p60_7</td><td style="background-color: var(--kemosite_cool_white_neutral_square_p60_7);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p60_3</td><td style="background-color: var(--kemosite_cool_black_square_p60_3);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p60_45</td><td style="background-color: var(--kemosite_cool_black_square_p60_45);"></td></tr>
		<tr><td>--kemosite_cool_black_square_p60_7</td><td style="background-color: var(--kemosite_cool_black_square_p60_7);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p60_3</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p60_3);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p60_45</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p60_45);"></td></tr>
		<tr><td>--kemosite_cool_black_neutral_square_p60_7</td><td style="background-color: var(--kemosite_cool_black_neutral_square_p60_7);"></td></tr>
	</tbody>
</table>

<h3>Theme Colour Setting Tests</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_body_background_color</td><td style="background-color: var(--kemosite_wordpress_body_background_color);"></td></tr>
		<tr><td>--kemosite_wordpress_body_color</td><td style="background-color: var(--kemosite_wordpress_body_color);"></td></tr>
		<tr><td>--kemosite_wordpress_secondary_colour</td><td id="swatch-kemosite-wordpress-secondary-colour" style="background-color: var(--kemosite_wordpress_secondary_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_secondary_hover_colour</td><td style="background-color: var(--kemosite_wordpress_secondary_hover_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_component_colour</td><td style="background-color: var(--kemosite_wordpress_component_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_placeholder_color</td><td style="background-color: var(--kemosite_wordpress_placeholder_color);"></td></tr>
		<tr><td>--kemosite_wordpress_selection_colour</td><td style="background-color: var(--kemosite_wordpress_selection_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_component_success_colour</td><td style="background-color: var(--kemosite_wordpress_component_success_colour);"></td></tr>

		<tr><td>--kemosite_wordpress_component_success_hover_colour</td><td style="background-color: var(--kemosite_wordpress_component_success_hover_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_secondary_hover_colour</td><td style="background-color: var(--kemosite_wordpress_component_warning_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_component_warning_hover_colour</td><td style="background-color: var(--kemosite_wordpress_component_warning_hover_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_component_alert_colour</td><td style="background-color: var(--kemosite_wordpress_component_alert_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_component_alert_hover_colour</td><td style="background-color: var(--kemosite_wordpress_component_alert_hover_colour);"></td></tr>
		<tr><td>--kemosite_wordpress_header_bg_color</td><td style="background-color: var(--kemosite_wordpress_header_bg_color);"></td></tr>
		<tr><td>--kemosite_wordpress_main_content_bg_color_light_mode</td><td style="background-color: var(--kemosite_wordpress_main_content_bg_color_light_mode);"></td></tr>
		<tr><td>--kemosite_wordpress_main_content_bg_color_dark_mode</td><td style="background-color: var(--kemosite_wordpress_main_content_bg_color_dark_mode);"></td></tr>
		<tr><td>--kemosite_wordpress_footer_bg_color</td><td style="background-color: var(--kemosite_wordpress_footer_bg_color);"></td></tr>
	</tbody>
</table>

<h3>Lab CMYK Colour Test</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite-cyan-lab</td><td style="background-color: var(--kemosite-cyan-lab);"></td></tr>
		<tr><td>--kemosite-magenta-lab</td><td style="background-color: var(--kemosite-magenta-lab);"></td></tr>
		<tr><td>--kemosite-yellow-lab</td><td style="background-color: var(--kemosite-yellow-lab);"></td></tr>
		<tr><td>--kemosite-key-lab</td><td style="background-color: var(--kemosite-key-lab);"></td></tr>
		<tr><td>--kemosite-blue-lab</td><td style="background-color: var(--kemosite-blue-lab);"></td></tr>
		<tr><td>--kemosite-green-lab</td><td style="background-color: var(--kemosite-green-lab);"></td></tr>
		<tr><td>--kemosite-red-lab</td><td style="background-color: var(--kemosite-red-lab);"></td></tr>
	</tbody>
</table>

<h3>RGB Variable Colour Test</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite-cool-black-minus-blue-lab</td><td style="background-color: var(--kemosite-cool-black-minus-blue-lab);"></td></tr>
		<tr><td>--kemosite-blue-rgb</td><td style="background-color: var(--kemosite-blue-rgb);"></td></tr>
		<tr><td>--kemosite-green-rgb</td><td style="background-color: var(--kemosite-green-rgb);"></td></tr>
		<tr><td>--kemosite-red-rgb</td><td style="background-color: var(--kemosite-red-rgb);"></td></tr>
	</tbody>
</table>

<h3>Reduced Chroma RGB Variable Colour Test</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite-blue-lc</td><td style="background-color: var(--kemosite-blue-lc);"></td></tr>
		<tr><td>--kemosite-green-lc</td><td style="background-color: var(--kemosite-green-lc);"></td></tr>
		<tr><td>--kemosite-red-lc</td><td style="background-color: var(--kemosite-red-lc);"></td></tr>
	</tbody>
</table>

<h3>kemosite_wordpress_body_background_color_luminance</h3>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody>
		<tr><td>--kemosite_wordpress_body_background_color_luminance</td><td style="background-color: var(--kemosite_wordpress_body_background_color_luminance);"></td></tr>
	</tbody>
</table>

<h3>Typography</h3>

<h4>Optician Sans Optotypes</h4>
<div class="font-optician-sans" id="optotypes-test">CDHKNORSVZ</div>

<h4>Font Tests</h4>
<table class="swatches">
	<thead>
		<tr><th>Name</th><th>Value</th></tr>
	</thead>
	<tbody style="white-space: nowrap;">
		<tr><td>--kemosite-base-font-size</td><td style="font-size: var(--kemosite-base-font-size);">--kemosite-base-font-size</td></tr>
		<tr><td>--kemosite-base-x-height-ratio</td><td style="font-size: var(--kemosite-base-x-height-ratio);">1ex / 1rem</td></tr>
		<tr><td>--kemosite-font-size</td><td style="font-size: var(--kemosite-font-size);">--kemosite-font-size</td></tr>
		<tr><td>H1</td><td style="font-size: var(--kemosite-h1-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
		<tr><td>H2</td><td style="font-size: var(--kemosite-h2-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
		<tr><td>H3</td><td style="font-size: var(--kemosite-h3-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
		<tr><td>H4</td><td style="font-size: var(--kemosite-h4-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
		<tr><td>H5</td><td style="font-size: var(--kemosite-h5-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
		<tr><td>H6</td><td style="font-size: var(--kemosite-h6-font-size);">The quick brown fox jumps over the lazy dog</td></tr>
	</tbody>
</table>

<div class="body test test_100">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_200">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_300">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_400">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_500">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_600">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_700">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_800">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_900">The quick brown fox jumps over the lazy dog</div>
<div class="body test test_950">The quick brown fox jumps over the lazy dog</div>

</div>

<?php } ?>
