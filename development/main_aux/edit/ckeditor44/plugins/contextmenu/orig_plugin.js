﻿/*
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.

 For licensing, see LICENSE.md or http://ckeditor.com/license

*/
CKEDITOR.plugins.add("contextmenu",{requires:"menu",lang:"en",onLoad:function(){CKEDITOR.plugins.contextMenu=CKEDITOR.tools.createClass({base:CKEDITOR.menu,$:function(a){this.base.call(this,a,{panel:{className:"cke_menu_panel",attributes:{"aria-label":a.lang.contextmenu.options}}})},proto:{addTarget:function(a,c){a.on("contextmenu",function(a){var a=a.data,b=CKEDITOR.env.webkit?d:CKEDITOR.env.mac?a.$.metaKey:a.$.ctrlKey;if(!c||!b){a.preventDefault();var e=a.getTarget().getDocument(),f=a.getTarget().getDocument().getDocumentElement(),
b=!e.equals(CKEDITOR.document),e=e.getWindow().getScrollPosition(),g=b?a.$.clientX:a.$.pageX||e.x+a.$.clientX,h=b?a.$.clientY:a.$.pageY||e.y+a.$.clientY;CKEDITOR.tools.setTimeout(function(){this.open(f,null,g,h)},CKEDITOR.env.ie?200:0,this)}},this);if(CKEDITOR.env.webkit){var d,b=function(){d=0};a.on("keydown",function(a){d=CKEDITOR.env.mac?a.data.$.metaKey:a.data.$.ctrlKey});a.on("keyup",b);a.on("contextmenu",b)}},open:function(a,c,d,b){this.editor.focus();a=a||CKEDITOR.document.getDocumentElement();

//this.editor.selectionChange(1);

this.show(a,c,d,b)}}})},beforeInit:function(a){var c=a.contextMenu=new CKEDITOR.plugins.contextMenu(a);a.on("contentDom",function(){c.addTarget(a.editable(),!1!==a.config.browserContextMenuOnCtrl)});a.addCommand("contextMenu",{exec:function(){a.contextMenu.open(a.document.getBody())}});a.setKeystroke(CKEDITOR.SHIFT+121,"contextMenu");a.setKeystroke(CKEDITOR.CTRL+CKEDITOR.SHIFT+121,"contextMenu")}});
