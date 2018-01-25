<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Media Gallery
			<small>Control Management System</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<section class="col-lg-12 connectedSortable">
				<div class="box box-success">
					<div class="box-header">
						<i class="fa fa-image"></i>
						<h3 class="box-title">Image Slider</h3>
					</div>
					<div class="box box-solid bg-green-gradient" style="width: 90%; margin-left: 5%;">
						<div class="box-header">
							<i class="fa fa-cloud-upload"></i>
							<h3 class="box-title">Upload Files</h3>
							<div class="pull-right box-tools">
								<button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body no-padding">

						</div>
						<div class="box-footer text-black">
							<div class="row">
								<div class="media-container">
									<section class="gallery-container">
										<form id="FileUpload" action="" method="POST" enctype="multipart/form-data" >
											<input type="file" id="ImageSlider" name="files[]" multiple>
											<label for="ImageSlider" type="button" class="btn bg-olive btn-flat">Add files</label>
											<button type="button" class="btn bg-olive btn-flat" id="ClearSelectedFilesBtn">Clear</button>
											<button type="button" id="Uploadfile" class="btn bg-olive btn-flat">Upload</button>
											<progress max="100" value="0" id="SliderProgressBar"></progress><div id="UploadStatus"></div>
										</form>
										<div class="presentation">
											<div id="UploadListingMsg">

											</div>
											<ul id="UploadListing">
												<span>File uploads here! image dimension required: 1500 X 600</span>
											</ul>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					<div class="box box-solid" style="width: 90%; margin-left: 5%;">
						<div class="media-container">
							<section class="gallery-container">
								<div class="slider-images-wrap">
									<ol class="sortable">
										<?php if(count($slider_images)) : foreach($slider_images as $img) : ?>
										<li data-id="<?= $img->id; ?>" id="list_<?= $img->id; ?>"><div><img src="<?= BASE_URL."assets/img/gallery/".$img->file_name; ?>" width="250" height="100"><a href="javascript:void(0)" onclick="deleteSliderImage(<?= $img->id; ?>)"><i class="fa fa-times"></i></a></div></li>
										<?php endforeach; ?>
										<?php else: ?>
										<div class="empty">No images in slider</div>
										<?php endif; ?>
									</ol>
									<button class="btn lg bg-olive btn-flat" id="SaveOrderImageBtn">Save Order</button> <span id="SaveImgMsg"></span>
								</div>
							</section>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="row">
			<section class="col-lg-12 connectedSortable">
				<div class="box box-success">
					<div class="box-header">
						<i class="fa fa-image"></i>
						<h3 class="box-title">Home</h3>
					</div>
					<div class="box-footer text-black" >
						<h4>Home Banners</h4>
						<div class="media-container">
							<section style="margin:0px !important;"></section>
							<section>
								<div id="UploadSingleMsg"></div>
								<form id="ImageUpload" action="" method="POST" enctype="multipart/form-data" role="form">
									<div>
										<input type="file" name="history" id="History">
										<div>
											<label for="History"><span>HISTORY <small>(600px by 300px)</small></span><span></span></label>
										</div>
										<input type="file" name="mission_vision" id="MissionVision">
										<div>
											<label for="MissionVision"><span>MISSION AND VISION <small>(600px by 300px)</small></span><span></span></label>
										</div>
										<input type="file" name="best_sellers" id="BestSellers">
										<div>
											<label for="BestSellers"><span>BEST SELLERS <small>(600px by 300px)</small></span><span></span></label>
										</div>
										<input type="file" name="branch_center" id="BranchCenter">
										<div>
											<label for="BranchCenter"><span>BRANCH CENTER <small>(600px by 300px)</small></span><span></span></label>
										</div>
										<input type="file" name="contact_us" id="ContactUs">
										<div>
											<label for="ContactUs"><span>CONTACT US <small>(600px by 300px)</small></span><span></span></label>
										</div>
									</div>

									<div>
										<h4>Home Background</h4>
										<input type="file" name="right_bg" id="RightBG">
										<div>
											<label for="RightBG"><span>LEFT BACKGROUND <small>(500px by 525px)</small></span><span></span></label>
										</div>
										<input type="file" name="left_bg" id="LeftBG">
										<div>
											<label for="LeftBG"><span>RIGHT BACKGROUND <small>(500px by 525px)</small></span><span></span></label>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
</div>
