/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html
	CKEDITOR.editorConfig = function( config ) {
           // Define changes to default configuration here. For example:
           // config.language = 'fr';
           // config.uiColor = '#AADC6E';
            config.filebrowserBrowseUrl = 'localhost/sti/admin/assets/ckfinder/ckfinder.html';
            config.filebrowserImageBrowseUrl = 'localhost/sti/admin/assets/ckfinder/ckfinder.html?type=Images';
           config.filebrowserFlashBrowseUrl = 'localhost/sti/admin/assets/ckfinder/ckfinder.html?type=Flash';           
           config.filebrowserUploadUrl = "localhost/sti/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
            config.filebrowserImageUploadUrl = 'localhost/sti/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
            config.filebrowserFlashUploadUrl = 'localhost/sti/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
           };
	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
};
