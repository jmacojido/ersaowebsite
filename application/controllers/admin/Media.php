<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MediaModel');
		$this->load->library('form_validation');
	}

	function index(){
		$data['slider_images'] = $this->MediaModel->get_by(array('type' => "image_slider"));
		$media_list = $this->MediaModel->get_by(array('type' => "image_fixed"));
        $data['media_single'] = json_encode($media_list);

		$this->load->view('admin/header.php');
		$this->load->view('admin/media/index.php', $data);
		$this->load->view('admin/footer.php');
	}
	function uploads_image_slider(){
		$ids = array();
		if(isset($_FILES["files"])){
			$dimension_error_msg = '<p class="error">Error:</p>';
			$now = time();
			// check if every image meet the required image dimension
			$error_dimension = false;
			foreach ($_FILES["files"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$fileName = $_FILES['files']["name"][$key];
					$fileTmpLoc = $_FILES['files']["tmp_name"][$key];
					$allowed_width = 1500;
					$allowed_height = 600;
					// check image size
					list($width, $height) = getimagesize($fileTmpLoc);
					if($width > $allowed_width || $height > $allowed_height){
						$dimension_error_msg .= '<p class="error">' . $fileName . ' image required dimension not meet! 600x420 is required.</p>';
						$error_dimension = true;
					}
				}
			}

			if($error_dimension == false){
				$err = false;
				foreach ($_FILES["files"]["error"] as $key => $error) {
					if ($error == UPLOAD_ERR_OK) {
						$ext = "";
						if($_FILES['files']["type"][$key] == 'image/png'){
							$ext = ".png";
						}
						else if($_FILES['files']["type"][$key] == 'image/jpeg' || $_FILES['files']["type"][$key] == 'image/jpg'){
							$ext = ".jpg";
						}

						$fileName = 'img_slider_'.hash('sha1', mt_rand()).''.$ext;
						$fileTmpLoc = $_FILES['files']["tmp_name"][$key];
						$pathAndName = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/".$fileName;
						if(move_uploaded_file($fileTmpLoc , $pathAndName)){
							$mime = mime_content_type($pathAndName);
							$data = array(
								'file_name' => $fileName,
								'mime' => $mime,
								'type' => "image_slider",
								'location' => $_SERVER['DOCUMENT_ROOT'] . '/assets/img/gallery/'
							);
							$media_id = $this->MediaModel->save($data);
							$ids[] = $media_id;
						}
					}
					else{$err = true;}
				}
				if($err){
					$msg = '<p class="error" >Please check the file names of your images it should be letters and numbers only</p>';
					$status = 'ERROR';
				}
				else{
					$msg = '<p class="success" >Uploaded Successfully!</p>';
					$status = 'SUCCESS';

				}
			}else{
				$msg = $dimension_error_msg;
				$status = 'ERROR';
			}
		}else{
			$msg = "No Files Selected!";
			$status = 'ERROR';
		}

		$json = array(
			'msg' => $msg,
			'status' => $status,
			'ids' => $ids
		);

		echo json_encode($json);
	}


	function upload(){

		// only single upload
		if($_FILES){
			$name = "";
			$allowed_width = null;
			$allowed_height = null;
			$msg = '';
			$status = '';
			$file_name = '';
			$ext = '';
			$location = '';
			foreach ($_FILES as $key => $value) {
				if($_FILES[$key]['type'] = 'image/jpeg' || $_FILES[$key]['type'] = 'image/jpeg'){
					$ext = 'jpg';
				}
				else if($_FILES[$key]['type'] = 'image/png'){
					$ext = 'png';
				}

				switch ($key) {
					case 'history':
					$name = $key;
					$allowed_width = 600;
					$allowed_height = 300;
					$file_name = 'home_history';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/";
					break;
					case 'mission_vision':
					$name = $key;
					$allowed_width = 600;
					$allowed_height = 300;
					$file_name = 'home_mission_vision';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/";
					break;
					case 'best_sellers':
					$name = $key;
					$allowed_width = 600;
					$allowed_height = 300;
					$file_name = 'home_best_sellers';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/";
					break;
					case 'branch_center':
					$name = $key;
					$allowed_width = 600;
					$allowed_height = 300;
					$file_name = 'home_branch_center';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/";
					break;
					case 'contact_us':
					$name = $key;
					$allowed_width = 600;
					$allowed_height = 300;
					$file_name = 'home_contact_us';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/gallery/";
					break;
					case 'right_bg':
					$name = $key;
					$allowed_width = 500;
					$allowed_height = 525;
					$file_name = 'right_bg';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/";
					break;
					case 'left_bg':
					$name = $key;
					$allowed_width = 500;
					$allowed_height = 525;
					$file_name = 'left_bg';
					$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/";
					break;
					default:

					break;
				}
			}
			$fileName = $file_name.".".$ext;
			$fileTmpLoc = $_FILES[$name]["tmp_name"];

			$pathAndName = $location."".$fileName;

			list($width, $height) = getimagesize($fileTmpLoc);

			if($allowed_width > $width || $allowed_height > $height){
				$msg = 'Incorrect image size, must be ' . $allowed_width . 'px by ' . $allowed_height . 'px';
				$status = 'ERROR';
			}else{
				if(file_exists($pathAndName)){
					unlink($pathAndName);
				}

				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				if ($moveResult == true) {

					$mime = mime_content_type($pathAndName);

					// since it is single file for single media check if media id exist if yes update else insert
					$media_file = $this->MediaModel->get_by(array('file_name' => $fileName), true);

					$data = array(
						'file_name' => $fileName,
						'mime' => $mime,
						'type' => "image_fixed",
						'location' => $location
					);

					if(count($media_file)){
						// update
						$this->MediaModel->save($data, $media_file->id);
					}else{
						// insert
						$this->MediaModel->save($data);
					}
					$msg = 'Upload Successfully!';
					$status = 'SUCCESS';

				} else {
					$msg = 'There is problem can\'t upload the file';
					$status = 'ERROR';
				}

				$msg = 'Uploaded Successfully!';
				$status = 'SUCCESS';

			}

			$json = array(
				'msg' => $msg,
				'status' => $status
			);

		}


		echo json_encode($json);
	}

	function delete(){
		if($_POST){
			$id = intval($this->input->post('id'));
			$media_file = $this->MediaModel->get($id, true);
			$delete = $this->MediaModel->delete($id);
			if($delete){
				// delete files
				unlink($media_file->location."".$media_file->file_name);
				echo json_encode(array('status'=> 'SUCCESS'));
			}
		}
	}

	function save_image_order(){
		if($_POST){
			foreach ($_POST['images'] as $key => $value) {
				$data = array(
					'order_no' => ((int)$key+1)
				);
				$this->MediaModel->save($data, (int)$value["id"]);
			}
		}
	}

	function view_image_gallery($id=null){

		$id = intval($id);
		$media = $this->MediaModel->get($id, true);
		if(count($media)){
			header('Content-type: ' . $media->mime);
			readfile($media->location."".$media->file_name);
		}else{
			'No Media Available!';
		}
	}
}
