<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ReservationModel');
		$this->load->model('MediaModel');
	}

	function index(){
		$data['status'] = array('pending' => 'Pending','confirmed' => 'Confirmed', 'rejected' => 'Rejected', 'cancelled' => 'Cancelled');
		$this->load->view('admin/header.php');
		$this->load->view('admin/events/index.php',$data);
		$this->load->view('admin/footer.php');
	}

	public function get_reservation_list(){
		$post = $this->input->post();
		$columns = array(
			array(  'db' => 'code',
					'dt' => 0,
			),
			array(  'db' => 'name',
				'dt' => 1
			),
			array( 'db' => 'email',
				'dt' => 2
			),
			array( 'db' => 'contact',
				'dt' => 3,
			),
			array( 'db' => 'date_reserve',
				'dt' => 4,
			),
			array( 'db' => 'time_start',
				'dt' => 5,
			),
			array( 'db' => 'time_end',
				'dt' => 6,
			),
			array( 'db' => 'status',
				'dt' => 7,
				'formatter' => function( $d, $row ) {
					switch ($row['status']) {
						case 'pending':
							return  '<span class="label label-primary">Pending</span>';
						break;
						case 'confirmed':
							return  '<span class="label label-success">Confirmed</span>';
						break;
						case 'rejected':
							return  '<span class="label label-warning">Rejected</span>';
						break;
						case 'cancelled':
							return  '<span class="label label-danger">Cancelled</span>';
							break;
						default:
							# code...
							break;
					}

				}
			),
			array( 'db' => 'id',
				'dt' => 8,
				'formatter' => function( $d, $row ) {
					return  '
					<a href="#" id="editMenu" data-toggle="modal" data-stuff="'.$d.'" data-target="#modal-event"><span class="label label-primary"><i class="fa fa-pencil"></i></span></a>
					<a><span class="label label-danger"><i class="fa fa-trash"></i></span></a>';
				}
			)
		);

		$post['order'] = $this->common->ssp_order($post,$columns);
		$post['filter'] = $this->common->ssp_filter($post,$columns);
		$data = $this->ReservationModel->get_array($post);
		$recordsTotal = count($data);
		$recordsFiltered = count($this->ReservationModel->get_array($post,true));

		$draw = isset ( $post['draw'] ) ? intval( $post['draw'] ) : 0;

		echo json_encode($this->common->ssp_data_format($draw,$recordsTotal,$recordsFiltered,$data,$columns));
	}

	function get_event_by_id($id){
		$data = $this->ReservationModel->get_by(array('id' => $id), true);
		$media_ids = $this->MediaModel->get_image_in_order(array('type' => 'image_slider_event', 'source_id' => $id),'order_no');
		$result = array('data' => $data, 'media_ids' => $media_ids);
		echo json_encode($result);
	}


	function set_event(){
		$ids = array();
		$title = $this->input->post('title');
		$media_id_name= $this->input->post('media_id');
		$description = $this->input->post('description');
		$status = $this->input->post('status');
		if(isset($_FILES['files'])){
			$dimension_error_msg = 'Error: ';
			$now = time();
			// check if every image meet the required image dimension
			$error_dimension = false;
			foreach ($_FILES["files"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$fileName = $_FILES['files']["name"][$key];
					$fileTmpLoc = $_FILES['files']["tmp_name"][$key];
					$allowed_width = 300;
					$allowed_height = 300;
					// check image size
					list($width, $height) = getimagesize($fileTmpLoc);
					if($width < $allowed_width || $height < $allowed_height){
						$dimension_error_msg .= $fileName . ' image required dimension not meet! 300x300 is required.</p>';
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

						$fileName = $media_id_name.'-'.hash('sha1', mt_rand()).''.$ext;
						$fileTmpLoc = $_FILES['files']["tmp_name"][$key];
						$pathAndName = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/events/".$fileName;
						if(move_uploaded_file($fileTmpLoc , $pathAndName)){
							$mime = mime_content_type($pathAndName);
							$data = array(
								'source_id' => $media_id_name,
								'file_name' => $fileName,
								'mime' => $mime,
								'type' => "image_slider_event",
								'location' => $_SERVER['DOCUMENT_ROOT'] . '/assets/img/events/'
							);
							$media_id = $this->MediaModel->save($data);
							$ids[] = $media_id;

							$data = array(
								'title' => $title,
								'description' => $description,
								'status' => $status,
							);
							$media_id = $this->ReservationModel->save($data,$media_id_name);
						}
					}
					else{$err = true;}
				}
				if($err){
					$msg ='Please check the file names of your images it should be letters and numbers only';
					$status = 'ERROR';
				}
				else{
					$msg = 'Event save changes successfully!';
					$status = 'SUCCESS';

				}
			}else{
				$msg = $dimension_error_msg;
				$status = 'ERROR';
			}
		}
		else{
			$data = array(
				'title' => $title,
				'description' => $description,
				'status' => $status,
			);
			$media_id = $this->ReservationModel->save($data,$media_id_name);
			$msg = 'Event save changes successfully!';
			$status = 'SUCCESS';

		}
		$json = array(
			'msg' => $msg,
			'status' => $status,
			'ids' => $ids
		);

		echo json_encode($json);
	}
}
