Ext.define('Ext.ux.form.field.DateTime', {
	extend : 'Ext.form.FieldContainer',
	mixins : {
		field : 'Ext.form.field.Field'
	},
	alias : 'widget.datetimefield',
	layout : 'fit',
	timePosition : 'right', // valid values:'below', 'right'
	dateCfg : {},
	timeCfg : {},
	allowBlank : true,

	initComponent : function() {
		var me = this;
		me.buildField();
		me.callParent();
		this.dateField = this.down('datefield');
		this.timeField = this.down('timefield');
		me.initField();
	},

	//@private
	buildField : function() {
		var l;
		var d = {};
		if(this.timePosition == 'below') {
			l = {
				type : 'anchor'
			};
			d = {
				anchor : '100%'
			};
		} else
			l = {
				type : 'hbox',
				align : 'middle'
			};
		this.items = {
			xtype : 'container',
			layout : l,
			defaults : d,
			items : [Ext.apply({
				xtype : 'datefield',
				format : 'd.m.Y',
				width : this.timePosition != 'below' ? 100 : undefined,
				allowBlank : this.allowBlank,
				listeners : {
					specialkey : this.onSpecialKey,
					scope : this
				},
				isFormField : false // prevent submission
			}, this.dateCfg), Ext.apply({
				xtype : 'timefield',
				format : 'H:i',
				margin : this.timePosition != 'below' ? '0 0 0 3' : 0,
				width : this.timePosition != 'below' ? 80 : undefined,
				allowBlank : this.allowBlank,
				listeners : {
					specialkey : this.onSpecialKey,
					scope : this
				},
				isFormField : false // prevent submission
			}, this.timeCfg)]
		};
	},

	focus : function() {
		this.callParent();
		this.dateField.focus(false, 100);
	},

	// Handle tab events
	onSpecialKey : function(cmp, e) {
		var key = e.getKey();
		if(key === e.TAB) {
			if(cmp == this.dateField) {
				// fire event in container if we are getting out of focus from datefield
				if(e.shiftKey) {
					this.fireEvent('specialkey', this, e);
				}
			}
			if(cmp == this.timeField) {
				if(!e.shiftKey) {
					this.fireEvent('specialkey', this, e);
				}
			}
		} else if(this.inEditor) {
			this.fireEvent('specialkey', this, e);
		}
	},

	getValue : function() {
		var value, date = this.dateField.getSubmitValue(), time = this.timeField.getSubmitValue();
		if(date) {
			if(time) {
				var format = this.getFormat();
				value = Ext.Date.parse(date + ' ' + time, format);
			} else {
				value = this.dateField.getValue();
			}
		}
		return value
	},

	setValue : function(value) {
		this.dateField.setValue(value);
		this.timeField.setValue(value);
	},

	getSubmitData : function() {
		var value = this.getValue();
		var format = this.getFormat();
		return value ? Ext.Date.format(value, format) : null;
	},

	getFormat : function() {
		return (this.dateField.submitFormat || this.dateField.format) + " " + (this.timeField.submitFormat || this.timeField.format)
	},

	getErrors : function() {
		return this.dateField.getErrors().concat(this.timeField.getErrors());
	},

	validate : function() {
		if(this.disabled)
			return true;
		else {
			var isDateValid = this.dateField.validate();
			var isTimeValid = this.timeField.validate();
			return isDateValid && isTimeValid;
		}
	},

	reset : function() {
		this.mixins.field.reset();
		this.dateField.reset();
		this.timeField.reset();
	}
});

