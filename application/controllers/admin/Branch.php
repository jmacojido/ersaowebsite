<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('BranchModel');
		$this->load->model('MenuModel');
		$this->load->model('MenuVarationModel');
	}

	function index(){
		$data['menu_items'] = $this->MenuModel->get();
		$data['category'] = $this->MenuModel->GetCategories();
		//print_r($data['category']['taiwan_snack']);
		$data['taiwan_category'] = $this->MenuModel->GetCategoriesTaiwan();
		//$data['menu_json'] = json_encode($data['menu_items'],true);
		//print_r($data['menu_json']);
		//print_r($data);
		$this->load->view('admin/header.php');
		$this->load->view('admin/branch/index.php', $data);
		$this->load->view('admin/footer.php');
	}
	function get_branch_by_id($id){
		$menu_item = $this->BranchModel->get_by(array('id' => $id), true);
		echo json_encode($menu_item);
	}
	function edit($id){
		if(isset($_FILES['image'])){
			$name = $_POST['name'];
			$name_taiwan = $_POST['taiwan_name'];
			$active = $_POST['active'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$category_taiwan = "";
			$allowed_width = 300;
			$allowed_height = 300;
			$msg = '';
			$status = '';
			$file_name = $id;
			$ext = '';
			$category_taiwan = $this->MenuModel->GetCategoriesTaiwan();
			$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/products/";
			foreach ($_FILES as $key => $value) {
				if($_FILES[$key]['type'] = 'image/jpeg' || $_FILES[$key]['type'] = 'image/jpeg'){
					$ext = 'jpg';
				}
				else if($_FILES[$key]['type'] = 'image/png'){
					$ext = 'png';
				}
			}
			$fileName = $file_name.".".$ext;
			$fileTmpLoc = $_FILES['image']["tmp_name"];
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
					$data = array(
						'name' => $name,
						'name_taiwan' => $name_taiwan,
						'category' => $category,
						'category_taiwan' => $category_taiwan[$category],
						'active' => $active,
						'file_name' => $fileName,
						'description' => $description,
						'location' => $location
					);
					$this->MenuModel->save($data, $id);
					$msg = 'Menu Item Updated Successfully!';
					$status = 'SUCCESS';

				} else {
					$msg = 'There is problem can\'t upload the file';
					$status = 'ERROR';
				}

			}
		}else{
			$name = $_POST['name'];
			$name_taiwan = $_POST['taiwan_name'];
			$active = $_POST['active'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$category_taiwan = $this->MenuModel->GetCategoriesTaiwan();

			$data = array(
				'name' => $name,
				'name_taiwan' => $name_taiwan,
				'category' => $category,
				'category_taiwan' => $category_taiwan[$category],
				'active' => $active,
				'description' => $description
			);
			$this->MenuModel->save($data, $id);
			$msg = 'Menu Item Updated Successfully!';
			$status = 'SUCCESS';
		}
		$json = array(
			'msg' => $msg,
			'status' => $status
		);
		echo json_encode($json);
	}

	function add(){
		if(isset($_FILES['image']) && !empty($_POST['name']) && !empty($_POST['taiwan_name']) && trim($_POST['name']) != "" && trim($_POST['taiwan_name']) != ""){
			$name = $_POST['name'];
			$name_taiwan = $_POST['taiwan_name'];
			$active = $_POST['active'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$category_taiwan = "";
			$allowed_width = 300;
			$allowed_height = 300;
			$msg = '';
			$status = '';
			$ext = '';
			$id = '';
			$category_taiwan = $this->MenuModel->GetCategoriesTaiwan();
			$data = array(
				'name' => $name,
				'name_taiwan' => $name_taiwan,
				'category' => $category,
				'category_taiwan' => $category_taiwan[$category],
				'active' => $active,
				'description' => $description,
			);
			$this->MenuModel->save($data);
			$last = $this->MenuModel->get_last_record();
			$file_name = $last->id;
			$location = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/products/";

			foreach ($_FILES as $key => $value) {
				if($_FILES[$key]['type'] = 'image/jpeg' || $_FILES[$key]['type'] = 'image/jpeg'){
					$ext = 'jpg';
				}
				else if($_FILES[$key]['type'] = 'image/png'){
					$ext = 'png';
				}
			}
			$fileName = $file_name.".".$ext;
			$fileTmpLoc = $_FILES['image']["tmp_name"];
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
					$data = array(
						'file_name' => $fileName,
						'location' => $location
					);
					$id = $this->MenuModel->save($data,$id);
					$msg = 'Menu Item Added Successfully!';
					$status = 'SUCCESS';

				} else {
					$msg = 'There is problem can\'t upload the file';
					$status = 'ERROR';
				}

			}
		}else{
			$msg = 'Please fill all required field';
			$status = 'ERROR';
		}
		$json = array(
			'msg' => $msg,
			'status' => $status
		);
		echo json_encode($json);
	}

	public function get_branch_list(){
		$post = $this->input->post();
		$columns = array(
			array(  'db' => 'name',
					'dt' => 0,
			),
			array(  'db' => 'address',
				'dt' => 1
			),
			array( 'db' => 'area',
				'dt' => 2,
				'formatter' => function( $d, $row ) {
					$areas = $this->BranchModel->GetAreas();
					foreach ($areas as $key) {
						if($d == $key['code']){
							return  $key['name'];
						}
					}
				}
			),
			array( 'db' => 'latitude',
				'dt' => 3,
			),
			array( 'db' => 'longitude',
				'dt' => 4,
			),
			array( 'db' => 'id',
				'dt' => 5,
				'formatter' => function( $d, $row ) {
					return  '<a href="#" id="editMenuVaration" data-toggle="modal" data-stuff="'.$d.'" data-name="'.$row['name'].'" data-target="#modal-varation"><span class="label label-primary"><i class="fa fa-database"></i></span></a>
					<a href="#" id="editMenu" data-toggle="modal" data-stuff="'.$d.'" data-target="#modal-edit"><span class="label label-primary"><i class="fa fa-pencil"></i></span></a>
					<a href="javascript:void(0)" onclick="return delete_menu('.$d.');return false;"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>';
				}
			)
		);

		$post['order'] = $this->common->ssp_order($post,$columns);
		$post['filter'] = $this->common->ssp_filter($post,$columns);
		$data = $this->BranchModel->get_array($post);
		$recordsTotal = count($data);
		$recordsFiltered = count($this->BranchModel->get_array($post,true));

		$draw = isset ( $post['draw'] ) ? intval( $post['draw'] ) : 0;

		echo json_encode($this->common->ssp_data_format($draw,$recordsTotal,$recordsFiltered,$data,$columns));
	}
	public function get_menu_varation_list($id){
		$post = $this->input->post();
		$columns = array(
			array(  'db' => 'type',
					'dt' => 0,
			),
			array(  'db' => 'size',
				'dt' => 1
			),
			array( 'db' => 'price',
				'dt' => 2
			),
			array( 'db' => 'id',
				'dt' => 3,
				'formatter' => function( $d, $row ) {
					return  '<a href="javascript:void(0)" onclick="return delete_varation('.$d.');return false;"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>';
				}
			)
		);
		$post['order'] = $this->common->ssp_order($post,$columns);
		$post['filter'] = $this->common->ssp_filter($post,$columns);
		$data = $this->MenuModel->get_menu_varation($id);
		//print_r($data);
		$recordsTotal = count($data);
		$recordsFiltered = count($this->MenuModel->get_menu_varation($id));

		$draw = isset ( $post['draw'] ) ? intval( $post['draw'] ) : 0;

		echo json_encode($this->common->ssp_data_format($draw,$recordsTotal,$recordsFiltered,$data,$columns));
	}
	function delete_menu_varation(){
		if($_POST){
			$msg = 'Please fill all required field';
			$status = 'ERROR';
            $id = $this->input->post('id');
            $delete = $this->MenuVarationModel->delete($id);
            if($delete){
				$msg = 'Menu Entry Varation has been deleted';
				$status = 'SUCCESS';
            }else{
				$msg = 'Please try again later!';
				$status = 'ERROR';
			}
        }else{
			$msg = 'Please try again later!';
			$status = 'ERROR';
		}
		$json = array(
			'msg' => $msg,
			'status' => $status
		);
		echo json_encode($json);
	}
	function delete_menu(){
		if($_POST){
			$msg = 'Please fill all required field';
			$status = 'ERROR';
            $id = $this->input->post('id');
            $delete = $this->MenuVarationModel->delete($id);
			$delete = $this->MenuModel->delete($id);
            if($delete){
				$msg = 'Menu Entry has been deleted';
				$status = 'SUCCESS';
            }else{
				$msg = 'Please try again later!';
				$status = 'ERROR';
			}
        }else{
			$msg = 'Please try again later!';
			$status = 'ERROR';
		}
		$json = array(
			'msg' => $msg,
			'status' => $status
		);
		echo json_encode($json);
	}
}
