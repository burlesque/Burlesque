var menuGridEditMode;
var contentEditMode;
var currentContentType;
var currentContentOnlyEdit;
var currentContentDD;
var settings_cfg;

var contentItemsPerPage = 25;

Ext.Loader.setConfig({
	enabled : false
});

Ext.MessageBox.buttonText.yes = "Yes";
Ext.MessageBox.buttonText.no = "No";



Ext.application({
	name : 'Admin',
	launch : function() {
		Ext.create('Ext.container.Viewport', {
			layout : {
				type : 'fit'
			},
			items : [{
				xtype : 'tabpanel',
				activeTab : 0,
				height : 50,
				id : 'admin-panel',
				margin : '10 0 0 0',
				items : [{
					xtype : 'panel',
					layout : {
						type : 'fit'
					},
					title : 'Menus',
					icon : base_url + 'libraries/images/menu.png',
					items : [{
						//-----
						xtype : 'treepanel',
						//height: '100%',
						id : 'menus',
						itemId : 'menus',
						folderSort : true,
						useArrows : false,
						//allowDeselect: true,
						title : 'Всички менюта',
						enableColumnHide : false,
						enableColumnMove : false,
						enableColumnResize : false,
						store : MenusTreeStore,
						displayField : 'item',
						rootVisible : false,
						useArrows : false,
						viewConfig : {
							plugins : [Ext.create('Ext.tree.plugin.TreeViewDragDrop', {
								ptype : 'treeviewdragdrop'
							})],
						},
						columns : [{
							xtype : 'treecolumn',
							dataIndex : 'item',
							flex : 1,
							text : '',
							sortable : false
						}, {
							xtype : 'gridcolumn',
							dataIndex : 'resource',
							text : 'URL',
							width : 350,
							sortable : false,
							renderer : function(value) {
								if(value){
								var value_array = value.split("::");
								return value_array[1]+' <i>(ID: '+value_array[0]+')</i>';
								} else {
									return '';
								}
							}
						}, {
							xtype : 'gridcolumn',
							dataIndex : 'published',
							text : 'Published',
							align : 'center',
							sortable : false,
							renderer : function(value) {
								if(value == '1') {
									return '<span style="color:green;">ДА</span>';
								}
								return '<span style="color:red;">НЕ</span>';
							}
						}, {
							xtype : 'gridcolumn',
							dataIndex : 'id',
							width : 45,
							text : 'ID',
							sortable : false
						}],
						dockedItems : [{
							xtype : 'toolbar',
							dock : 'top',
							itemId : 'toptoolbar',
							items : [{
								xtype : 'button',
								text : 'Ново меню',
								itemId : 'new_menu',
								icon : base_url + 'libraries/images/add_menu.png',
								scale : 'large',
								handler : function() {
									menuGridEditMode = 'new_menu';
									menuButtonEdit.setTitle('Ново меню');
									menuButtonEdit.child('form').child('#resource').setVisible(false);
									menuButtonEdit.child('form').child('#class').setVisible(false);
									menuButtonEdit.child('form').child('#target').setVisible(false);
									menuButtonEdit.child('form').child('#lang1').setValue('');
									menuButtonEdit.child('form').child('#lang1').setFieldLabel(settings_cfg.languages.lang1.admin_name);
									menuButtonEdit.child('form').child('#lang1').setVisible(settings_cfg.languages.lang1.enabled);
									menuButtonEdit.child('form').child('#lang2').setValue('');
									menuButtonEdit.child('form').child('#lang2').setFieldLabel(settings_cfg.languages.lang2.admin_name);
									menuButtonEdit.child('form').child('#lang2').setVisible(settings_cfg.languages.lang2.enabled);
									menuButtonEdit.child('form').child('#lang3').setValue('');
									menuButtonEdit.child('form').child('#lang3').setFieldLabel(settings_cfg.languages.lang3.admin_name);
									menuButtonEdit.child('form').child('#lang3').setVisible(settings_cfg.languages.lang3.enabled);
									menuButtonEdit.child('form').child('#lang4').setValue('');
									menuButtonEdit.child('form').child('#lang4').setFieldLabel(settings_cfg.languages.lang4.admin_name);
									menuButtonEdit.child('form').child('#lang4').setVisible(settings_cfg.languages.lang4.enabled);
									menuButtonEdit.child('form').child('#lang5').setValue('');
									menuButtonEdit.child('form').child('#lang5').setFieldLabel(settings_cfg.languages.lang5.admin_name);
									menuButtonEdit.child('form').child('#lang5').setVisible(settings_cfg.languages.lang5.enabled);
									menuButtonEdit.child('form').child('#lang6').setValue('');
									menuButtonEdit.child('form').child('#lang6').setFieldLabel(settings_cfg.languages.lang6.admin_name);
									menuButtonEdit.child('form').child('#lang6').setVisible(settings_cfg.languages.lang6.enabled);
									menuButtonEdit.child('form').child('#resource').setValue('');
									menuButtonEdit.child('form').child('#class').setValue('');
									menuButtonEdit.child('form').child('#target').setValue('_self');
									menuButtonEdit.child('form').child('#published').child('#published_no').setValue(true);
									menuButtonEdit.show();
								}
							}, {
								xtype : 'button',
								text : 'Нов бутон',
								itemId : 'new_button',
								icon : base_url + 'libraries/images/add_link.png',
								scale : 'large',
								disabled : true,
								handler : function() {
									menuGridEditMode = 'new_button';
									menuButtonEdit.setTitle('Нов бутон');
									menuButtonEdit.child('form').child('#resource').setVisible(true);
									menuButtonEdit.child('form').child('#class').setVisible(true);
									menuButtonEdit.child('form').child('#target').setVisible(true);
									menuButtonEdit.child('form').child('#lang1').setValue('');
									menuButtonEdit.child('form').child('#lang1').setFieldLabel(settings_cfg.languages.lang1.admin_name);
									menuButtonEdit.child('form').child('#lang1').setVisible(settings_cfg.languages.lang1.enabled);
									menuButtonEdit.child('form').child('#lang2').setValue('');
									menuButtonEdit.child('form').child('#lang2').setFieldLabel(settings_cfg.languages.lang2.admin_name);
									menuButtonEdit.child('form').child('#lang2').setVisible(settings_cfg.languages.lang2.enabled);
									menuButtonEdit.child('form').child('#lang3').setValue('');
									menuButtonEdit.child('form').child('#lang3').setFieldLabel(settings_cfg.languages.lang3.admin_name);
									menuButtonEdit.child('form').child('#lang3').setVisible(settings_cfg.languages.lang3.enabled);
									menuButtonEdit.child('form').child('#lang4').setValue('');
									menuButtonEdit.child('form').child('#lang4').setFieldLabel(settings_cfg.languages.lang4.admin_name);
									menuButtonEdit.child('form').child('#lang4').setVisible(settings_cfg.languages.lang4.enabled);
									menuButtonEdit.child('form').child('#lang5').setValue('');
									menuButtonEdit.child('form').child('#lang5').setFieldLabel(settings_cfg.languages.lang5.admin_name);
									menuButtonEdit.child('form').child('#lang5').setVisible(settings_cfg.languages.lang5.enabled);
									menuButtonEdit.child('form').child('#lang6').setValue('');
									menuButtonEdit.child('form').child('#lang6').setFieldLabel(settings_cfg.languages.lang6.admin_name);
									menuButtonEdit.child('form').child('#lang6').setVisible(settings_cfg.languages.lang6.enabled);
									menuButtonEdit.child('form').child('#resource').setValue('');
									menuButtonEdit.child('form').child('#class').setValue('');
									menuButtonEdit.child('form').child('#target').setValue('_self');
									menuButtonEdit.child('form').child('#published').child('#published_no').setValue(true);
									menuButtonEdit.show();
								}
							}, {
								xtype : 'button',
								text : 'Копирай',
								itemId : 'copy',
								disabled : true,
								icon : base_url + 'libraries/images/copy.png',
								scale : 'large'
							}, {
								xtype : 'button',
								text : 'Изтрий',
								itemId : 'delete',
								disabled : true,
								icon : base_url + 'libraries/images/delete.png',
								scale : 'large',
								handler : deleteMenuItem
							}]
						}],
						listeners : {
							beforeitemdblclick : {
								fn : onMenusItemDblClick,
								scope : this
							},
							select : {
								fn : onMenusSelect,
								scope : this
							},
							deselect : {
								fn : onMenusDeselect,
								scope : this
							}
						}
						//------
					}]
				}, {
					xtype : 'panel',
					layout : {
						type : 'fit'
					},
					title : 'Content',
					icon : base_url + 'libraries/images/add_content.png',
					items : [{
						xtype : 'panel',
						layout : {
							type : 'fit'
						},
						title : 'Content',
						items : [{
							xtype : 'gridpanel',
							title : '',
							itemId : 'contents',
							id : 'contents',
							sortableColumns : false,
							enableColumnHide : false,
							enableColumnMove : false,
							store : ContentStore,
							viewConfig : {
								plugins : [Ext.create('Ext.grid.plugin.DragDrop', {
									ptype : 'gridviewdragdrop',
									pluginId : 'gridviewdragdrop',
									ddGroup : 'GridDD'
								})],
								listeners : {
									render : function() {
										ContentTypeStore.load();
									},
									drop : {
										fn : onGriddragdroppluginDrop
									}
								},
							},

							columns : [{
								text : 'Title',
								dataIndex : 'name',
								flex : 1,
								listeners : {
									headerclick : function(ct, column, e, t) {
										if(!currentContentDD) {
											clearSortArrows();
											ContentStore.sort(column.dataIndex);
										}
									}
								}
							}, {
								text : 'Type',
								dataIndex : 'content_type',
								width : 130,
								renderer : function(value) {
									return ContentTypeStore.getById(value).data[settings_cfg.admin_language];
								}
							}, {
								text : 'Date Published',
								dataIndex : 'date',
								width : 170,
								xtype : 'datecolumn',
								format : 'd.m.Y H:i',
								listeners : {
									headerclick : function(ct, column, e, t) {
										if(!currentContentDD) {
											clearSortArrows();
											ContentStore.sort(column.dataIndex);
										}
									}
								}
							}, {
								text : 'Last Edit',
								dataIndex : 'last_edit_date',
								width : 170,
								xtype : 'datecolumn',
								format : 'd.m.Y H:i',
								listeners : {
									headerclick : function(ct, column, e, t) {
										if(!currentContentDD) {
											clearSortArrows();
											ContentStore.sort(column.dataIndex);
										}
									}
								}
							}, {
								text : 'Published?',
								dataIndex : 'published',
								align : 'center',
								renderer : function(value) {
									if(value == '1') {
										return '<span style="color:green;">YES</span>';
									}
									return '<span style="color:red;">NO</span>';
								},
								listeners : {
									headerclick : function(ct, column, e, t) {
										if(!currentContentDD) {
											clearSortArrows();
											ContentStore.sort(column.dataIndex);
										}
									}
								}
							}, {
								text : 'ID',
								dataIndex : 'id',
								width : 45,
								listeners : {
									headerclick : function(ct, column, e, t) {
										if(!currentContentDD) {
											clearSortArrows();
											ContentStore.sort(column.dataIndex);
										}
									}
								}
							}],
							dockedItems : [{
								xtype : 'pagingtoolbar',
								store : ContentStore,
								dock : 'bottom',
								displayInfo : true,
								displayMsg : 'Показване на резултати {0} - {1} от {2}',
								emptyMsg : 'Няма резултати',
								beforePageText : 'Страница',
								afterPageText : 'от {0}'
							}, {
								xtype : 'toolbar',
								dock : 'top',
								itemId : 'toptoolbar_content',
								items : [{
									xtype : 'button',
									text : 'New',
									itemId : 'new',
									icon : base_url + 'libraries/images/add_content.png',
									scale : 'large',
									handler : function() {
										contentEditMode = 'new';
										renderContentEditWidgets('new');
									}
								}, {
									xtype : 'button',
									text : 'Copy',
									itemId : 'copy',
									disabled : true,
									icon : base_url + 'libraries/images/copy.png',
									scale : 'large'
								}, {
									xtype : 'button',
									text : 'Delete',
									itemId : 'delete',
									disabled : true,
									icon : base_url + 'libraries/images/delete.png',
									scale : 'large',
									handler : deleteContentItem
								}, '-', {
									xtype : 'combobox',
									fieldLabel : 'Show',
									store : ContentTypeStore,
									displayField : 'name',
									valueField : 'id',
									labelAlign : 'right',
									editable : false,
									width : 330,
									listeners : {
										scope : this,
										'change' : filterContent
									}
								}]
							}],
							listeners : {
								itemdblclick : {
									fn : onContentItemDblClick,
									scope : this
								},
								select : {
									fn : onContentSelect,
									scope : this
								},
								deselect : {
									fn : onContentDeselect,
									scope : this
								}
							}
						}]
					}]
				}]
			}]
		});
	}
});

