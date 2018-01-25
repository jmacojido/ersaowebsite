<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MenuModel');
		$this->load->model('MediaModel');
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
		$this->load->view('admin/menus/index.php', $data);
		$this->load->view('admin/footer.php');
	}
	function get_menu_by_id($id){
		$menu_item = $this->MenuModel->get_by(array('id' => $id), true);
		$media_ids = $this->MediaModel->get_by(array('type' => 'image_product', 'source_id' => $id),true);
		$result = array('data' => $menu_item, 'media' => $media_ids);
		echo json_encode($result);
	}
	function edit($id){
		if(isset($_FILES['image'])){
			$name = $_POST['name'];
			$name_taiwan = $_POST['taiwan_name'];
			$active = $_POST['active'];
			$on_promo = $_POST['on_promo'];
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
						'on_promo' => $on_promo,
						'file_name' => $fileName,
						'description' => $description,
						'location' => $location
					);
					$this->MenuModel->save($data, $id);
					$data_media = array(
						'file_name' => $fileName,
						'location' => $location,
						'type' => 'image_product',
						'mime' => $mime
					);
					$this->MediaModel->save($data_media, $id);
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
			$on_promo = $_POST['on_promo'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$category_taiwan = $this->MenuModel->GetCategoriesTaiwan();

			$data = array(
				'name' => $name,
				'name_taiwan' => $name_taiwan,
				'category' => $category,
				'category_taiwan' => $category_taiwan[$category],
				'active' => $active,
				'on_promo' => $on_promo,
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
	function add_varation(){
		if(!empty($_POST['type']) && !empty($_POST['size']) && !empty($_POST['price']) && trim($_POST['type']) != "" && trim($_POST['size']) != "" && trim($_POST['price']) != ""){
			$msg = '';
			$status = '';
			$type = $_POST['type'];
			$size = $_POST['size'];
			$price = $_POST['price'];
			$menu_entry = $_POST['menu_entry'];

			$data = array(
				'type' => $type,
				'size' => $size,
				'price' => $price,
				'menu_entry' => $menu_entry,
			);
			$res = $this->MenuVarationModel->save($data);
			if(count($res)){
				$msg = 'Menu Varation Added!';
				$status = 'SUCCESS';
			}
			else{
				$msg = 'Please fill all required field';
				$status = 'ERROR';
			}
		}
		else{
			$msg = 'Please fill all required field';
			$status = 'ERROR';
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
			$on_promo = $_POST['on_promo'];
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
				'on_promo' => $on_promo,
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
				$this->MenuModel->delete($last->id);
			}else{
				if(file_exists($pathAndName)){
					unlink($pathAndName);
				}
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				if ($moveResult == true) {
					$mime = mime_content_type($pathAndName);
					$data_media = array(
						'file_name' => $fileName,
						'location' => $location,
						'type' => 'image_product',
						'mime' => $mime,
						'source_id' => intval($file_name)
					);
					$this->MediaModel->save($data_media);
					$msg = 'Menu Item Added Successfully!';
					$status = 'SUCCESS';

				} else {
					$msg = 'There is problem can\'t upload the file';
					$status = 'ERROR';
					$this->MenuModel->delete($last->id);
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

	public function get_menu_list(){
		$post = $this->input->post();
		$columns = array(
			array(  'db' => 'name',
					'dt' => 0,
			),
			array(  'db' => 'name_taiwan',
				'dt' => 1
			),
			array( 'db' => 'category',
				'dt' => 2
			),
			array( 'db' => 'category_taiwan',
				'dt' => 3,
			),
			array( 'db' => 'on_promo',
				'dt' => 4,
				'formatter' => function( $d, $row ) {
					if($d == 1){
						$str_return = '';
						$str_return .=' <span class="label label-primary">On Promo</span>';
						return  $str_return;
					}
				}
			),
			array( 'db' => 'active',
				'dt' => 5,
				'formatter' => function( $d, $row ) {
					if($d == 1){
						$str_return = '';
						$str_return .= '<span class="label label-success">Active</span>';
						// if($row['on_promo'] == 1){
						// 	$str_return .=' <span class="label label-primary">On Promo</span>';
						// }
						return  $str_return;
					}
					else{
						$str_return = '';
						$str_return .= ' <span class="label label-danger">Inactive</span>';
						// if($row['on_promo'] == 1){
						// 	$str_return .='<span class="label label-primary">On Promo</span>';
						// }
						return  $str_return;
					}
				}
			),
			array( 'db' => 'id',
				'dt' => 6,
				'formatter' => function( $d, $row ) {
					return  '<a href="#" id="editMenuVaration" data-toggle="modal" data-stuff="'.$d.'" data-name="'.$row['name'].'" data-target="#modal-varation"><span class="label label-primary"><i class="fa fa-database"></i></span></a>
					<a href="#" id="editMenu" data-toggle="modal" data-stuff="'.$d.'" data-target="#modal-edit"><span class="label label-primary"><i class="fa fa-pencil"></i></span></a>
					<a href="javascript:void(0)" onclick="return delete_menu('.$d.');return false;"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>';
				}
			)
		);

		$post['order'] = $this->common->ssp_order($post,$columns);
		$post['filter'] = $this->common->ssp_filter($post,$columns);
		$data = $this->MenuModel->get_array($post);
		$recordsTotal = count($data);
		$recordsFiltered = count($this->MenuModel->get_array($post,true));

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
