let kemosite_typography_orphans = new function() {	
	
	this.recursive_locate_text = function(node) {
		
		if (node.childNodes && node.childNodes.length > 0 && node.childNodes[0].nodeName !== "#text") {
			return kemosite_typography_orphans.recursive_locate_text(node.childNodes[0]);
		}

		else if (node.childNodes && node.childNodes.length > 0 && node.childNodes[0].nodeName == "#text") {
			// return node.childNodes[0].nodeValue;
			return node;
		} 

		// We've got nuthin'.
		else {
			return node;
		}		

	};
	
	this.init = function() {
		
		/*
		Scan for sentences first.
		Count words in sentence.
		If words <= 3, don't apply orphan control.
		Only apply if screen width > 39ch
		*/

		if (window.matchMedia("(min-width: 39ch)").matches) {

		    /* [Locate elements for typesetter] */
		    let orphan_control_elements = document.querySelectorAll(
		     	".kemosite-grid-layout h1, "+
		     	".kemosite-grid-layout h2, "+
		     	".kemosite-grid-layout h3, "+
		     	".kemosite-grid-layout h4, "+
		     	".kemosite-grid-layout h5, "+
		     	".kemosite-grid-layout h6, "+
		     	".kemosite-grid-layout p," +
		     	".kemosite-grid-layout td," +
		     	".kemosite-grid-layout figcaption," +
		     	".kemosite-grid-layout li"
		     );

		    let punctuation_array = new Array( "!", ".", ",", "?", ":", ";", "—", "–" );
		    let punctuation_regex_string = punctuation_array.join("");
		    let punctuation_regex = RegExp( '[(' + punctuation_regex_string + ')]', 'g' );

		    for (let i = 0; i < orphan_control_elements.length; i++) {

		    	let orphan_control_element = kemosite_typography_orphans.recursive_locate_text( orphan_control_elements[i] );

				if ( orphan_control_element.childNodes && orphan_control_element.childNodes.length > 0 && orphan_control_element.firstChild.nodeValue.includes(" ") && orphan_control_element.lastChild.nodeValue.includes(" ") ) {

		    		let orphan_control_element_firstchild_string = orphan_control_element.firstChild.nodeValue.toString();
		    		let orphan_control_element_lastchild_string = orphan_control_element.lastChild.nodeValue.toString();
		    		let orphan_control_element_length = orphan_control_element.childNodes.length - 1;

		    		let firstchild_eq_lastchild = ( orphan_control_element_firstchild_string == orphan_control_element_lastchild_string ) ? true : false;

		    		// evaluate performing REGEX search functions on [orphan_control_element_string]
		    		// https://css-tricks.com/build-word-counter-app/

		    		// let regex_words = orphan_control_element_string.match(/\b[-?(\w+)?]+\b/gi);
					let firstchild_regex_punctuation_match_array = orphan_control_element_firstchild_string.match( punctuation_regex );
					let firstchild_regex_punctuation_split_array = orphan_control_element_firstchild_string.split( punctuation_regex );

					if( firstchild_eq_lastchild == true ) {
						let lastchild_regex_punctuation_match_array = firstchild_regex_punctuation_match_array;
						let lastchild_regex_punctuation_split_array = firstchild_regex_punctuation_split_array;
					} else {
						let lastchild_regex_punctuation_match_array = orphan_control_element_lastchild_string.match( punctuation_regex );
						let lastchild_regex_punctuation_split_array = orphan_control_element_lastchild_string.split( punctuation_regex );
					}

					let firstchild_orphan_control_reassemble_array = new Array();
					let lastchild_orphan_control_reassemble_array = new Array();

					/*
					** [Process First Child] **
					*/

					if ( firstchild_regex_punctuation_match_array !== null && firstchild_regex_punctuation_match_array.length > 0 ) {

						for (let ii = 0; ii < firstchild_regex_punctuation_split_array.length; ii++) {

							let firstchild_regex_words_match_count = new RegExp( /\b(\p{L}+?)\b/, 'giu');							
							let firstchild_words_match_count = firstchild_regex_punctuation_split_array[ii].match( firstchild_regex_words_match_count );

							// Start and end of sentences
							let firstchild_regex_start_of_sentence = new RegExp(/^(\s*)([\p{L}]*['"‘’“”]*[\p{L}]*)(?:\s)([\p{L}]*['"‘’“”]*[\p{L}]*)/, 'giu');
							let firstchild_regex_end_of_sentence = new RegExp(/([\p{L}]*['"‘’“”]*[\p{L}]*)(?:\s)([\p{L}]*['"‘’“”]*[\p{L}]*)$/, 'giu');
							firstchild_regex_punctuation_split_array[ii] = firstchild_regex_punctuation_split_array[ii].replace("\n", ""); // Remove evil line breaks!

							if ( firstchild_words_match_count !== null && firstchild_words_match_count.length == 3 ) {

								let firstchild_replace_end_of_sentence = firstchild_regex_punctuation_split_array[ii].replace( firstchild_regex_end_of_sentence, "$1&nbsp;$2");
								firstchild_regex_punctuation_split_array[ii] = firstchild_replace_end_of_sentence;
								
							} else if ( firstchild_words_match_count !== null && firstchild_words_match_count.length > 3 ) {							

								let firstchild_replace_start_of_sentence = firstchild_regex_punctuation_split_array[ii].replace( firstchild_regex_start_of_sentence, "$1$2&nbsp;$3" );
								let firstchild_replace_end_of_sentence = firstchild_replace_start_of_sentence.replace( firstchild_regex_end_of_sentence, "$1&nbsp;$2" );
															
								// regex_punctuation_split_array[ii] = regex_punctuation_split_array[ii];
								// regex_punctuation_split_array[ii] = replace_start_of_sentence;
								firstchild_regex_punctuation_split_array[ii] = firstchild_replace_end_of_sentence;

							}

							firstchild_orphan_control_reassemble_array[ii] = ( firstchild_regex_punctuation_match_array[ii] ) ? firstchild_regex_punctuation_split_array[ii] + firstchild_regex_punctuation_match_array[ii] : firstchild_regex_punctuation_split_array[ii];

						}

						let firstchild_orphan_control_element_string = firstchild_orphan_control_reassemble_array.join("");
						orphan_control_element.childNodes[0].nodeValue = firstchild_orphan_control_element_string;

					}

					/*
					** [Process Last Child] **
					*/

					if ( lastchild_regex_punctuation_match_array !== null && lastchild_regex_punctuation_match_array.length > 0 && firstchild_eq_lastchild == false) {

						for (let iii = 0; iii < lastchild_regex_punctuation_split_array.length; iii++) {

							let lastchild_regex_words_match_count = new RegExp( /\b(\p{L}+?)\b/, 'giu');							
							let lastchild_words_match_count = lastchild_regex_punctuation_split_array[iii].match( lastchild_regex_words_match_count );

							// Start and end of sentences
							let lastchild_regex_start_of_sentence = new RegExp(/^(\s*)([\p{L}]*['"‘’“”]*[\p{L}]*)(?:\s)([\p{L}]*['"‘’“”]*[\p{L}]*)/, 'giu');
							let lastchild_regex_end_of_sentence = new RegExp(/([\p{L}]*['"‘’“”]*[\p{L}]*)(?:\s)([\p{L}]*['"‘’“”]*[\p{L}]*)$/, 'giu');
							lastchild_regex_punctuation_split_array[iii] = lastchild_regex_punctuation_split_array[iii].replace("\n", ""); // Remove evil line breaks!

							if ( lastchild_words_match_count !== null && lastchild_words_match_count.length == 3 ) {

								let lastchild_replace_end_of_sentence = lastchild_regex_punctuation_split_array[iii].replace( lastchild_regex_end_of_sentence, "$1&nbsp;$2");
								lastchild_regex_punctuation_split_array[iii] = lastchild_replace_end_of_sentence;
								
							} else if ( lastchild_words_match_count !== null && lastchild_words_match_count.length > 3 ) {							

								let lastchild_replace_start_of_sentence = lastchild_regex_punctuation_split_array[iii].replace( lastchild_regex_start_of_sentence, "$1$2&nbsp;$3" );
								let lastchild_replace_end_of_sentence = lastchild_replace_start_of_sentence.replace( lastchild_regex_end_of_sentence, "$1&nbsp;$2" );
															
								// regex_punctuation_split_array[iii] = regex_punctuation_split_array[iii];
								// regex_punctuation_split_array[iii] = replace_start_of_sentence;
								lastchild_regex_punctuation_split_array[iii] = lastchild_replace_end_of_sentence;

							}

							lastchild_orphan_control_reassemble_array[iii] = ( lastchild_regex_punctuation_match_array[iii] ) ? lastchild_regex_punctuation_split_array[iii] + lastchild_regex_punctuation_match_array[iii] : lastchild_regex_punctuation_split_array[iii];

						}

						let lastchild_orphan_control_element_string = lastchild_orphan_control_reassemble_array.join("");
						orphan_control_element.childNodes[orphan_control_element_length].nodeValue = lastchild_orphan_control_element_string;

					}

					let orphan_control_element_childnodes_innerhtml_array = new Array();

					for (let iv = 0; iv < orphan_control_element.childNodes.length; iv++) {

						orphan_control_element_childnodes_innerhtml_array[iv] = orphan_control_element.childNodes[iv].nodeValue;

					}

					let orphan_control_element_string = orphan_control_element_childnodes_innerhtml_array.join("");
					orphan_control_element.innerHTML = orphan_control_element_string;

				}

		    }
		}
	}

}