function deleteMenuItem() {
	if(Ext.getCmp('menus').getSelectionModel().hasSelection()) {
		var node = Ext.getCmp('menus').getSelectionModel().getSelection()[0];
		Ext.Msg.confirm('Изтриване', 'Сигурни ли сте, че искате да изтриете "' + node.data.item + '", както и всички подменюта ако има такива?', function(button) {
			if(button === 'yes') {
				node.destroy();
			}
		});
	} else {
		return;
	}
}

function deleteContentItem() {
	if(Ext.getCmp('contents').getSelectionModel().hasSelection()) {
		var node = Ext.getCmp('contents').getSelectionModel().getSelection()[0];
		Ext.Msg.confirm('Delete', 'Are you sure you want to delete "' + node.data.name + '"?', function(button) {
			if(button === 'yes') {
				ContentStore.remove(node);
			}
		});
	} else {
		return;
	}
}

function renderContentEditWidgets(content_id) {
	var contentEditForm = contentEdit.child('form');
	Ext.Ajax.request({
		url : base_url + 'content/content_type_admin_ui_json',
		params : {
			type : Ext.getCmp('contents').getDockedComponent('toptoolbar_content').items.items[4].getValue()
		},
		success : function(response) {
			var data = Ext.decode(response.responseText);
			contentEditForm.removeAll(true);
			contentEdit.setTitle(data.new_item_text);
			contentEditForm.add(published_widget);
			if(data.show_date_field) {
				contentEditForm.add(date_widget);
			}
			contentEditForm.add(data.custom_fields);
			contentEdit.admin_title_field = data.admin_title_field;
			contentEdit.show();
			if(content_id != 'new') {
				contentEdit.setTitle(data.edit_item_text);
				loadContentData(content_id);
			}
		}
	});
}

