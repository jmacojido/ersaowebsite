<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->
		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Some information about this general settings option
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Allow mail redirect
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Other sets of options are available
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Expose author name in posts
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<!-- /.form-group -->

				<h3 class="control-sidebar-heading">Chat Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Show me as online
						<input type="checkbox" class="pull-right" checked>
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Turn off notifications
						<input type="checkbox" class="pull-right">
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Delete chat history
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
					</label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="<?php echo JS_URL ?>admin/jquery.min.js"></script>
<script src="<?php echo JS_URL ?>admin/jquery-ui.min.js"></script>
<script src="<?php echo JS_URL ?>admin/jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo JS_URL ?>admin/jquery.dataTables.min.js"></script>
<script src="<?php echo JS_URL ?>admin/dataTables.bootstrap.min.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo JS_URL ?>admin/bootstrap.min.js"></script>
<script src="<?php echo JS_URL ?>admin/sweetalert.min.js"></script>
<script src="<?php echo JS_URL ?>admin/select2.full.min.js"></script>
<script src="<?php echo JS_URL ?>admin/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo JS_URL ?>admin/fastclick.js"></script>
<script src="<?php echo JS_URL ?>admin/adminlte.min.js"></script>
<script src="<?php echo JS_URL ?>admin/demo.js"></script>
<script src="<?php echo JS_URL ?>admin/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('ol.sortable').nestedSortable({
		handle: 'div',
		items: 'li',
		maxLevels: 1,
		toleranceElement: '> div',
		change : function(){
			//console.log("change");
		}
	});



	$('#CategorySelection').change(function(){
		var category = $(this).val();
		$.ajax({
			url : "<?= site_url('admin/products/get_products_order'); ?>" ,
			method : 'POST',
			data : {category : category},
			complete : function(data){
				if(data.status == 200){
					$('ol.sortable').html(data.responseText);
				}
			},
			error : function(){

			}
		});
	});


	$('#SaveOrderProductsBtn').click(function(){
		var data = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
		//console.log(data);
		$.ajax({
			url : "<?= site_url('admin/products/save_products_order'); ?>" ,
			method : 'POST',
			data : {products : data},
			complete : function(data){
				if(data.status == 200){
					$('#ProductSortableMsg').html("Update Successfull!").removeClass().addClass('success');
					setTimeout(function(){
						$('#ProductSortableMsg').html('');
					}, 2000);
				}
			},
			error : function(){
				$('#ProductSortableMsg').html("Update Error!").removeClass().addClass('error');
			}
		});
	});

	$('#SaveOrderImageBtn').click(function(){
		var data = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
		//console.log(data);
		$.ajax({
			url : "<?= BASE_URL.'admin/media/save_image_order'; ?>" ,
			method : 'POST',
			data : {images : data},
			complete : function(data){
				if(data.status == 200){
					$('#SaveImgMsg').html('Update Successfully!').removeClass().addClass('success');
					setTimeout(function(){
						$('#SaveImgMsg').html('');
					}, 3000);
				}
			},
			error : function(){
				$('#SaveImgMsg').html('Update Error!').removeClass().addClass('error');
			}
		});
	});
});
var file_holder = []
var selDiv = $('#UploadListing');

$('#ImageSlider').change(function(e){
	if(!e.target.files || !window.FileReader) return;
	var files = e.target.files;

	var filesArr = Array.prototype.slice.call(files);
	filesArr.forEach(function(f,i) {
		file_holder.push(f);
	});
	var html = '';

	//console.log(file_holder);
	$.each(file_holder, function(key, data){
		var reader = new FileReader();
		reader.onload = function (e) {
			html += "<li id="+key+"><img src=\"" + e.target.result + "\" width='250' height='100'><a href=\"javascript:void(0)\" data-id="+key+"><i class=\"fa fa-times\"></i></a></li>";
			if(file_holder.length >= key+1){
				complete();
			}
		}
		reader.readAsDataURL(data);

	});

	function complete(){
		selDiv.html(html);
	}
});


