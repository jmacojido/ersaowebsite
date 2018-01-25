<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Events
			<small>Control Management System</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Menu Entry List</h3>
					</div>
					<div class="box-body">
						<table id="reservation_table" class="table table-responsive table-striped table-hover">
							<thead>
								<tr>
									<th>Code</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Date Reserve</th>
									<th>Time Start</th>
									<th>Time End</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-event">
			<div class="modal-dialog" style="width:620px; height: 350px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 id="title" class="modal-title">Event</h4>
					</div>
					<div class="modal-body">
						<section class="content">
							<div class="row" style="margin-top:20px;">
								<div class="col-md-12">
									<input id="event_media_id" type="hidden">
									<div class="input-group" style="margin-top:-40px !important; padding:0px !important;">
										<span class="input-group-addon" style="margin:0px !important;">Event Title</span>
										<input id="event_title" type="text" class="form-control input-sm" style="margin:0px !important;">
									</div><br>
									<div class="media-container" style="margin-top:-30px !important;">
										<section class="gallery-container-evt">
											<form id="FileUpload" action="" method="POST" enctype="multipart/form-data" >
												<input type="file" id="ImageSliderEvt" name="files[]" multiple>
												<label for="ImageSliderEvt" type="button" class="btn bg-olive btn-flat btn-sm">Add files</label>
												<button type="button" class="btn bg-olive btn-flat btn-sm" id="ClearSelectedFilesBtnEvt">Clear</button>
												<progress max="100" value="0" id="SliderProgressBar"></progress><div id="UploadStatusEvt"></div>
											</form>
											<div class="presentation">
												<span>File uploads here! image dimension required: 300 X 300</span>
												<ul id="UploadListingEvt">

												</ul>
											</div>
										</section>
									</div>
									<div class="media-container" style="margin-top:-30px !important; margin-bottom: 10px !important;">
										<section class="gallery-container-evt">
											<div class="slider-images-wrap" style="margin-bottom:-30px !important;">
												<ol class="sortable-evt">
												</ol>
											</div>
											<button class="btn bg-olive btn-flat btn-sm" id="SaveOrderImageEventBtn">Save Order</button> <span id="SaveImgMsg"></span>
										</section>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select id="event_status" class="form-control select2" style="width: 100%;">
											<?php foreach ($status as $key => $value) {?>
												<option value="<?=$key;?>" selected="selected"><?=$value?></option>
											<?php }?>
										</select>
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea id="event_description" class="form-control" rows="3" placeholder="Enter Description...."></textarea>
									</div>
								</div>
								</form>
							</div>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="SaveEvent">Save Event</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