function filterContent(combo, newValue, oldValue, opts) {
	var record = ContentTypeStore.getById(newValue);
	currentContentOnlyEdit = record.data.only_edit;
	currentContentDD = record.data.admin_dd_sort;
	var content_cmp = Ext.getCmp('contents');

	content_cmp.getDockedComponent('toptoolbar_content').items.items[0].setDisabled(record.data.only_edit);

	clearSortArrows();

	if(content_cmp.getView().getPlugin('gridviewdragdrop').dragZone) {
		if(currentContentDD) {
			Ext.get('contents').addCls('reorder-icon');
			content_cmp.getView().getPlugin('gridviewdragdrop').dragZone.locked = false;
		} else {
			Ext.get('contents').removeCls('reorder-icon');
			content_cmp.columns[2].addCls('x-column-header-sort-DESC');
			content_cmp.getView().getPlugin('gridviewdragdrop').dragZone.locked = true;
		}
	}
	currentContentType = newValue;
	ContentStore.proxy.setExtraParam('type', newValue);

	ContentStore.reload({
		params : {
			start : 0,
			limit : contentItemsPerPage,
			page : 1,
			sort : Ext.encode([{
				property : 'date',
				direction : 'desc'
			}])
		}
	});
}

function onMenusSelect(tablepanel, record, index, eOpts) {
	Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[1].setDisabled(false);
	//Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[2].setDisabled(false);
	if(record.data.system == 0) {
		Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[3].setDisabled(false);
	}
}

