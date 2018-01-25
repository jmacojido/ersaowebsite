<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Menu Items
			<small>Control Management System</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Menu Entry List</h3><div class="pull-right"><button type="button" class="btn btn-primary btn-flat btn-sm" id="addMenu" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> ADD MENU ENTRY</button></div>
					</div>
					<div class="box-body">
						<table id="menu_table" class="table table-responsive table-striped table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>Area</th>
									<th>latitude</th>
									<th>Longitude</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
						<!-- /.box-body -->
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-edit">
			<div class="modal-dialog" style="width:700px; height: 350px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 id="title" class="modal-title">Default Modal</h4>
					</div>
					<div class="modal-body">
						<section class="content">
							<div class="row">
								<div class="col-md-6">
									<div class="media-container" style="height:300px !important;">
										<section style="margin:-60px !important;"></section>
										<section></section>
										<section>
											<form id="ProductEdit" action="" method="POST" enctype="multipart/form-data" role="form">
											<div>
												<input type="file" name="product_image" id="ProductImage">
												<div>
													<label for="ProductImage"><span>PRODUCT IMAGE <small>300px by 300px)</small></span><span></span></label>
												</div>
											</div>

										</section>
									</div>
								</div>
								<div class="col-md-6">
										<input id="edit_id" type="hidden">
										<div class="input-group">
											<span class="input-group-addon">Name</span>
											<input id="edit_name" type="text" class="form-control input-sm" placeholder="Username">
										</div><br>
										<div class="input-group">
											<span class="input-group-addon">Taiwan Name</span>
											<input id="edit_taiwan_name" type="text" class="form-control input-sm" placeholder="Username">
										</div><br>
										<div class="form-group">
											<label>Category</label>
											<select id="edit_category" class="form-control select2" style="width: 100%;">
												<?php foreach ($category as $key => $value) {?>
													<option value="<?=$key;?>" selected="selected"><?=$value?></option>
												<?php }?>
											</select>
										</div>
										<div class="input-group">
											<label>Is Active?</label>
											<div class="toggleWrapper">
												<input type="checkbox" id="active" class="dn">
												<label for="active" class="toggle"><span class="toggle__handler"></span></label>
											</div>
										</div><br>
								</div>
							</div>
							<div class="row" style="margin-top:20px;">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
										<textarea id="edit_description" class="form-control" rows="3" placeholder="Enter Description...."></textarea>
									</div>
								</div>
								</form>
							</div>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="SaveChanges">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-add">
			<div class="modal-dialog" style="width:700px; height: 350px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">NEW MENU ENTRY</h4>
					</div>
					<div class="modal-body">
						<section class="content">
							<div class="row">
								<div class="col-md-6">
									<div class="media-container" style="height:300px !important;">
										<section style="margin:-60px !important;"></section>
										<section></section>
										<section>
											<form id="ProductAdd" action="" method="POST" enctype="multipart/form-data" role="form">
											<div>
												<input type="file" name="product_image" id="ProductImage">
												<div>
													<label for="ProductImage"><span>PRODUCT IMAGE <small>300px by 300px)</small></span><span></span></label>
												</div>
											</div>

										</section>
									</div>
								</div>
								<div class="col-md-6">
										<input id="edit_id" type="hidden">
										<div class="input-group">
											<span class="input-group-addon">Name</span>
											<input id="add_name" type="text" class="form-control input-sm" placeholder="Username">
										</div><br>
										<div class="input-group">
											<span class="input-group-addon">Taiwan Name</span>
											<input id="add_taiwan_name" type="text" class="form-control input-sm" placeholder="Username">
										</div><br>
										<div class="form-group">
											<label>Category</label>
											<select id="add_category" class="form-control select2" style="width: 100%;">
												<?php foreach ($category as $key => $value) {?>
													<option value="<?=$key;?>" selected="selected"><?=$value?></option>
												<?php }?>
											</select>
										</div>
										<div class="input-group">
											<label>Is Active?</label>
											<div class="toggleWrapper">
												<input type="checkbox" id="add_active" class="dn">
												<label for="add_active" class="toggle"><span class="toggle__handler"></span></label>
											</div>
										</div><br>
										<div id="AddMenuMsg"></div>
								</div>
							</div>
							<div class="row" style="margin-top:20px;">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
										<textarea id="add_description" class="form-control" rows="3" placeholder="Enter Description...."></textarea>
									</div>
								</div>
								</form>
							</div>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="AddMenu">ADD MENU ENTRY</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-varation">
			<div class="modal-dialog" style="width:700px; height: 350px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 id="title_var" class="modal-title">MENU ENTRY VARATION</h4>
					</div>
					<div class="modal-body">
						<section class="content">
							<div class="row bg-blue" style="margin-top:-20px; margin-bottom:10px; padding-top:10px; padding-bottom:10px;">
								<form>
									<div class="col-md-3">
										<div class="input-group" style="padding:0px;">
											<span class="input-group-addon">Type</span>
											<input id="type" type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="col-md-3">
										<div class="input-group">
											<span class="input-group-addon">Size</span>
											<input id="size" type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="col-md-3">
										<div class="input-group">
											<span class="input-group-addon">Price</span>
											<input id="price" type="text" class="form-control input-sm">
										</div>
									</div>
									</form>
									<div class="col-md-3">
										<button type="button" class="btn btn-primary btn-sm" id="AddVaration">ADD MENU ENTRY</button>
									</div>

							</div>
							<div class="row">
								<div class="col-md-12">
									<table id="menu_varation_table" class="table table-responsive table-striped table-hover">
										<thead>
											<tr>
												<th>Type</th>
												<th>Size</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<div class="form-group">
									</div>
								</div>
								</form>
							</div>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