$('#Uploadfile').click(function(){
	var uploader = $('#ImageSlider');
	var form_data = new FormData();
	// Loop through each of the selected files.
	for (var i = 0; i < file_holder.length; i++) {
		var file = file_holder[i];


		//console.log(file.type);
		// Check the file type.
		if (!file.type.match('image.*')) {
			alert("Image type only!");
			continue;
		}

		// Add the file to the request.
		form_data.append('files[]', file, file.name);
	}

	// Set up the request.
	var xhr = new XMLHttpRequest();

	xhr.upload.addEventListener("progress", uploadProgress, false);
	xhr.addEventListener("load", uploadComplete, false);
	xhr.addEventListener("error", uploadFailed, false);
	xhr.addEventListener("abort", uploadCanceled, false);
	// Open the connection.
	xhr.open('POST', '<?= BASE_URL."admin/media/uploads_image_slider"; ?>', true);
	// Send the Data.
	xhr.send(form_data);


	function uploadProgress(evt){
		var progress = Math.ceil(((evt.loaded) / evt.total) * 100);
		$('#SliderProgressBar').val(progress);
	}

	function uploadComplete(evt){
		var obj = jQuery.parseJSON(xhr.responseText);
		$('#UploadStatus').html(obj.msg);
		if(obj.status == "SUCCESS"){
			var str =  "";
			$.each(obj.ids, function(key, data){
				str += '<li data-id="'+data+'" id="list_'+data+'"><div class="ui-sortable-handle"><img src="<?= BASE_URL."admin/media/view_image_gallery/"; ?>'+data+'"  width="250" height="100"><a href="javascript:void(0)" onclick="deleteSliderImage('+data+')"><i class="fa fa-times"></i></a></div></li>';
			});

			$('div.slider-images-wrap ol li.empty').remove();

			$('div.slider-images-wrap ol').append(str);
		}else{
			$('#UploadStatus').html(obj.msg);
		}
	}

	function uploadFailed(evt){

	}

	function uploadCanceled(evt){

	}
});

$('#ClearSelectedFilesBtn').click(function(){
	file_holder = [];
	$('#UploadListing').html('');
	$('#UploadListing').html('<span>File uploads here!</span>');
});

$('body').on('click', '#UploadListing li a',function(){

	var list_id = $(this).data('id');
	var list = $('#UploadListing li[id="'+list_id+'"]');
	var index = list.index();
	file_holder.splice(index, 1);
	list.remove();

	if(file_holder.length == 0){
		$('#UploadListing').html('<span>File uploads here!</span>');
	}


});

$('#History').change(function(e){
	do_upload(e);
});

$('#MissionVision').change(function(e){
	do_upload(e);
});

$('#BestSellers').change(function(e){
	do_upload(e);
});

$('#BranchCenter').change(function(e){
	do_upload(e);
});

$('#ContactUs').change(function(e){
	do_upload(e);
});

$('#RightBG').change(function(e){
	do_upload(e);
});

$('#LeftBG').change(function(e){
	do_upload(e);
});