function onMenusDeselect(tablepanel, record, index, eOpts) {
	Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[1].setDisabled(true);
	//Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[2].setDisabled(true);
	Ext.getCmp('menus').getDockedComponent('toptoolbar').items.items[3].setDisabled(true);
}

function onMenusItemDblClick(tablepanel, record, item, index, e, options) {
	if(record.data.system == 1) {
		Ext.MessageBox.show({
			title : 'ВНИМАНИЕ',
			msg : 'Този елемент е СИСТЕМЕН и не може да бъде променян!',
			icon : Ext.MessageBox.ALERT,
			buttons : Ext.Msg.OK
		});
		return false;
	}
	menuGridEditMode = 'edit';
	if(record.data.type == 'menu_item') {
		menuButtonEdit.setTitle('Редактиране на меню');
		menuButtonEdit.child('form').child('#resource').setVisible(false);
		menuButtonEdit.child('form').child('#class').setVisible(false);
		menuButtonEdit.child('form').child('#target').setVisible(false);
	} else {
		menuButtonEdit.setTitle('Редактиране на бутон');
		menuButtonEdit.child('form').child('#resource').setVisible(true);
		menuButtonEdit.child('form').child('#class').setVisible(true);
		menuButtonEdit.child('form').child('#target').setVisible(true);
	}
	menuButtonEdit.child('form').child('#lang1').setValue(record.data.lang1);
	menuButtonEdit.child('form').child('#lang1').setFieldLabel(settings_cfg.languages.lang1.admin_name);
	menuButtonEdit.child('form').child('#lang1').setVisible(settings_cfg.languages.lang1.enabled);
	menuButtonEdit.child('form').child('#lang2').setValue(record.data.lang2);
	menuButtonEdit.child('form').child('#lang2').setFieldLabel(settings_cfg.languages.lang2.admin_name);
	menuButtonEdit.child('form').child('#lang2').setVisible(settings_cfg.languages.lang2.enabled);
	menuButtonEdit.child('form').child('#lang3').setValue(record.data.lang3);
	menuButtonEdit.child('form').child('#lang3').setFieldLabel(settings_cfg.languages.lang3.admin_name);
	menuButtonEdit.child('form').child('#lang3').setVisible(settings_cfg.languages.lang3.enabled);
	menuButtonEdit.child('form').child('#lang4').setValue(record.data.lang4);
	menuButtonEdit.child('form').child('#lang4').setFieldLabel(settings_cfg.languages.lang4.admin_name);
	menuButtonEdit.child('form').child('#lang4').setVisible(settings_cfg.languages.lang4.enabled);
	menuButtonEdit.child('form').child('#lang5').setValue(record.data.lang5);
	menuButtonEdit.child('form').child('#lang5').setFieldLabel(settings_cfg.languages.lang5.admin_name);
	menuButtonEdit.child('form').child('#lang5').setVisible(settings_cfg.languages.lang5.enabled);
	menuButtonEdit.child('form').child('#lang6').setValue(record.data.lang6);
	menuButtonEdit.child('form').child('#lang6').setFieldLabel(settings_cfg.languages.lang6.admin_name);
	menuButtonEdit.child('form').child('#lang6').setVisible(settings_cfg.languages.lang6.enabled);
	menuButtonEdit.child('form').child('#resource').setValue(record.data.resource);
	menuButtonEdit.child('form').child('#class').setValue(record.data.class);
	menuButtonEdit.child('form').child('#target').setValue(record.data.target);
	menuButtonEdit.child('form').child('#id').setValue(record.data.id);
	if(record.data.published == '1') {
		menuButtonEdit.child('form').child('#published').child('#published_yes').setValue(true);
	} else {
		menuButtonEdit.child('form').child('#published').child('#published_no').setValue(true);
	}
	menuButtonEdit.show();
	return false;
}

