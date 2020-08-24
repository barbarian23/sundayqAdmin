/**
 * Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/* exported initSample */

if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );
// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

var initSample = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'editor' );
		var editorElement2 = CKEDITOR.document.getById( 'editor2' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygarea plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			//console.warn("if");
			CKEDITOR.replace( 'editor' );
			CKEDITOR.replace( 'editor2' );
			let tokenSunq = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6ImIzMGUwMWYzYTRjNzNlOWQwMGZhMGUxZjBmM2E1OTk1MTU5NjczNDI2MDM4MCIsInR5cGUiOiJhZG1pbiIsImlhdCI6MTU5ODI3NzEwNSwiZXhwIjoxNTk4MzIwMzA1fQ.hZSbU3oaQ8AnT4UhL3uq3Z4w7SHE37jKEqS0jSGVhTY";
			CKEDITOR.config.filebrowserImageUploadUrl = `http://103.146.22.168:3000/resource/ckediter/image?token=${tokenSunq}`;
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'editor' );
			//console.warn("else");
			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();