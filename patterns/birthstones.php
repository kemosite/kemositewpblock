<?php
/**
 * Title: Birthstones
 * Slug: kemositewpblock/birthstones
 * Categories: featured
 */
?>

<style>

:root {
	--stone-aquamarine: #00DFFF;
	--stone-tourmaline: #F53195;
	--stone-citine: #EF9A00;
}

div.birthstones {}

.birthstones .stone {
	width: 4em;
	height: 4em;
}

.stone .aquamarine { background-color: var(--stone-aquamarine); } /* March */
.stone .tourmaline { background-color: var(--stone-tourmaline); } /* October */
.stone .citrine { background-color: var(--stone-citine); } /* November */

</style>

<div class="birthstones">

	<div class="stone aquamarine"></div>
	<div class="stone aquamarine"></div>
	<div class="stone tourmaline"></div>
	<div class="stone citrine"></div>
	<div class="stone citrine"></div>

</div>