function onContentItemDblClick(tablepanel, record, item, index, e, options) {
	contentEditMode = 'edit';
	contentEdit.setTitle('Редактиране на съдържание');
	renderContentEditWidgets(record.data);

}

function onContentSelect(tablepanel, record, index, eOpts) {
	if(!currentContentOnlyEdit && record.data.system == 0) {
		Ext.getCmp('contents').getDockedComponent('toptoolbar_content').items.items[2].setDisabled(false);
	}
}

function onContentDeselect(tablepanel, record, index, eOpts) {
	if(!currentContentOnlyEdit && record.data.system == 0) {
		Ext.getCmp('contents').getDockedComponent('toptoolbar_content').items.items[2].setDisabled(true);
	}
}

function loadContentData(content_data) {
	var contentEditForm = contentEdit.child('form');

	Ext.Ajax.request({
		url : base_url + 'content/getContentItemJson',
		params : {
			id : content_data.id
		},
		success : function(response) {
			var data = Ext.decode(response.responseText);
			contentEdit.child('form').items.each(function(field) {
				if(field.itemId == 'published') {
					if(content_data.published == '1') {
						contentEditForm.child('#published').child('#published_yes').setValue(true);
					} else {
						contentEditForm.child('#published').child('#published_no').setValue(true);
					}
				} else if(field.itemId == 'date') {
					field.setValue(content_data.date);
				} else {
					field.setValue(data.content.content_fields[field.name]);
				}
			});
		}
	});
}

