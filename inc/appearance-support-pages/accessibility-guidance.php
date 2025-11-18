<style>

td {
	padding: 1ex 1ch;
	width: 59ch;
}

ul {
	list-style:disc;
	list-style-position: inside;
}

@import url("<?php echo get_template_directory_uri(); ?>/admin-css.css");

</style>

<h1>Accessibility Guidance</h1>

<hr>

<h2>Overview</h2>

<p>Where possible, this theme will automatically adjust colours, font sizes, and generate appropriate ARIA attributes for assitive devices. However, making content accessible requires more than automation. It also requires thoughtful delivery of content.</p>

<p>The guidance offered here are a consolidation of WAI guidance from various sources on the internet. The form of "Do" and "Don't" is inspired from accessibility guidance from the UK government.</p>

<h2>Designing for users with anxiety</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>give users enough time to complete an action</li>
				<li>explain what will happen after completing a service</li>
				<li>make important information clear</li>
				<li>give users the support they need to complete a service</li>
				<li>let users check their answers before they submit them</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>rush users or set impractical time limits</li>
				<li>leave users confused about next steps or timeframes</li>
				<li>leave users uncertain about the consequences of their actions</li>
				<li>make support or help hard to access</li>
				<li>leave users questioning what answers they gave</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>Dyslexia</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Use images and diagrams to support text</li>
				<li>Align text to the left and keep a consistent layout</li>
				<li>Consider producing materials in other formats, for example, audio or video</li>
				<li>Keep content short, clear, and simple</li>
				<li>Let users change the contrast between background and text</li>
				<li>Dyslexia font: <a href="https://antijingoist.itch.io/opendyslexic">https://antijingoist.itch.io/opendyslexic</a></li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Use large blocks of heavy text</li>
				<li>Underline words, use italics, or capitalize text</li>
				<li>Force users to remember things from previous pages (give reminders and prompts)</li>
				<li>Rely on accurate spelling (use autocorrect, or provide suggestions)</li>
				<li>Put too much information in one place.</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>Dyscalculia</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Round numbers to the nearest whole number</li>
				<li>Leave space around numbers</li>
				<li>Fill in the information you already have.</li>
				<li>Use sentences to add context around numbers</li>
				<li>Let people include spaces when entering numbers</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Use decimals unless it's money</li>
				<li>Overwhelm people with too much content</li>
				<li>Expect users to repeat or remember numbers.</li>
				<li>Use tables and grids without explaining what the numbers mean</li>
				<li>Rush users to enter a number manually</li>
				<li>Force people to enter a number or do a sum to verify themselves</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>Autism</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Reduce the brightness and luminance of colours.</li>
				<li>Use natural, earthy or muted colours.</li>
				<li>Avoid extreme colour contrast</li>
				<li>Write in plain English</li>
				<li>Use simple sentences and bullets</li>
				<li>Make buttons descriptive</li>
				<li>Build simple and consistent layouts</li>
				<li>Allow personalization of font size, contrast, and colour selection (for colour blindness)</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Use bright, contrasting colours</li>
				<li>Use figures of speech and idioms</li>
				<li>Create a wall of text (full-justified)</li>
				<li>Make buttoms vague and unpredictable</li>
				<li>Build complex and cluttered layouts</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>ADHD</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Deliver content in more than one way, such as by text-to-speech or by video;</li>
				<li>Provide easily-understood content, such as text written using plain-language standards;</li>
				<li>Focus attention on important content;</li>
				<li>Minimize distractions, such as unnecessary content or advertisements;</li>
				<li>Provide consistent web page layout and navigation;</li>
				<li>Incorporate familiar elements, such as underlined links that are blue when not visited and purple when visited;</li>
				<li>Divide processes into logical, essential steps with progress indicators;</li>
				<li>Make website authentication as easy as possible without compromising security; and</li>
				<li>Make forms easy to complete, such as with clear error messages and error recovery.</li>
				</ul>
			</td>
			<td>
			</td>
		</tr>
	</tbody>
</table>

<h2>Screen Readers</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Describe images and provide transcripts for video</li>
				<li>Use linear, logical structured HTML content (CSS manages layout)</li>
				<li>Build for keyboard use only.</li>
				<li>Write descriptive links and headings</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Only show information in an image or video</li>
				<li>Spread content all over a page.</li>
				<li>Rely on text size and placement (CSS) for structure.</li>
				<li>Force mouse or screen use.</li>
				<li>Write uninformative links and headings.</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>Low Vision</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Use good colour contrast and a readable font size</li>
				<li>Publish all information on web pages</li>
				<li>Use a combination of colour, shapes, and text</li>
				<li>Follow a linear, logical layout</li>
				<li>Put buttons and notifications on context</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Use low colour contrast and small font size</li>
				<li>Bury information in downloads</li>
				<li>Only use colour to convey meaning</li>
				<li>Spread content all over a page</li>
				<li>Separate actions from their context</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<h2>Physical or Motor Disabilities</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Make large, clickable actions</li>
				<li>Give form fields space</li>
				<li>Design for keyboard or speech use only</li>
				<li>Design with mobile and touchscreen in mind</li>
				<li>Provide shortcuts</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Demand precision</li>
				<li>Bunch interactions together</li>
				<li>Make dynamic content that requires a lot of mouse movement</li>
				<li>Have short timeout windows</li>
				<li>Tire users with lots of typing and scrolling</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>


<h2>Deaf or Hard of Hearing</h2>
<table>
	<thead>
		<tr>
			<th>Do</th>
			<th>Don't</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
				<li>Write in plain language</li>
				<li>Use subtitles or provide transcripts for videos</li>
				<li>Use a linear, logical layout</li>
				<li>Break up content with sub-headings, images and videos</li>
				<li>Let users request an interpreter for appointments</li>
				</ul>
			</td>
			<td>
				<ul>
				<li>Use complicated words or figures of speech</li>
				<li>Put content in audio or video only.</li>
				<li>Make complex layouts and menus</li>
				<li>Make users read long blocks of content.</li>
				<li>Don't make telephone the only means of contact with users</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<p><a href="<?php echo admin_url( 'themes.php?page=kemosite-howtouse-description', 'https' ); ?>">How To Use This Theme</a></p>
