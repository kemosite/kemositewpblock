<?php

$theme_json_raw = file_get_contents( get_template_directory() . '/theme.json' );
$theme_json_decode = json_decode( $theme_json_raw, true );
$theme_colours = $theme_json_decode['settings']['color']['palette'];
// $theme_colour_slugs = array_column( $theme_colours, 'slug');

// --wp--preset--color--custom-cloud-dancer-2026
// custom-cloud-dancer-2026

echo "<pre>";
// print_r( array_search( 'custom-cloud-dancer-2026', $theme_colour_slugs ) );
// print_r( $theme_colours );
echo "</pre>";

echo "<style>";
echo ":root {";

foreach ( $theme_colours as $key => $values ):

echo '--wp--preset--color--' . $values['slug'] . ': ' . $values['color'] . ';';

endforeach;

echo "}";
echo "</style>";

?>

<style>

@import url("<?php echo get_template_directory_uri() . '/admin-css.css' ?>");
@import url("<?php echo get_template_directory_uri() . '/css/variables/kemosite-wordpress-colours.css' ?>");

td.swatch {
	border: .11em solid var(--kemosite-base-black);
	width: 15ch;
}

</style>

<h1>Colour Variations</h1>
<p>From your CSS variable "--kemosite_wordpress_base_primary_colour" defined in "kemosite-wordpress-colours.css", colour variations are proposed here using a variety of colour and neutral schemes. Colours are adjusted for accessible contrast targets. These are targets, that doesn't always mean they'll be 100% accurate. Be sure to confirm with the <a href="https://webaim.org/resources/contrastchecker/" target="_blank" rel="noopener">WebAIM Contrast Checker</a>.</p>

<hr>

<h2>Base Colours</h2>
<table>
	<thead>
		<tr>
			<th>Base Colour</th>
			<th>Base Colour, Foreground</th>
			<th>Base Colour, Background</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_colour)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_foreground_colour)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_background_colour)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Colour Values</h2>
<table>
	<thead>
		<tr>
			<th>Red</th>
			<th>Green</th>
			<th>Blue</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_red_value)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_green_value)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_blue_value)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Reduced Colour Values</h2>
<table>
	<thead>
		<tr>
			<th>Red</th>
			<th>Blue</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_reduced_red)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_reduced_blue)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Greyscale</h2>
<p>Greyscale variation is based on the perceived variations of the base colour option.</p>

<ul>
	<li>Luminance: Based on the perceived brightness of the colour.</li>
	<li>Value: Based on the relative lightness or darkness of the colour.</li>
</ul>

<table>
	<thead>
		<tr>
			<th>Luminance</th>
			<th>Chroma</th>
			<th>Value</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_luminance);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_chroma);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_wordpress_base_primary_value);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Monochromatic</h2>
<p>Monochromatic color schemes focus on a single hue, using variations of saturation and lightness.</p>

<table>
	<thead>
		<tr>
			<th>Base Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_monochromatic_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_monochromatic_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_monochromatic_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_monochromatic_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_monochromatic_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_monochromatic_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_monochromatic_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_monochromatic_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_monochromatic_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_monochromatic_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_monochromatic_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_monochromatic_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Analogous</h2>
<p>Analogous colors consist of a group of three colors that border each other within the color wheel, separated by +/- 30 degree increments.</p>

<h3>+30 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Base Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_p30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_p30_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_p30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_p30_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>-30 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Base Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_analogous_m30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_analogous_m30_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_analogous_m30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_analogous_m30_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<a name="complementary" id="complementary"></a>
<h2>Complimentary / Inverse</h2>
<p>Complementary and inverse colors exist on opposite sides of the color wheel. Inverted colours are also the opposite lightness. Inverted colours are ignored due to similar outcomes as complementary, when adjusted for accessible contrast.</p>

<table>
	<thead>
		<tr>
			<th>Base Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Split-Complementary</h2>
<p>A split-complementary color scheme is one where a primary color is used with the two analogous colors to its complement.</p>

<h3>Complementary, +30 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Base Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_p30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_p30_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_p30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_p30_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>Complementary, -30 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_m30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_m30_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_m30_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_m30_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Triadic</h2>
<p>A triad consists of three colors that are placed 120 degrees from each other on the color wheel</p>

<h3>+120 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_p120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_p120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_p120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_p120_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_p120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_p120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_p120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_p120_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<a name="triatic_m120" id="triatic_m120"></a>
<h3>-120 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Square (Tetradic)</h2>
<p>The square color scheme uses four colors equidistant from each other on the color wheel (90 degrees apart)</p>

<h3>+90 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p90_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p90_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p90_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p90_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>+180 Degrees (Identical to <a href="#complementary">Complementary</a>)</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>-90 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_m90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_m90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_m90_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_m90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_m90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_m90_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_m90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_m90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_m90_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_m90_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_m90_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_m90_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Rectangle (Tetradic)</h2>
<p>The rectangle color scheme uses four colors organized into two complementary color pairs.</p>

<h3>+60 Degrees</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p60_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p60_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_square_p60_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p60_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p60_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_square_p60_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p60_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p60_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_square_p60_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p60_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p60_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_square_p60_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3><a href="#complementary">Complementary</a></h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_complimentary_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_complimentary_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_complimentary_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>Complementary, +60 Degrees (Same as <a href="#triatic_m120">Triatic -120 Degrees</a>)</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-white-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_triadic_m120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_white_neutral_triadic_m120_7);">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cool-black-lab);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_triadic_m120_7);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_3);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_45);">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite_cool_black_neutral_triadic_m120_7);">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Low Chroma RGB</h2>

<p>Low chroma variations of primary RGB colours.</p>

<table>
	<thead>
		<tr>
			<th>R</th>
			<th>G</th>
			<th>B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-red-lc)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-green-lc)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-blue-lc)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Print Colours</h2>

<p>Colours derived from Reference Printing Condition 7, Universal Extra Large, https://www.color.org/chardata/CGATS21-2-CRPC7.xalter</p>

<h3>CMYK</h3>

<table>
	<thead>
		<tr>
			<th>C</th>
			<th>M</th>
			<th>Y</th>
			<th>K</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-cyan-lab)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-magenta-lab)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-yellow-lab)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-key-lab)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<h3>RGB</h3>

<table>
	<thead>
		<tr>
			<th>R</th>
			<th>G</th>
			<th>B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-red-lab)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-green-lab)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-blue-lab)">&nbsp;</td>
		</tr>
		<tr>
			<td class="swatch" style="background-color: var(--kemosite-red-rgb)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-green-rgb)">&nbsp;</td>
			<td class="swatch" style="background-color: var(--kemosite-blue-rgb)">&nbsp;</td>
		</tr>
	</tbody>
</table>

<hr>