var linkTargetStore = Ext.create('Ext.data.Store', {
	fields : ['label', 'value'],
	data : [{
		"label" : "същия прозорец",
		"value" : "_self"
	}, {
		"label" : "нов прозорец",
		"value" : "_blank"
	}]
});
var menuButtonEdit = Ext.create('Ext.window.Window', {
	floating : true,
	autoHeight : true,
	hidden : true,
	hideMode : 'display',
	minWidth : 400,
	resizable : false,
	width : 400,
	layout : {
		type : 'fit'
	},
	closeAction : 'hide',
	title : 'Редактиране на бутон',
	modal : true,
	plain : false,
	buttons : [{
		text : 'Save',
		scale : 'medium',
		icon : base_url + 'libraries/images/save.png',
		handler : function() {
			
			if(menuButtonEdit.child('form').getForm().isValid()) {
				if(menuGridEditMode == 'new_button') {
					if(Ext.getCmp('menus').getSelectionModel().hasSelection()) {
						var node = Ext.getCmp('menus').getSelectionModel().getSelection()[0];
					} else {
						return;
					}
					var published_val;
					if(menuButtonEdit.child('form').child('#published').child('#published_yes').getValue() == true) {
						published_val = 1;
					} else {
						published_val = 0;
					}
					node.appendChild({
						lang1 : menuButtonEdit.child('form').child('#lang1').getValue(),
						lang2 : menuButtonEdit.child('form').child('#lang2').getValue(),
						lang3 : menuButtonEdit.child('form').child('#lang3').getValue(),
						lang4 : menuButtonEdit.child('form').child('#lang4').getValue(),
						lang5 : menuButtonEdit.child('form').child('#lang5').getValue(),
						lang6 : menuButtonEdit.child('form').child('#lang6').getValue(),
						resource : menuButtonEdit.child('form').child('#resource').getValue(),
						class : menuButtonEdit.child('form').child('#class').getValue(),
						target : menuButtonEdit.child('form').child('#target').getValue(),
						item : menuButtonEdit.child('form').child('#' + settings_cfg.admin_language).getValue(),
						published : published_val,
						leaf : false
					});
				} else if(menuGridEditMode == 'new_menu') {
					var node = Ext.getCmp('menus').getRootNode();
					var published_val;
					if(menuButtonEdit.child('form').child('#published').child('#published_yes').getValue() == true) {
						published_val = 1;
					} else {
						published_val = 0;
					}
					node.appendChild({
						lang1 : menuButtonEdit.child('form').child('#lang1').getValue(),
						lang2 : menuButtonEdit.child('form').child('#lang2').getValue(),
						lang3 : menuButtonEdit.child('form').child('#lang3').getValue(),
						lang4 : menuButtonEdit.child('form').child('#lang4').getValue(),
						lang5 : menuButtonEdit.child('form').child('#lang5').getValue(),
						lang6 : menuButtonEdit.child('form').child('#lang6').getValue(),
						item : menuButtonEdit.child('form').child('#' + settings_cfg.admin_language).getValue(),
						published : published_val,
						leaf : false
					});
				} else if(menuGridEditMode == 'edit') {
					if(Ext.getCmp('menus').getSelectionModel().hasSelection()) {
						var node = Ext.getCmp('menus').getSelectionModel().getSelection()[0];
					} else {
						return;
					}
					node.beginEdit();
					node.set('item', menuButtonEdit.child('form').child('#' + settings_cfg.admin_language).getValue());
					node.set('lang1', menuButtonEdit.child('form').child('#lang1').getValue());
					node.set('lang2', menuButtonEdit.child('form').child('#lang2').getValue());
					node.set('lang3', menuButtonEdit.child('form').child('#lang3').getValue());
					node.set('lang4', menuButtonEdit.child('form').child('#lang4').getValue());
					node.set('lang5', menuButtonEdit.child('form').child('#lang5').getValue());
					node.set('lang6', menuButtonEdit.child('form').child('#lang6').getValue());
					node.set('resource', menuButtonEdit.child('form').child('#resource').getValue());
					node.set('class', menuButtonEdit.child('form').child('#class').getValue());
					node.set('target', menuButtonEdit.child('form').child('#target').getValue());
					if(menuButtonEdit.child('form').child('#published').child('#published_yes').getValue() == true) {
						node.set('published', 1);
					} else {
						node.set('published', 0);
					}
					node.endEdit();
				}
				menuButtonEdit.hide();
			}
		}
	}],
	items : [{
		xtype : 'form',
		bodyPadding : 10,
		title : '',
		items : [{
			xtype : 'textfield',
			name : 'lang1',
			itemId : 'lang1',
			width : 360,
			value : ''
		}, {
			xtype : 'textfield',
			name : 'lang2',
			itemId : 'lang2',
			width : 360,
			value : ''
		}, {
			xtype : 'textfield',
			name : 'lang3',
			itemId : 'lang3',
			width : 360,
			value : ''
		}, {
			xtype : 'textfield',
			name : 'lang4',
			itemId : 'lang4',
			width : 360,
			value : ''
		}, {
			xtype : 'textfield',
			name : 'lang5',
			itemId : 'lang5',
			width : 360,
			value : ''
		}, {
			xtype : 'textfield',
			name : 'lang6',
			itemId : 'lang6',
			width : 360,
			value : ''
		}, {
			xtype : 'contentchooser',
			name : 'resource',
			//hideTrigger: true,
			itemId : 'resource',
			width : 360,
			fieldLabel : 'URL'
		}, {
			xtype : 'radiogroup',
			layout : {
				align : 'stretch',
				type : 'hbox'
			},
			itemId : 'published',
			fieldLabel : 'Публикувано',
			items : [{
				xtype : 'radiofield',
				width : 45,
				name : 'published',
				itemId : 'published_yes',
				boxLabel : 'Да',
				inputValue : '1'
			}, {
				xtype : 'radiofield',
				width : 45,
				name : 'published',
				itemId : 'published_no',
				boxLabel : 'Не',
				inputValue : '0',
				checked : true
			}]
		}, {
			xtype : 'textfield',
			name : 'class',
			itemId : 'class',
			width : 360,
			fieldLabel : 'CSS Class'
		}, {
			xtype : 'combobox',
			name : 'target',
			itemId : 'target',
			width : 360,
			fieldLabel : 'Отваря се в',
			editable : false,
			store : linkTargetStore,
			queryMode : 'local',
			displayField : 'label',
			valueField : 'value',
			forceSelection : true,
			allowBlank : true,
			value : '_self'
		}, {
			xtype : 'hidden',
			name : 'id',
			itemId : 'id'
		}]
	}]
});
var MenusTreeStore = Ext.create('Ext.data.TreeStore', {
	autoLoad : true,
	autoSync : true,
	storeId : 'MenusTreeStore',
	defaultRootId : '',
	proxy : {
		type : 'ajax',
		api : {
			create : base_url + 'menus/newMenuItem',
			read : base_url + 'menus/getAllMenusJSON',
			update : base_url + 'menus/updateMenuItem',
			destroy : base_url + 'menus/deleteMenuItem'
		},
		reader : {
			type : 'json',
			idProperty : 'id',
			root : 'children',
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
		name : 'id',
		type : 'int'
	}, {
		name : 'item'
	}, {
		name : 'lang1'
	}, {
		name : 'lang2'
	}, {
		name : 'lang3'
	}, {
		name : 'lang4'
	}, {
		name : 'lang5'
	}, {
		name : 'lang6'
	}, {
		name : 'resource'
	}, {
		name : 'published'
	}, {
		name : 'class'
	}, {
		name : 'type'
	}, {
		name : 'target'
	}, {
		name : 'leaf'
	}, {
		name : 'system',
		type : 'int'
	}, {
		name : 'iconCls'
	}, {
		name : 'index',
		type : 'int'
	}]
});