Ext.define('Ext.ux.FileField', {
	extend : 'Ext.form.field.Trigger',
	alias : ['widget.filebrowserfield'],
	//<locale>
	/**
	 * @cfg {String} buttonText
	 * The button text to display on the upload button. Note that if you supply a value for
	 * {@link #buttonConfig}, the buttonConfig.text value will be used instead if available.
	 */
	buttonViewText : 'Виж файла',
	buttonDeleteText : 'Изтрий',
	buttonText : 'Избери файл',
	imagefield : false,

	//</locale>

	/**
	 * @cfg {Boolean} buttonOnly
	 * True to display the file upload field as a button with no visible text field. If true, all
	 * inherited Text members will still be available.
	 */
	buttonOnly : false,

	/**
	 * @cfg {Number} buttonMargin
	 * The number of pixels of space reserved between the button and the text field. Note that this only
	 * applies if {@link #buttonOnly} = false.
	 */
	buttonMargin : 3,

	/**
	 * @cfg {Object} buttonConfig
	 * A standard {@link Ext.button.Button} config object.
	 */

	/**
	 * @event change
	 * Fires when the underlying file input field's value has changed from the user selecting a new file from the system
	 * file selection dialog.
	 * @param {Ext.ux.form.FileUploadField} this
	 * @param {String} value The file value returned by the underlying file input field
	 */

	/**
	 * @property {Ext.Element} fileInputEl
	 * A reference to the invisible file input element created for this upload field. Only populated after this
	 * component is rendered.
	 */

	/**
	 * @property {Ext.button.Button} button
	 * A reference to the trigger Button component created for this upload field. Only populated after this component is
	 * rendered.
	 */

	/**
	 * @cfg {String} [fieldBodyCls='x-form-file-wrap']
	 * An extra CSS class to be applied to the body content element in addition to {@link #baseBodyCls}.
	 */
	fieldBodyCls : Ext.baseCSSPrefix + 'form-file-wrap',

	/**
	 * @cfg {Boolean} readOnly
	 * Unlike with other form fields, the readOnly config defaults to true in File field.
	 */
	readOnly : true,

	/**
	 * Do not show hand pointer over text field since file choose dialog is only shown when clicking in the button
	 * @private
	 */
	triggerNoEditCls : '',

	// private
	componentLayout : 'triggerfield',

	// private. Extract the file element, button outer element, and button active element.
	childEls : ['browseButtonWrap'],
	msgTarget : 'under',

	initComponent : function() {
		var me = this;
		me.callParent(arguments);
		if(me.allowedExtensions) {
			me.regex = new RegExp("^.*.(" + me.allowedExtensions + ")$");
			me.regexText = me.allowedExtsError;
		}
	},

	// private
	onRender : function() {
		var me = this, id = me.id, inputEl;

		me.callParent(arguments);

		inputEl = me.inputEl;
		inputEl.dom.name = '';
		//name goes on the fileInput, not the text input

		// render the button here. This isn't ideal, however it will be
		// rendered before layouts are resumed, also we modify the DOM
		// below anyway
		me.button = new Ext.Button(Ext.apply({
			renderTo : id + '-browseButtonWrap',
			id : id + '-button',
			ui : me.ui,
			disabled : me.disabled,
			text : me.buttonText,
			style : me.buttonOnly ? '' : 'margin-left:' + me.buttonMargin + 'px',
			height : 22,
			width : 80,
			inputName : me.getName(),
			listeners : {
				scope : me,
				click : me.onBrowseClick
			}
		}, me.buttonConfig));

		me.buttonDelete = Ext.widget('button', Ext.apply({
			ui : me.ui,
			renderTo : id + '-browseButtonWrap',
			text : me.buttonDeleteText,
			cls : Ext.baseCSSPrefix + 'form-file-btn',
			preventDefault : true,
			style : 'margin-left:3px',
			handler : me.handleDelete,
			disabled : true,
			scope : me,
			height : 22,
			width : 80,
		}, me.buttonDeleteConfig));

		me.buttonView = Ext.widget('button', Ext.apply({
			ui : me.ui,
			renderTo : id + '-browseButtonWrap',
			text : me.buttonViewText,
			cls : Ext.baseCSSPrefix + 'form-file-btn',
			preventDefault : true,
			style : 'margin-left:3px',
			handler : me.handleView,
			disabled : true,
			scope : me,
			height : 22,
			width : 80,
		}, me.buttonViewConfig));

		if(me.buttonOnly) {
			me.inputCell.setDisplayed(false);
		}

		// Ensure the trigger cell is sized correctly upon render
		me.browseButtonWrap.dom.style.width = (me.browseButtonWrap.dom.lastChild.offsetWidth + me.button.getEl().getMargin('lr')) + 'px';
		if(Ext.isIE) {
			me.button.getEl().repaint();
		}
		var width = me.width;
		me.browseButtonWrap.setWidth(250);
		//me.inputEl.width = 200;//Ext.isNumber(width) ? width - me.button.getWidth() - me.buttonMargin - me.buttonDelete.getWidth() - me.buttonDeleteMargin : width;
	},

	/**
	 * Gets the markup to be inserted into the subTplMarkup.
	 */
	getTriggerMarkup : function() {
		return '<td id="' + this.id + '-browseButtonWrap"></td>';
	},

	handleDelete : function(btn) {
		var me = this;
		me.setValue('');
		me.fireEvent('deletefile', me, true);

	},

	handleView : function(btn) {
		var me = this;
		var fileviewurl;
		if(me.imagefield) {
			fileviewurl = base_url + 'image?file=' + me.getValue();
		} else {
			fileviewurl = base_url + 'file?file=' + me.getValue();
		}
		myWindow = window.open(fileviewurl, 'Преглед', 'width=600,height=600');
		myWindow.focus()

	},

	/**
	 * @private Event handler fired when the user selects a file.
	 */
	onBrowseClick : function(button, e, opts) {
		var me = this;
		var win = Ext.create('widget.window', {

			title : 'Файлов Браузър',
			width : 800,
			height : 600,
			minWidth : 600,
			minHeight : 400,
			resizable : true,
			modal : true,
			layout : "fit",
			scroll : false,

			items : [Ext.create('Ext.Component', {
				itemId : 'tiny_popup_iframe',
				autoEl : {
					tag : 'iframe',
					name : 'browse_files',
					src : base_url + 'libraries/kcfinder/browse.php?lang=bg&type=file'
				},
				style : 'border-width: 0px;'
			})],
		});
		win.show();

		window.KCFinder = {
			callBack : function(url) {
				window.KCFinder = null;
				win.hide();
				me.setValue(url);
			}
		};
	},

	/**
	 * Overridden to do nothing
	 * @method
	 */
	setValue : function(value) {

		if(this.inputEl) {
			if(value == '') {
				this.buttonDelete.setDisabled(true);
				this.buttonView.setDisabled(true);
			} else {
				value = value.replace(base_url + 'files', '');
				this.buttonDelete.setDisabled(false);
				this.buttonView.setDisabled(false);
			}
			this.inputEl.dom.value = value;
			this.value = value;
		}

	},

	reset : function() {
		var me = this;
		if(me.rendered) {
			me.button.reset();
			me.inputEl.dom.value = '';
		}
		me.callParent();
	},

	onDisable : function() {
		this.callParent();
		this.button.disable();
	},

	onEnable : function() {
		this.callParent();
		this.button.enable();
	},

	isFileUpload : function() {
		return false;
	},

	onDestroy : function() {
		Ext.destroyMembers(this, 'button');
		this.callParent();
	}
});

