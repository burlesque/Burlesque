var ImageDialog = {
	preInit : function() {
		var url;
		tinyMCEPopup.requireLangPack();
	},

	init : function(ed) {
		var f = document.forms[0], nl = f.elements, ed = tinyMCEPopup.editor, dom = ed.dom, n = ed.selection.getNode();
		var dom = tinyMCEPopup.dom, lst = dom.get('img_browser_div'), img_profiles = dom.get('img_profile'), img_folders = dom.get('img_folders');
		tinyMCEPopup.resizeToInnerSize();
		this.fillClassList('class_list');
		
		var uploader = new plupload.Uploader({
			runtimes : 'html5,flash',
			browse_button : 'pickfiles',
			container : 'img_toolbar',
			max_file_size : '12mb',
			url : tinyMCEPopup.getParam("document_base_url")+'image/upload?folder='+img_folders.value,
			flash_swf_url : tinyMCEPopup.editor.documentBaseURI.toAbsolute('/libraries/plupload/js/plupload.flash.swf'),
			filters : [
				{title : "Image files", extensions : "jpg,gif,png"}
			]
		});

		

		 dom.get('uploadfiles').onclick = function(e) {
			uploader.start();
			e.preventDefault();
		};

		uploader.init();

		uploader.bind('FilesAdded', function(up, files) {
			tinymce.each(files, function(i, file) {
				var imgdiv = document.createElement('div'); 
				imgdiv.className = 'image';
				imgdiv.id = i.id;
				
				var size = i.size/1024;
				imgdiv.innerHTML = i.name + "<br><i>(" + size.toFixed(2) + "KB)</i><br><b>0%</b>";
				lst.appendChild(imgdiv);
			});
	
			up.refresh(); // Reposition Flash/Silverlight
		});
		
		uploader.bind('BeforeUpload', function(up, file) {
		    up.settings.url = tinyMCEPopup.getParam("document_base_url")+'image/upload?folder='+img_folders.value+'&file='+file.name;
		});
		

		uploader.bind('UploadProgress', function(up, file) {
			var size = file.size/1024;
			dom.get(file.id).innerHTML = file.name + '<br><i>(' + size.toFixed(2) + 'KB)</i><br><b>' + file.percent + '%</b>';
		});

		uploader.bind('Error', function(up, err) {
			alert('Error:' + err.code + ', Message: ' + err.message);	
			up.refresh(); // Reposition Flash/Silverlight
		});
	
		uploader.bind('FileUploaded', function(up, file, info) {
			var file_data = JSON.parse(info.response);
			if(file_data.image){			
				var file_name = file_data.image.file_name.substring(file_data.image.file_name.indexOf('@')+1);
				var imgdiv = dom.get(file.id);
			imgdiv.onclick = function() {ImageDialog.image_select(this);};
			imgdiv.title = file_name;
			
			imgdiv.innerHTML = '';
			var img = new Image();
			img.src = tinyMCEPopup.getParam("document_base_url")+"image/show?folder="+img_folders.value+"&name="+file_name+"&profile=thumb";		
			img.title = file_name;
			imgdiv.appendChild(img);
				
			} else {
				alert(file_data.error);
			}
			
		});
		
		
		
		var img_profiles_data = tinyMCEPopup.getParam("image_profiles_data");
		tinymce.each(img_profiles_data, function(profile) {
			img_profiles.options[img_profiles.options.length] = new Option(profile[1], profile[0]);
		});
		TinyMCE_EditableSelects.init();
		

		if (n.nodeName == 'IMG') {
			var src_vars = this.getUrlVars(dom.getAttrib(n, 'src'));
			nl.src.value = src_vars['name'];
			selectByValue(f, 'img_profile', src_vars['profile']);
			this.renderFolders(img_folders,src_vars['folder']);
			nl.alt.value = dom.getAttrib(n, 'alt');
			nl.title.value = dom.getAttrib(n, 'title');
			selectByValue(f, 'align', this.getAttrib(n, 'align'));
			selectByValue(f, 'class_list', dom.getAttrib(n, 'class'), true, true);
			nl.style.value = dom.getAttrib(n, 'style');
			nl.insert.value = ed.getLang('update');

			

			if (ed.settings.inline_styles) {
				// Move attribs to styles
				if (dom.getAttrib(n, 'align'))
					this.updateStyle('align');	
			}
		} else {
			this.renderFolders(img_folders,'first_option');
		}

		this.changeAppearance();
		this.showPreviewImage(nl.src.value, 1);
	},
	
	
	renderFolders : function(folders_el, selected_folder){
		var folders_request=new XMLHttpRequest();
		folders_request.open("GET",tinyMCEPopup.editor.documentBaseURI.toAbsolute('image/folders'),true);
		folders_request.onreadystatechange=function(){
			if (folders_request.readyState==4 && folders_request.status==200){
			var folders_array = JSON.parse(folders_request.responseText);
				tinymce.each(folders_array, function(folder) {
				    folders_el.options[folders_el.options.length] = new Option(folder, folder);
				});
				if(selected_folder == 'first_option'){
					folders_el.value = folders_el.options[0].value;
					ImageDialog.load_images(folders_el.options[0].value);
				} else {
					folders_el.value = selected_folder;
					ImageDialog.load_images(selected_folder);
				}
				
				
			}
		};
		folders_request.send();
		
	},
	
	
	getUrlVars : function(url) {
    var vars = {};
    var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
},

	
	load_images : function(folder){
		var dom = tinyMCEPopup.dom;
		var lst = dom.get('img_browser_div');
		var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET",tinyMCEPopup.editor.documentBaseURI.toAbsolute(tinyMCEPopup.getParam("external_image_list_url"))+'?folder='+folder,true);
					xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						if(lst.hasChildNodes()){
    						while ( lst.childNodes.length >= 1 )
    						{
       							lst.removeChild( lst.firstChild );       
    						} 
						}
						var o = JSON.parse(xmlhttp.responseText);
						tinymce.each(o, function(file) {
							var imgdiv = document.createElement('div'); 
							imgdiv.className = 'image';
							imgdiv.title = file;
							imgdiv.onclick = function() { ImageDialog.image_select(this); };
							lst.appendChild(imgdiv);
							var img = new Image();
							img.src = tinyMCEPopup.editor.documentBaseURI.toAbsolute("image/show?folder="+folder+"&name="+file+"&profile=thumb");
							img.title = file;
							imgdiv.appendChild(img);
						});
					}
				};
				xmlhttp.send();
	},
	
	image_select : function(img) {
		var selected_imgs = document.getElementById('img_browser_div').getElementsByClassName('selected_image');
		
		for (var i = 0; i < selected_imgs.length; i++) {
			this.removeClass(selected_imgs[i], 'selected_image');
		}
		
		this.addClass(img, 'selected_image');
		document.getElementById('src').value=img.getAttribute('title');
		document.getElementById('alt').value=img.getAttribute('title');
		document.getElementById('title').value=img.getAttribute('title');
	},
	
	removeClass : function(ele,cls) {
		if (this.hasClass(ele,cls)) {
			var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
			ele.className=ele.className.replace(reg,' ');
		}
	},
	
	addClass : function(ele,cls) {
		if (!this.hasClass(ele,cls)) ele.className += " "+cls;
	},
	
	hasClass : function(ele,cls) {
		return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
	},

	insert : function(file, title) {
		var ed = tinyMCEPopup.editor, t = this, f = document.forms[0];

		if (f.src.value === '') {
			if (ed.selection.getNode().nodeName == 'IMG') {
				ed.dom.remove(ed.selection.getNode());
				ed.execCommand('mceRepaint');
			}

			tinyMCEPopup.close();
			return;
		}

		if (tinyMCEPopup.getParam("accessibility_warnings", 1)) {
			if (!f.alt.value) {
				tinyMCEPopup.confirm(tinyMCEPopup.getLang('advimage_dlg.missing_alt'), function(s) {
					if (s)
						t.insertAndClose();
				});

				return;
			}
		}

		t.insertAndClose();
	},

	insertAndClose : function() {
		var ed = tinyMCEPopup.editor, f = document.forms[0], nl = f.elements, v, args = {}, el;

		tinyMCEPopup.restoreSelection();

		// Fixes crash in Safari
		if (tinymce.isWebKit)
			ed.getWin().focus();

		if (!ed.settings.inline_styles) {
			args = {
				align : getSelectValue(f, 'align')
			};
		} else {
			// Remove deprecated values
			args = {
				align : ''
			};
		}

		tinymce.extend(args, {
			src : "image/show?folder="+nl.img_folders.value+"&name="+nl.src.value+"&profile="+nl.img_profile.value,
			alt : nl.alt.value,
			title : nl.title.value,
			'class' : getSelectValue(f, 'class_list'),
			style : nl.style.value
		});

		el = ed.selection.getNode();

		if (el && el.nodeName == 'IMG') {
			ed.dom.setAttribs(el, args);
		} else {
			tinymce.each(args, function(value, name) {
				if (value === "") {
					delete args[name];
				}
			});

			ed.execCommand('mceInsertContent', false, tinyMCEPopup.editor.dom.createHTML('img', args), {skip_undo : 1});
			ed.undoManager.add();
		}

		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.editor.focus();
		tinyMCEPopup.close();
	},

	getAttrib : function(e, at) {
		var ed = tinyMCEPopup.editor, dom = ed.dom, v, v2;

		if (ed.settings.inline_styles) {
			switch (at) {
				case 'align':
					if (v = dom.getStyle(e, 'float'))
						return v;

					if (v = dom.getStyle(e, 'vertical-align'))
						return v;

					break;

				case 'hspace':
					v = dom.getStyle(e, 'margin-left')
					v2 = dom.getStyle(e, 'margin-right');

					if (v && v == v2)
						return parseInt(v.replace(/[^0-9]/g, ''));

					break;

				case 'vspace':
					v = dom.getStyle(e, 'margin-top')
					v2 = dom.getStyle(e, 'margin-bottom');
					if (v && v == v2)
						return parseInt(v.replace(/[^0-9]/g, ''));

					break;

				case 'border':
					v = 0;

					tinymce.each(['top', 'right', 'bottom', 'left'], function(sv) {
						sv = dom.getStyle(e, 'border-' + sv + '-width');

						// False or not the same as prev
						if (!sv || (sv != v && v !== 0)) {
							v = 0;
							return false;
						}

						if (sv)
							v = sv;
					});

					if (v)
						return parseInt(v.replace(/[^0-9]/g, ''));

					break;
			}
		}

		if (v = dom.getAttrib(e, at))
			return v;

		return '';
	},

	setSwapImage : function(st) {
		var f = document.forms[0];

		f.onmousemovecheck.checked = st;
		setBrowserDisabled('overbrowser', !st);
		setBrowserDisabled('outbrowser', !st);

		if (f.over_list)
			f.over_list.disabled = !st;

		if (f.out_list)
			f.out_list.disabled = !st;

		f.onmouseoversrc.disabled = !st;
		f.onmouseoutsrc.disabled  = !st;
	},

	fillClassList : function(id) {
		var dom = tinyMCEPopup.dom, lst = dom.get(id), v, cl;

		if (v = tinyMCEPopup.getParam('theme_advanced_styles')) {
			cl = [];

			tinymce.each(v.split(';'), function(v) {
				var p = v.split('=');

				cl.push({'title' : p[0], 'class' : p[1]});
			});
		} else
			cl = tinyMCEPopup.editor.dom.getClasses();

		if (cl.length > 0) {
			lst.options.length = 0;
			lst.options[lst.options.length] = new Option(tinyMCEPopup.getLang('not_set'), '');

			tinymce.each(cl, function(o) {
				lst.options[lst.options.length] = new Option(o.title || o['class'], o['class']);
			});
		} else
			dom.remove(dom.getParent(id, 'tr'));
	},



	resetImageData : function() {
		var f = document.forms[0];

		f.elements.width.value = f.elements.height.value = '';
	},

	updateImageData : function(img, st) {
		var f = document.forms[0];

		if (!st) {
			f.elements.width.value = img.width;
			f.elements.height.value = img.height;
		}

		this.preloadImg = img;
	},

	changeAppearance : function() {
		var ed = tinyMCEPopup.editor, f = document.forms[0], img = document.getElementById('alignSampleImg');

		if (img) {
			if (ed.getParam('inline_styles')) {
				ed.dom.setAttrib(img, 'style', f.style.value);
			} else {
				img.align = f.align.value;
				img.border = f.border.value;
				img.hspace = f.hspace.value;
				img.vspace = f.vspace.value;
			}
		}
	},

	changeHeight : function() {
		var f = document.forms[0], tp, t = this;

		if (!f.constrain.checked || !t.preloadImg) {
			return;
		}

		if (f.width.value == "" || f.height.value == "")
			return;

		tp = (parseInt(f.width.value) / parseInt(t.preloadImg.width)) * t.preloadImg.height;
		f.height.value = tp.toFixed(0);
	},

	changeWidth : function() {
		var f = document.forms[0], tp, t = this;

		if (!f.constrain.checked || !t.preloadImg) {
			return;
		}

		if (f.width.value == "" || f.height.value == "")
			return;

		tp = (parseInt(f.height.value) / parseInt(t.preloadImg.height)) * t.preloadImg.width;
		f.width.value = tp.toFixed(0);
	},

	updateStyle : function(ty) {
		var dom = tinyMCEPopup.dom, b, bStyle, bColor, v, isIE = tinymce.isIE, f = document.forms[0], img = dom.create('img', {style : dom.get('style').value});

		if (tinyMCEPopup.editor.settings.inline_styles) {
			// Handle align
			if (ty == 'align') {
				dom.setStyle(img, 'float', '');
				dom.setStyle(img, 'vertical-align', '');

				v = getSelectValue(f, 'align');
				if (v) {
					if (v == 'left' || v == 'right')
						dom.setStyle(img, 'float', v);
					else
						img.style.verticalAlign = v;
				}
			}

			// Handle border
			if (ty == 'border') {
				b = img.style.border ? img.style.border.split(' ') : [];
				bStyle = dom.getStyle(img, 'border-style');
				bColor = dom.getStyle(img, 'border-color');

				dom.setStyle(img, 'border', '');

				v = f.border.value;
				if (v || v == '0') {
					if (v == '0')
						img.style.border = isIE ? '0' : '0 none none';
					else {
						var isOldIE = tinymce.isIE && (!document.documentMode || document.documentMode < 9);

						if (b.length == 3 && b[isOldIE ? 2 : 1])
							bStyle = b[isOldIE ? 2 : 1];
						else if (!bStyle || bStyle == 'none')
							bStyle = 'solid';
						if (b.length == 3 && b[isIE ? 0 : 2])
							bColor = b[isOldIE ? 0 : 2];
						else if (!bColor || bColor == 'none')
							bColor = 'black';
						img.style.border = v + 'px ' + bStyle + ' ' + bColor;
					}
				}
			}

			// Handle hspace
			if (ty == 'hspace') {
				dom.setStyle(img, 'marginLeft', '');
				dom.setStyle(img, 'marginRight', '');

				v = f.hspace.value;
				if (v) {
					img.style.marginLeft = v + 'px';
					img.style.marginRight = v + 'px';
				}
			}

			// Handle vspace
			if (ty == 'vspace') {
				dom.setStyle(img, 'marginTop', '');
				dom.setStyle(img, 'marginBottom', '');

				v = f.vspace.value;
				if (v) {
					img.style.marginTop = v + 'px';
					img.style.marginBottom = v + 'px';
				}
			}

			// Merge
			dom.get('style').value = dom.serializeStyle(dom.parseStyle(img.style.cssText), 'img');
		}
	},

	changeMouseMove : function() {
	},

	showPreviewImage : function(u, st) {
		if (!u) {
			tinyMCEPopup.dom.setHTML('prev', '');
			return;
		}

		if (!st && tinyMCEPopup.getParam("advimage_update_dimensions_onchange", true))
			this.resetImageData();

		u = tinyMCEPopup.editor.documentBaseURI.toAbsolute(u);

		if (!st)
			tinyMCEPopup.dom.setHTML('prev', '<img id="previewImg" src="' + u + '" border="0" onload="ImageDialog.updateImageData(this);" onerror="ImageDialog.resetImageData();" />');
		else
			tinyMCEPopup.dom.setHTML('prev', '<img id="previewImg" src="' + u + '" border="0" onload="ImageDialog.updateImageData(this, 1);" />');
	}
};

ImageDialog.preInit();
tinyMCEPopup.onInit.add(ImageDialog.init, ImageDialog);