var ContentStore = Ext.create('Ext.data.Store', {
	autoLoad : false,
	autoSync : true,
	storeId : 'ContentStore',
	defaultRootId : '',
	remoteSort : true,
	pageSize : contentItemsPerPage,
	listeners : {
		load : function(store, records, successful, eOpts) {
			console.log(records);
		}
	},
	proxy : {
		type : 'ajax',
		api : {
			create : base_url + 'content/create_content_json',
			read : base_url + 'content/read_content_json',
			update : base_url + 'content/update_content_json',
			destroy : base_url + 'content/delete_content_json'
		},
		reader : {
			type : 'json',
			idProperty : 'id',
			root : 'content',
			successProperty : 'success',
			totalProperty : 'total'
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
		name : 'id',
		type : 'int'
	}, {
		name : 'name'
	}, {
		name : 'content_type'
	}, {
		name : 'date',
		type : 'date',
		dateFormat : 'c'
	}, {
		name : 'last_edit_date',
		type : 'date',
		dateFormat : 'c'
	}, {
		name : 'published'
	}, {
		name : 'system',
		type : 'int'
	}, {
		name : 'fields_data'
	}, {
		name : 'index',
		type : 'int',
		mapping : 'order_num'
	}]
});
var ContentTypeStore = Ext.create('Ext.data.Store', {
	autoLoad : false,
	storeId : 'ContentTypeStore',
	defaultRootId : '',
	listeners : {
		load : function(store, records, successful, eOpts) {
			Ext.getCmp('contents').getDockedComponent('toptoolbar_content').items.items[4].setValue(records[0].data.id)
		}
	},
	proxy : {
		type : 'ajax',
		url : base_url + 'content/content_types_names_json',
		reader : {
			type : 'json',
			idProperty : 'id',
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
		name : 'id',
	}, {
		name : 'name',
	}, {
		name : 'lang1'
	}, {
		name : 'lang1_plural'
	}, {
		name : 'lang2'
	}, {
		name : 'lang2_plural'
	}, {
		name : 'lang3'
	}, {
		name : 'lang3_plural'
	}, {
		name : 'lang4'
	}, {
		name : 'lang4_plural'
	}, {
		name : 'lang5'
	}, {
		name : 'lang5_plural'
	}, {
		name : 'lang6'
	}, {
		name : 'lang6_plural'
	}, {
		name : 'admin_dd_sort'
	}, {
		name : 'only_edit'
	}, {
		name : 'index',
		type : 'int'
	}]
});

var date_widget = [{
	xtype : 'datetimefield',
	width : 500,
	labelWidth : 200,
	itemId : 'date',
	fieldLabel : 'Дата на публикуване',
	value : new Date()
}];

var published_widget = [{
	xtype : 'radiogroup',
	width : 500,
	layout : {
		align : 'stretch',
		type : 'hbox'
	},
	labelWidth : 200,
	itemId : 'published',
	fieldLabel : 'Публикувано',
	items : [{
		xtype : 'radiofield',
		width : 45,
		name : 'published',
		itemId : 'published_yes',
		boxLabel : 'Да',
		inputValue : '1'
	}, {
		xtype : 'radiofield',
		width : 45,
		name : 'published',
		itemId : 'published_no',
		boxLabel : 'Не',
		inputValue : '0',
		checked : true
	}]
}];

