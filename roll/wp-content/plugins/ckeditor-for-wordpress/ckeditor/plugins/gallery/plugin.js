(function () {
	CKEDITOR.plugins.add('gallery', {
		init: function (editor) {
			editor.ui.addButton('Gallery', {
				label : "Gallery images Gx Phuhoa",
				toolbar : 'insert',
				command : 'gallery',
				icon : this.path + 'images/icon.png'
			});
			CKEDITOR.dialog.add('galleryCommand', function (instance) {
				return {
					title : 'Popup Gallery GX Phu Hoa',
					minWidth : 390,
					minHeight : 130,
					contents : [
						{
							id : 'tab1',
							label : 'Label',
							title : 'Title',
							expand : true,
							padding : 0,
							elements :
							[
								{
									type : 'html',
									html : '<p>Nhập CÁC đường dẫn hình vào ô phía dưới, nhập xong nhấn enter</p>'
								},
								{
									type : 'textarea',
									id : 'textareaId',
									rows : 4,
									cols : 40
								}
							]
						}
					],
					buttons : [ CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton ],
					onOk : function() {
						var textareaObj = this.getContentElement( 'tab1', 'textareaId' );
						var element = CKEDITOR.dom.element.createFromHtml(textareaObj);
						var instance = this.getParentEditor();
						instance.insertElement(element);
					}
				};
				;
			});
			editor.addCommand('gallery',new CKEDITOR.dialogCommand( 'galleryCommand' ) )
		}
	});
	
})();