function do_upload(e){
	if(!e.target.files || !window.FileReader) return;
	var files = e.target.files;
	var id = e.target.id;
	var name = e.target.name;

	// check file type
	if (!files[0].type.match('image.*')) {
		alert("Image Only!");
		return;
	}

	var reader = new FileReader();
	reader.onload = function (e) {
		var result = e.target.result;
		var div_container = $("#"+id + "+ div");
		var width = div_container.width();
		var height = div_container.height();
		div_container.css({"background" : "url(" + result +") no-repeat", "background-size": width+"px "+ height+"px"});
	}

	reader.readAsDataURL(files[0]);

	var form_data = new FormData();
	form_data.append(name, files[0]);

	//  // Set up the request.
	var xhr = new XMLHttpRequest();
	xhr.upload.addEventListener("progress", uploadProgress, false);
	xhr.addEventListener("load", uploadComplete, false);
	xhr.addEventListener("error", uploadFailed, false);
	xhr.addEventListener("abort", uploadCanceled, false);
	// Open the connection.
	xhr.open('POST', '<?= BASE_URL."admin/media/upload"; ?>', true);
	// Send the Data.
	xhr.send(form_data);

	function uploadProgress(evt){
		var progress = Math.ceil(((evt.loaded) / evt.total) * 100);

		$('#'+ id + ' + div > label > span:first-child').css({"background" : "none"});
		$('#'+ id + ' + div > label > span:last-child').css({"width" : progress + "%"});
	}

	function uploadComplete(evt){
		var obj = jQuery.parseJSON(xhr.responseText);
		var upload_msg = $('#UploadSingleMsg');
		var progressbar = $('#'+ id + ' + div > label > span:last-child');
		var progressbar_title = $('#'+ id + ' + div > label > span:first-child');
		var box_border = $('#'+ id + ' + div');
		if(obj.status == "SUCCESS"){
			upload_msg.html(obj.msg).removeClass().addClass('success');
			box_border.css({"border" : "2px dashed green"});
			progressbar.removeClass().addClass('success');
			progressbar_title.removeClass().addClass('success');
		}else{
			upload_msg.html(obj.msg).removeClass().addClass('error');
			box_border.css({"border" : "2px dashed #E94A4A"});
			progressbar.removeClass().addClass('error');
			progressbar_title.removeClass().addClass('error');
		}

		// setTimeout(function(){
		//     upload_msg.html('').removeClass();
		// }, 10000)
	}

	function uploadFailed(evt){

	}

	function uploadCanceled(evt){
	}
}
<?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'media') { ?>
	$(function(){
		$.each(<?= $media_single; ?>, function(key,data){
			data.file_name = data.file_name.replace("home_","");
			data.file_name = data.file_name.replace('.png','');
			data.file_name = data.file_name.replace('.jpg','');
			data.file_name = data.file_name.replace('.jpeg','');
			var image_container = $('input[name="'+data.file_name+'"] + div');
			var width = image_container.width();
			var height = image_container.height();
			image_container.css({"background" : "url(<?= site_url('admin/media/view_image_gallery'); ?>/" + data.id +") no-repeat", "background-size" : width+"px " + height+"px"});
		});
	});

	function deleteSliderImage(id){
		if(confirm("Are you sure you want to delete this image from slider!")){
			$.ajax({
				url : "<?= BASE_URL.'admin/media/delete'; ?>",
				method : 'post',
				data : { id : id },
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					//console.log(obj);
					if(obj.status == "SUCCESS"){
						$('div.slider-images-wrap ol li[data-id="'+id+'"]').remove();
						var list = $('div.slider-images-wrap ol li');
						if(list.length == 0){
							$('div.slider-images-wrap ol').html('<li class="empty">No images in slider</li>');
						}
					}
				},
				error : function(){

				}
			});
		}
	}
	<?php  } ?>

	<?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'menus') { ?>
		$('.select2').select2()
		$(function () {
			inquery.dataTableInit();
		});
		$('#price').keypress(function(e) {
			var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
			if (verified) {e.preventDefault();}
		});
		var urls = "<?php echo BASE_URL;?>/admin/menus/get_menu_list";
		var inquery = {
			dataTableInit : function(){
				var sort_idx = 0;
				var display_length = 10;
				campaign_table = $('#menu_table').DataTable({
					//"aaSorting": [[sort_idx, "asc"]],
					"iDisplayLength": display_length,
					"columnDefs": [{
						"targets": sort_idx-1,
						"orderable": true
					}],

					"autoWidth": false,
					"destroy" : true,
					"processing": true,
					//"serverSide": true,
					// "stateSave" : true,
					"ajax": {
						"url": "<?php echo BASE_URL;?>/admin/menus/get_menu_list",
						"type": "POST",
					},
					"fnInitComplete": function (oSettings, json) {
						$('.sr-loader').hide();
						$('.sr-content').show();
					}
				});
			}
		}

		$('#modal-edit').on('show.bs.modal', function (event) {
			var val = $(event.relatedTarget).data('stuff');
			$.ajax({
				url : "<?= site_url('admin/menus/get_menu_by_id/'); ?>"+val,
				method : 'POST',
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					$('#title').text("EDIT "+obj.data.name+" MENU");
					$('#edit_id').val(obj.data.id);
					$('#edit_name').val(obj.data.name);
					$('#edit_taiwan_name').val(obj.data.name_taiwan);
					$('#edit_description').val(obj.data.description);
					$('#edit_category').val(obj.data.category).change();
					if(obj.data.active == 1){
						$('#active').prop('checked', true);
					}
					if(obj.data.on_promo == 1){
						$('#promo').prop('checked', true);
					}
					var image_container = $('input[name="product_image"] + div');
					var width = image_container.width();
					var height = image_container.height();
					image_container.css({"background" : "url(<?= site_url('admin/media/view_image_gallery'); ?>/" + obj.media.id +") no-repeat", "background-size" : width+"px " + height+"px"});
				},
				error : function(){
					console.log("error");
				}
			});
		});
		var menu_entry = undefined;
		$('#modal-varation').on('show.bs.modal', function (event) {
			var val = $(event.relatedTarget).data('stuff');
			menu_entry = $(event.relatedTarget).data('stuff');
			var name = $(event.relatedTarget).data('name');
			$('#title_var').text(name+" MENU ENTRY VARATION");
			var varation = {
				dataTableInit : function(){
					var sort_idx = 0;
					var display_length = 10;
					campaign_table = $('#menu_varation_table').DataTable({
						//"aaSorting": [[sort_idx, "asc"]],
						"iDisplayLength": display_length,
						"columnDefs": [{
							"targets": sort_idx-1,
							"orderable": false
						}],

						"autoWidth": false,
						"destroy" : true,
						"processing": true,
						//"serverSide": true,
						// "stateSave" : true,
						"ajax": {
							"url": "<?php echo BASE_URL;?>/admin/menus/get_menu_varation_list/"+val,
							"type": "POST",
						},
						"fnInitComplete": function (oSettings, json) {
							$('.sr-loader').hide();
							$('.sr-content').show();
						}
					});
				}
			}
			varation.dataTableInit();
		});
		var file_holder = [];

		$('#modal-edit').on('hidden.bs.modal', function (e) {
			$('#edit_name').val('');
			$('#edit_taiwan_name').val('');
			$('#edit_description').val('');
			$('#active').prop("checked", "").end();
			$("#UploadSingleMsg").html('').removeClass();
			resetFormElement($('#ProductImage'));
		})
		$('#modal-add').on('hidden.bs.modal', function (e) {
			$('#add_name').val('');
			$('#add_taiwan_name').val('');
			$('#add_description').val('');
			$('#ProductImage').val('');
			$('#add_active').prop("checked", "").end();
			$('#add_on_promo').prop("checked", "").end();
			$("#AddMenuMsg").html('').removeClass();
			$('#bg_edit').removeAttr( 'style' );
			console.log(e);
		})
		function resetFormElement(e) {
			e.wrap('<form>').closest('form').get(0).reset();
			e.unwrap();

			// Prevent form submission
			//console.log(e);
		}

		$('#ProductImage').change(function(e){
			file_ready(e);
		});


		var img_id = undefined;
		function file_ready(e){
			if(!e.target.files || !window.FileReader) return;
			var files = e.target.files;
			id = e.target.id;
			img_id = e.target.id;
			var name = e.target.name;
			file_holder = e.target.files;
			// check file type
			if (!files[0].type.match('image.*')) {
				alert("Image Only!");
				return;
			}

			var reader = new FileReader();
			reader.onload = function (e) {
				var result = e.target.result;
				var div_container = $("#"+id + "+ div");
				var width = div_container.width();
				var height = div_container.height();
				div_container.css({"background" : "url(" + result +") no-repeat", "background-size": width+"px "+ height+"px"});
			}
			reader.readAsDataURL(files[0]);
		}

		$('#SaveChanges').click(function(){
			var form_data = new FormData();
			var name = $('#edit_name').val();
			var taiwan_name = $('#edit_taiwan_name').val();
			var category = $('#edit_category :selected').val();
			var description = $('#edit_description').val();
			var id = $('#edit_id').val();
			var active = 0;
			if ($('#active').is(":checked"))
			{
			  active = 1;
			}
			var on_promo = 0;
			if ($('#on_promo').is(":checked"))
			{
			  on_promo = 1;
			}
			form_data.append('name', name);
			form_data.append('taiwan_name', taiwan_name);
			form_data.append('category', category);
			form_data.append('active', active);
			form_data.append('on_promo', on_promo);
			form_data.append('description', description);
			form_data.append('image', file_holder[0]);

			//  // Set up the request.
			var xhr = new XMLHttpRequest();
			xhr.upload.addEventListener("progress", uploadProgress, false);
			xhr.addEventListener("load", uploadComplete, false);
			xhr.addEventListener("error", uploadFailed, false);
			xhr.addEventListener("abort", uploadCanceled, false);
			// Open the connection.
			xhr.open('POST', '<?= BASE_URL."admin/menus/edit/"; ?>'+id, true);
			// Send the Data.
			xhr.send(form_data);

			function uploadProgress(evt){
				var progress = Math.ceil(((evt.loaded) / evt.total) * 100);

				$('#'+ id + ' + div > label > span:first-child').css({"background" : "none"});
				$('#'+ id + ' + div > label > span:last-child').css({"width" : progress + "%"});
			}

			function uploadComplete(evt){
				var obj = jQuery.parseJSON(xhr.responseText);
				var upload_msg = $('#UploadSingleMsg');
				var progressbar = $('#'+ id + ' + div > label > span:last-child');
				var progressbar_title = $('#'+ id + ' + div > label > span:first-child');
				var box_border = $('#'+ id + ' + div');
				if(obj.status == "SUCCESS"){
					swal("Success", obj.msg, "success");
					upload_msg.html(obj.msg).removeClass().addClass('success');
					box_border.css({"border" : "2px dashed green"});
					progressbar.removeClass().addClass('success');
					progressbar_title.removeClass().addClass('success');
				}else{
					swal("Oops!", obj.msg, "error");
					box_border.css({"border" : "2px dashed #E94A4A"});
					progressbar.removeClass().addClass('error');
					progressbar_title.removeClass().addClass('error');
				}
				var ref = $('#menu_table').DataTable();
				ref.ajax.reload();
				// setTimeout(function(){
				//     upload_msg.html('').removeClass();
				// }, 10000)
			}

			function uploadFailed(evt){

			}

			function uploadCanceled(evt){
			}
		});
		$('#AddMenu').click(function(){
			var form_data = new FormData();
			var name = $('#add_name').val();
			var taiwan_name = $('#add_taiwan_name').val();
			var category = $('#add_category :selected').val();
			var description = $('#add_description').val();
			var active = 0;
			var on_promo =0;
			if ($('#add_active').is(":checked"))
			{
			  active = 1;
			}
			if ($('#add_on_promo').is(":checked"))
			{
			  on_promo = 1;
			}
			form_data.append('name', name);
			form_data.append('taiwan_name', taiwan_name);
			form_data.append('category', category);
			form_data.append('active', active);
			form_data.append('on_promo', on_promo);
			form_data.append('description', description);
			form_data.append('image', file_holder[0]);

			//  // Set up the request.
			var xhr = new XMLHttpRequest();
			xhr.upload.addEventListener("progress", uploadProgress, false);
			xhr.addEventListener("load", uploadComplete, false);
			xhr.addEventListener("error", uploadFailed, false);
			xhr.addEventListener("abort", uploadCanceled, false);
			// Open the connection.
			xhr.open('POST', '<?= BASE_URL."admin/menus/add"; ?>', true);
			// Send the Data.
			xhr.send(form_data);

			function uploadProgress(evt){
				var progress = Math.ceil(((evt.loaded) / evt.total) * 100);

				$('#'+ img_id + ' + div > label > span:first-child').css({"background" : "none"});
				$('#'+ img_id + ' + div > label > span:last-child').css({"width" : progress + "%"});
			}

			function uploadComplete(evt){
				var obj = jQuery.parseJSON(xhr.responseText);
				var upload_msg = $('#AddMenuMsg');
				var progressbar = $('#'+ img_id + ' + div > label > span:last-child');
				var progressbar_title = $('#'+ img_id + ' + div > label > span:first-child');
				var box_border = $('#'+ img_id + ' + div');
				if(obj.status == "SUCCESS"){
					var ref = $('#menu_table').DataTable();
					ref.ajax.reload();
					swal("Success!", obj.msg, "success");
					box_border.css({"border" : "2px dashed green"});
					progressbar.removeClass().addClass('success');
					progressbar_title.removeClass().addClass('success');
				}else{
					swal("Oops!", obj.msg, "error");
					box_border.css({"border" : "2px dashed #E94A4A"});
					progressbar.removeClass().addClass('error');
					progressbar_title.removeClass().addClass('error');
				}

				// setTimeout(function(){
				//     upload_msg.html('').removeClass();
				// }, 10000)
			}

			function uploadFailed(evt){

			}

			function uploadCanceled(evt){
			}
		});

		$("#AddVaration").click(function(){
			var type = $('#type').val();
			var price = $('#price').val();
			var size = $('#size').val();
			var menu_entry_id = menu_entry;
			$.ajax({
				url : "<?= BASE_URL.'admin/menus/add_varation'; ?>",
				method : 'post',
				data : { type : type, price : price, size : size, menu_entry : menu_entry_id },
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					//console.log(obj);
					if(obj.status == "SUCCESS"){
						$('#type').val('');
						$('#price').val('');
						$('#size').val('');

						var ref = $('#menu_varation_table').DataTable();
						ref.ajax.reload();
						swal("Success", "Menu entry varation has been added.", "success");
					}
					else{
						swal("Oops", obj.msg, "error");
					}
				},
				error : function(){

				}
			});
		});

		function delete_varation(id_entry){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this menu entry varation!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "<?= BASE_URL.'admin/menus/delete_menu_varation/'; ?>",
						method : 'post',
						data : { id : id_entry },
						complete : function(data){
							var obj = jQuery.parseJSON(data.responseText);
							//console.log(obj);
							if(obj.status == "SUCCESS"){
								$('#type').val('');
								$('#price').val('');
								$('#size').val('');

								var ref = $('#menu_varation_table').DataTable();
								ref.ajax.reload();

								swal("Success", obj.msg, "success");

							}
							else{
								swal("Oops", obj.msg, "error");
							}
						},
						error : function(){

						}
					});
				} else {
				}
			});
		}

		function delete_menu(id_entry){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this menu entry",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "<?= BASE_URL.'admin/menus/delete_menu/'; ?>",
						method : 'post',
						data : { id : id_entry },
						complete : function(data){
							var obj = jQuery.parseJSON(data.responseText);
							//console.log(obj);
							if(obj.status == "SUCCESS"){
								var ref = $('#menu_table').DataTable();
								ref.ajax.reload();
								swal("Success", obj.msg, "success");
							}
							else{
								swal("Oops", obj.msg, "error");
							}
						},
						error : function(){

						}
					});
				} else {
				}
			});
		}
	<?php  } ?>

	<?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'events') { ?>
		$('ol.sortable-evt').nestedSortable({
			handle: 'div',
			items: 'li',
			maxLevels: 1,
			toleranceElement: '> div',
			change : function(){
				//console.log("change");
			}
		});
		$('.select2').select2()
		$(function () {
			reservation.dataTableInit();
		});
		var reservation = {
			dataTableInit : function(){
				var sort_idx = 0;
				var display_length = 10;
				campaign_table = $('#reservation_table').DataTable({
					//"aaSorting": [[sort_idx, "asc"]],
					"iDisplayLength": display_length,
					"columnDefs": [{
						"targets": sort_idx-1,
						"orderable": false
					}],

					"autoWidth": false,
					"destroy" : true,
					"processing": true,
					//"serverSide": true,
					// "stateSave" : true,
					"ajax": {
						"url": "<?php echo BASE_URL;?>admin/events/get_reservation_list",
						"type": "POST",
					},
					"fnInitComplete": function (oSettings, json) {
						$('.sr-loader').hide();
						$('.sr-content').show();
					}
				});
			}
		}

		var file_holder = []
		var selDiv = $('#UploadListingEvt');

		$('#ImageSliderEvt').change(function(e){
			if(!e.target.files || !window.FileReader) return;
			var files = e.target.files;

			var filesArr = Array.prototype.slice.call(files);
			filesArr.forEach(function(f,i) {
				file_holder.push(f);
			});
			var html = '';

			//console.log(file_holder);
			$.each(file_holder, function(key, data){
				var reader = new FileReader();
				reader.onload = function (e) {
					html += "<li id="+key+"><img src=\"" + e.target.result + "\" width='90' height='90'><a href=\"javascript:void(0)\" data-id="+key+"><i class=\"fa fa-times\"></i></a></li>";
					if(file_holder.length >= key+1){
						complete();
					}
				}
				reader.readAsDataURL(data);

			});

			function complete(){
				selDiv.html(html);
			}
		});
		$('#SaveEvent').click(function(){
			var uploader = $('#ImageSliderEvt');
			var form_data = new FormData();
			// Loop through each of the selected files.
			var media_id = $('#event_media_id').val();
			var title = $('#event_title').val();
			var description = $('#event_description').val();
			var status = $('#event_status :selected').val();
			for (var i = 0; i < file_holder.length; i++) {
				var file = file_holder[i];


				//console.log(file.type);
				// Check the file type.
				if (!file.type.match('image.*')) {
					alert("Image type only!");
					continue;
				}

				// Add the file to the request.
				form_data.append('files[]', file, file.name);
			}
			form_data.append('media_id', media_id);
			form_data.append('title', title);
			form_data.append('description', description);
			form_data.append('status', status);
			// Set up the request.
			var xhr = new XMLHttpRequest();

			xhr.upload.addEventListener("progress", uploadProgress, false);
			xhr.addEventListener("load", uploadComplete, false);
			xhr.addEventListener("error", uploadFailed, false);
			xhr.addEventListener("abort", uploadCanceled, false);
			// Open the connection.
			xhr.open('POST', '<?= BASE_URL."admin/events/set_event"; ?>', true);
			// Send the Data.
			xhr.send(form_data);


			function uploadProgress(evt){
				var progress = Math.ceil(((evt.loaded) / evt.total) * 100);
				$('#SliderProgressBar').val(progress);
			}

			function uploadComplete(evt){
				var obj = jQuery.parseJSON(xhr.responseText);
				if(obj.status == "SUCCESS"){
					var str =  "";
					$.each(obj.ids, function(key, data){
						str += '<li data-id="'+data+'" id="list_'+data+'"><div class="ui-sortable-handle"><img src="<?= BASE_URL."admin/media/view_image_gallery/"; ?>'+data+'"  width="90" height="90"><a href="javascript:void(0)" onclick="deleteSliderImage('+data+')"><i class="fa fa-times"></i></a></div></li>';
					});

					$('div.slider-images-wrap ol li.empty').remove();

					$('div.slider-images-wrap ol').append(str);
					var ref = $('#menu_table').DataTable();
					ref.ajax.reload();
					swal("Success", obj.msg, "success");
				}else{
					swal("Oops!", obj.msg, "error");
				}
			}

			function uploadFailed(evt){

			}

			function uploadCanceled(evt){

			}
		});

		$('#SaveOrderImageEventBtn').click(function(){
			var data = $('ol.sortable-evt').nestedSortable('toHierarchy', {startDepthCount: 0});
			//console.log(data);
			$.ajax({
				url : "<?= BASE_URL.'admin/media/save_image_order'; ?>" ,
				method : 'POST',
				data : {images : data},
				complete : function(data){
					if(data.status == 200){
						$('#SaveImgMsg').html('Update Successfully!').removeClass().addClass('success');
						setTimeout(function(){
							$('#SaveImgMsg').html('');
						}, 3000);
					}
				},
				error : function(){
					$('#SaveImgMsg').html('Update Error!').removeClass().addClass('error');
				}
			});
		});


		$('#ClearSelectedFilesBtnEvt').click(function(){
			file_holder = [];
			$('#UploadListingEvt').html('');
			$('#UploadListingEvt').html('<span>File uploads here!</span>');
		});

		$('body').on('click', '#UploadListingEvt li a',function(){

			var list_id = $(this).data('id');
			var list = $('#UploadListingEvt li[id="'+list_id+'"]');
			var index = list.index();
			file_holder.splice(index, 1);
			list.remove();

		});


		$('#modal-event').on('show.bs.modal', function (event) {
			var val = $(event.relatedTarget).data('stuff');
			$.ajax({
				url : "<?= site_url('admin/events/get_event_by_id/'); ?>"+val,
				method : 'POST',
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					$('#title').text(obj.data.name+"'s Event");
					$('#event_media_id').val(obj.data.id);
					$('#event_title').val(obj.data.title);
					$('#event_description').val(obj.data.description);
					$('#event_status').val(obj.data.status).change();
					var str =  "";
					$.each(obj.media_ids, function(key, data){
						str += '<li data-id="'+data.id+'" id="list_'+data.id+'"><div class="ui-sortable-handle"><img src="<?= BASE_URL."admin/media/view_image_gallery/"; ?>'+data.id+'"  width="90" height="90"><a href="javascript:void(0)" onclick="deleteSliderImage('+data.id+')"><i class="fa fa-times"></i></a></div></li>';
					});

					$('div.slider-images-wrap ol li.empty').remove();

					$('div.slider-images-wrap ol').append(str);
				},
				error : function(){

				}
			});
		});

		function deleteSliderImage(id){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this image",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "<?= BASE_URL.'admin/media/delete'; ?>",
						method : 'post',
						data : { id : id },
						complete : function(data){
							var obj = jQuery.parseJSON(data.responseText);
							//console.log(obj);
							if(obj.status == "SUCCESS"){
								$('div.slider-images-wrap ol li[data-id="'+id+'"]').remove();
								var list = $('div.slider-images-wrap ol li');
								if(list.length == 0){
									$('div.slider-images-wrap ol').html('<li class="empty">No images in slider</li>');
								}
							}
						},
						error : function(){

						}
					});
				} else {
				}
			});
		}
	<?php  } ?>

	<?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'branch') { ?>
		$('.select2').select2()
		$(function () {
			inquery.dataTableInit();
		});
		$('#price').keypress(function(e) {
			var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
			if (verified) {e.preventDefault();}
		});
		var urls = "<?php echo BASE_URL;?>/admin/branch/get_branch_list";
		var inquery = {
			dataTableInit : function(){
				var sort_idx = 0;
				var display_length = 10;
				campaign_table = $('#menu_table').DataTable({
					//"aaSorting": [[sort_idx, "asc"]],
					"iDisplayLength": display_length,
					"columnDefs": [{
						"targets": sort_idx-1,
						"orderable": false
					}],

					"autoWidth": false,
					"destroy" : true,
					"processing": true,
					//"serverSide": true,
					// "stateSave" : true,
					"ajax": {
						"url": "<?php echo BASE_URL;?>/admin/branch/get_branch_list",
						"type": "POST",
					},
					"fnInitComplete": function (oSettings, json) {
						$('.sr-loader').hide();
						$('.sr-content').show();
					}
				});
			}
		}

		$('#modal-edit').on('show.bs.modal', function (event) {
			var val = $(event.relatedTarget).data('stuff');
			$.ajax({
				url : "<?= site_url('admin/menus/get_menu_by_id/'); ?>"+val,
				method : 'POST',
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					$('#title').text("EDIT "+obj.name+" MENU");
					$('#edit_id').val(obj.id);
					$('#edit_name').val(obj.name);
					$('#edit_taiwan_name').val(obj.name_taiwan);
					$('#edit_description').val(obj.description);
					$('#edit_category').val(obj.category).change();
					if(obj.active == 1){
						$('#active').prop('checked', true);
					}
					var image_container = $('input[name="product_image"] + div');
					var width = image_container.width();
					var height = image_container.height();
					image_container.css({"background" : "url(<?= site_url('admin/media/view_image_gallery'); ?>/" + obj.id +") no-repeat", "background-size" : width+"px " + height+"px"});
				},
				error : function(){

				}
			});
		});
		var menu_entry = undefined;
		$('#modal-varation').on('show.bs.modal', function (event) {
			var val = $(event.relatedTarget).data('stuff');
			menu_entry = $(event.relatedTarget).data('stuff');
			var name = $(event.relatedTarget).data('name');
			$('#title_var').text(name+" MENU ENTRY VARATION");
			var varation = {
				dataTableInit : function(){
					var sort_idx = 0;
					var display_length = 10;
					campaign_table = $('#menu_varation_table').DataTable({
						//"aaSorting": [[sort_idx, "asc"]],
						"iDisplayLength": display_length,
						"columnDefs": [{
							"targets": sort_idx-1,
							"orderable": false
						}],

						"autoWidth": false,
						"destroy" : true,
						"processing": true,
						//"serverSide": true,
						// "stateSave" : true,
						"ajax": {
							"url": "<?php echo BASE_URL;?>/admin/menus/get_menu_varation_list/"+val,
							"type": "POST",
						},
						"fnInitComplete": function (oSettings, json) {
							$('.sr-loader').hide();
							$('.sr-content').show();
						}
					});
				}
			}
			varation.dataTableInit();
		});

		$('#modal-edit').on('hidden.bs.modal', function (e) {
			$('#edit_name').val('');
			$('#edit_taiwan_name').val('');
			$('#edit_description').val('');
			$('#active').prop("checked", "").end();
			$("#UploadSingleMsg").html('').removeClass();
		})
		$('#modal-add').on('hidden.bs.modal', function (e) {
			$('#add_name').val('');
			$('#add_taiwan_name').val('');
			$('#add_description').val('');
			resetFormElement($('#ProductImage'));
			$('#add_active').prop("checked", "").end();
			$("#AddMenuMsg").html('').removeClass();
		})

		$("#AddVaration").click(function(){
			var type = $('#type').val();
			var price = $('#price').val();
			var size = $('#size').val();
			var menu_entry_id = menu_entry;
			$.ajax({
				url : "<?= BASE_URL.'admin/menus/add_varation'; ?>",
				method : 'post',
				data : { type : type, price : price, size : size, menu_entry : menu_entry_id },
				complete : function(data){
					var obj = jQuery.parseJSON(data.responseText);
					//console.log(obj);
					if(obj.status == "SUCCESS"){
						$('#type').val('');
						$('#price').val('');
						$('#size').val('');

						var ref = $('#menu_varation_table').DataTable();
						ref.ajax.reload();
						swal("Success", "Menu entry varation has been added.", "success");
					}
					else{
						swal("Oops", obj.msg, "error");
					}
				},
				error : function(){

				}
			});
		});

		function delete_varation(id_entry){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this menu entry varation!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "<?= BASE_URL.'admin/menus/delete_menu_varation/'; ?>",
						method : 'post',
						data : { id : id_entry },
						complete : function(data){
							var obj = jQuery.parseJSON(data.responseText);
							//console.log(obj);
							if(obj.status == "SUCCESS"){
								$('#type').val('');
								$('#price').val('');
								$('#size').val('');

								var ref = $('#menu_varation_table').DataTable();
								ref.ajax.reload();

								swal("Success", obj.msg, "success");

							}
							else{
								swal("Oops", obj.msg, "error");
							}
						},
						error : function(){

						}
					});
				} else {
				}
			});
		}

		function delete_menu(id_entry){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this menu entry",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "<?= BASE_URL.'admin/menus/delete_menu/'; ?>",
						method : 'post',
						data : { id : id_entry },
						complete : function(data){
							var obj = jQuery.parseJSON(data.responseText);
							//console.log(obj);
							if(obj.status == "SUCCESS"){
								var ref = $('#menu_table').DataTable();
								ref.ajax.reload();
								swal("Success", obj.msg, "success");
							}
							else{
								swal("Oops", obj.msg, "error");
							}
						},
						error : function(){

						}
					});
				} else {
				}
			});
		}
	<?php  } ?>

	</script>
</body>
</html>