var contentEdit = Ext.create('Ext.window.Window', {
	floating : true,
	height : window.innerHeight - 40,
	hidden : true,
	hideMode : 'display',
	resizable : false,
	width : 1000,
	layout : {
		type : 'fit'
	},
	closeAction : 'hide',
	title : 'Съдържание',
	modal : true,
	plain : false,
	items : [{
		xtype : 'form',
		bodyPadding : 10,
		title : '',
		autoScroll : true
	}],
	buttons : [{
		text : 'Save',
		scale : 'large',
		icon : base_url + 'libraries/images/save.png',
		handler : function() {
			if(contentEdit.child('form').getForm().isValid()) {
				saveContent();
			}
		}
	}]
});

function saveContent() {
	var published_val;
	if(contentEdit.child('form').child('#published').child('#published_yes').getValue() == true) {
		published_val = 1;
	} else {
		published_val = 0;
	}
	var fields = new Object();
	contentEdit.child('form').items.each(function(field) {
		if(field.itemId == 'published') {
		} else if(field.itemId == 'date') {
		} else {
			fields[field.name] = field.getValue();
		}
	});
	if(contentEditMode == 'new') {

		if(contentEdit.child('form').child('#date')) {
			var record = ContentStore.add({
				name : getContentTitle(),
				content_type : currentContentType,
				published : published_val,
				date : contentEdit.child('form').child('#date').getValue(),
				fields_data : fields,
			});
		} else {
			var record = ContentStore.add({
				name : getContentTitle(),
				content_type : currentContentType,
				published : published_val,
				fields_data : fields,
			});
		}
		setTimeout(function() {
			clear_fields_data(record);
		}, 1000);
	} else if(contentEditMode == 'edit') {
		var contents_panl = Ext.getCmp('contents');

		if(contents_panl.getSelectionModel().hasSelection()) {
			var node = contents_panl.getSelectionModel().getSelection()[0];
		} else {
			return;
		}
		node.beginEdit();
		node.set('name', getContentTitle());
		node.set('published', published_val);
		if(contentEdit.child('form').child('#date')) {
			node.set('date', contentEdit.child('form').child('#date').getValue());
		}
		node.set('fields_data', fields);
		node.endEdit();

		setTimeout(function() {
			//clear_fields_data(node);
		}, 1000);
	}
	contentEdit.hide();
}

var full_cfg = {
	theme : "advanced",
	theme_advanced_row_height : 27,
	delta_height : 1,
	schema : "html5",
	plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	content_css : base_url+"theme/css/style.css",
	external_image_list_url : "image/images",
	document_base_url : base_url,
	image_profiles_data : image_profiles,
	file_browser_callback : 'openKCFinder'
};

var lite_cfg = {
	theme : "advanced",
	theme_advanced_row_height : 27,
	delta_height : 1,
	schema : "html5",
	plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	content_css : base_url+"theme/css/style.css",
	external_image_list_url : "image/images",
	document_base_url : base_url,
	image_profiles_data : image_profiles,
	file_browser_callback : 'openKCFinder'
};

function openKCFinder(field_name, url, type, win) {
	tinyMCE.activeEditor.windowManager.open({
		file : base_url + 'libraries/kcfinder/browse.php?opener=tinymce&lang=en&type=' + type,
		title : 'Файлов Браузър',
		width : 800,
		height : 500,
		resizable : "yes",
		inline : true,
		close_previous : "no",
		popup_css : false
	}, {
		window : win,
		input : field_name
	});
	return false;
}

function clear_fields_data(record) {
	record[0].data.fields_data = null;
}

function onGriddragdroppluginDrop(node, data, overModel, dropPosition, options) {
	var orderArray = new Array();
	for(var i = 0; i < ContentStore.data.items.length; i++) {
		console.log(i);
		orderArray.push({
			'id' : ContentStore.data.items[i].data.id,
			'order_num' : i
		});
	}
	Ext.Ajax.request({
		url : base_url + 'content/reorder_content_json',
		jsonData : orderArray,
		method : 'POST',
		failure : function(response) {
			Ext.MessageBox.show({
				title : 'ГРЕШКА',
				msg : response,
				icon : Ext.MessageBox.ERROR,
				buttons : Ext.Msg.OK
			});
		}
	});
}

function getContentTitle(){
	var title;
	try {
		title = contentEdit.child('form').child('#' + contentEdit.admin_title_field).getValue();
	} catch(e){
		title = contentEdit.admin_title_field
	}
	return title;
}

function clearSortArrows() {
	var content_cmp = Ext.getCmp('contents');
	Ext.each(content_cmp.columns, function(column) {
		column.removeCls('x-column-header-sort-ASC').removeCls('x-column-header-sort-DESC');
	}, this);
}
