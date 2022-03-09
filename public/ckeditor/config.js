/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    config.uiColor = '#DEEFF2';

    config.extraPlugins='confighelper,' +
        'pastefromword,' +
        'font,' +
        'colorbutton,' +
        'justify,' +
        'cssanim,' +
        'filetools';

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi','justify', 'undo', 'redo','simplebutton' ] },
		{ name: 'forms' },
        { name: 'styles' },
        { name: 'colors' },
		{ name: 'tools' },
        { name: 'other', items: ['simplebutton'] }
	];

    // config.colorButton_colors = 'skyblue/87CEEB,crimson/DC143C';


    // Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
    config.allowedContent = true;
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_BR;
    config.autoParagraph = false;

};
