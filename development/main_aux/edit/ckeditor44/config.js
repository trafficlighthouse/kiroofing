/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.extraPlugins = 'mypreview';
    config.extraPlugins = 'codemirror';
    config.codemirror = {
        resetSelectionOnContextMenu : false,
        lineNumbers : true,
        matchBrackets : true,
        enableSearchTools : false,
        showTrailingSpace : false,
        onLoad:MpcEditor.cmOnload,
        mode: 'application/x-httpd-php',
        enableCodeFolding : true
    }
    config.fillEmptyBlocks = false;

    config.removePlugins = 'resize';
    config.allowedContent = true;

    config.protectedSource.push( /<\?[\s\S]*?\?>/g );
    config.protectedSource.push(/<a[^>]*><\/a>/gi );

    config.protectedSource.push(/<meta\s+[itemprop|content].*?>/gi );

//  config.protectedSource.push( /<br[\s\S]*?\/>/g );
//  config.protectedSource.push( /<br\s+\S]+\s*\/>/g );

    config.protectedSource.push( /<br\s+[class|clear].*\/>/gi );
    /////config.protectedSource.push( /<i\s+class.*><\/i>/gi );
    config.protectedSource.push( /<i\s+[class|style].*><\/i>/gi );

//  config.protectedSource.push( /<br\s+\S+\s*\/>/g );
//  config.entities = false;

    config.basicEntities = false;
    
//  config.protectedSource.push( /<br clear="left" \/>/g );
//  config.docType = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

    CKEDITOR.dtd.$removeEmpty['ins'] = false;
    CKEDITOR.dtd.$removeEmpty['span'] = false;
    CKEDITOR.dtd.$removeEmpty['i'] = false;

    config.toolbar_MOST =
    [
        ['NewPage'],['Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord'],['Print'],['PageBreak'],
        ['Undo','Redo'],['Find','Replace'],
        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
        '/',
        ['Bold','Italic','Underline','Strike'],['Subscript','Superscript'],
        ['NumberedList','BulletedList'],['Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['BidiLtr', 'BidiRtl' ],
        ['Link','Unlink','Anchor'],
        ['ShowBlocks'],
        '/',
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Image','Flash'],['Table','HorizontalRule'],['Smiley'],['SpecialChar'],['Iframe']
    ];
};