var ContentAutocomplete = Ext.create('Ext.data.Store', {
	autoLoad : false,
	storeId : 'ContentAutocomplete',
	root : 'content',
	//defaultRootId : '',

	proxy : {
		type : 'ajax',
		url : base_url + 'content/content_autocomplete',
		reader : {
			type : 'json',
			idProperty : 'content_id',
			root : 'content',
			successProperty : 'success'
		},
		listeners : {
			exception : function(proxy, response, operation) {
				Ext.MessageBox.show({
					title : 'ГРЕШКА',
					msg : operation.getError(),
					icon : Ext.MessageBox.ERROR,
					buttons : Ext.Msg.OK
				});
			}
		}
	},
	fields : [{
		name : 'value'
	}, {
		name : 'label'
	}, {
		name : 'content_type'
	}]
});

Ext.define('Ext.ux.ContentChooser', {
	extend : 'Ext.form.field.ComboBox',
	alias : 'widget.contentchooser',
	//store : ContentAutocomplete,
	label_value : '',

	listConfig : {
		getInnerTpl : function() {
			return '<div>{label}</div><div class="autocomplete_ct_type"><b>Тип: </b>{content_type}, <b>ID: </b>{value}</div>';
		}
	},
	listeners : {
		beforequery : function(qe) {
			delete qe.combo.lastQuery;
			this.store.getProxy().setExtraParam('allowed_types', this.allowed_types);
		},
		select : function(combo, record) {
			this.label_value = record[0].data.label;
			this.setRawValue(record[0].data.label);
			this.value = record[0].data.value;
		}
	},

	constructor : function(cnfg) {
		this.callParent(arguments);
		this.initConfig(cnfg);
		var store_inst = ContentAutocomplete;
		this.store = store_inst;
	},

	getValue : function() {
		// If the user has not changed the raw field value since a value was selected from the list,
		// then return the structured value from the selection. If the raw field value is different
		// than what would be displayed due to selection, return that raw value.
		var me = this, picker = me.picker, rawValue = me.getRawValue(), //current value of text field
		value = me.value;
		if(value){
			return value + '::' + this.label_value;
		} else {
			return '';
		}
		
	},

	setValue : function(value) {
		var val = value;
		if('string' === typeof val) {
			val = val.split('::');
			this.value = val[0];
			this.callParent([value]);
			this.setRawValue(val[1]);
			this.label_value = val[1];
		}

	},
	allowed_types : '*',
	triggerAction : 'query',
	queryParam : 'content_title',
	lastQuery : '',
	queryMode : 'remote',
	minChars : 3,
	hideTrigger : true,
	typeAhead : true,
	typeAheadDelay : 500,
	displayField : 'label',
	valueField : 'value',
	editable : true

});
