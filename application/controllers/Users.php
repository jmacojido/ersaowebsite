<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('password_hash');
		$this->load->library('email');
		$this->load->model('UsersModel');
		$this->load->model('UsersInfoModel');
	}

	function signup(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;


		$data['pageTitle'] = 'Users | '.TITLE;
		$data['pageId'] = '';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Users/signup.php', $data);
		$this->load->view('templates/footer.php');
	}

	function register(){
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'jm.acojids@gmail.com',
			'smtp_pass' => 'tinenijm123',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$email_hash_code = md5(uniqid(rand() . config_item('encryption_key'), true)).time();
		$this->data['code'] = $email_hash_code;

		$template = $this->load->view('templates/signup_confirmation_email', $this->data, true);

		$this->email->to('jm.acojids@gmail.com');
		$this->email->from('jm.acojids@gmail.com','MyWebsite');
		$this->email->subject('How to send email via SMTP server in CodeIgniter');
		$this->email->message($template);

		//Send email
		$this->email->send();

		$data = array(

			'email_address' => 'jm.acojids@gmail.com',
			'password' => $this->password_hash->create_hash('password123'),
			'role' => 'user',
			'validated' => 0,
			'hash' => $email_hash_code
		);
		$id = $this->UsersModel->save($data);

		$data = array(
			'user_account_id' => $id,
			'firstname' => 'Joe Mark',
			'lastname' => 'Acojido',
			'date_of_birth' => '1994-01-26',
			'contact' => '09272376511',
			'building' => 'P.Torres Compound',
			'street' => 'Molino St.',
			'barangay' => 'Ligas 1',
			'city' => 'Bacoor City',
			'province' => 'Cavite',
			'zip' => '6606',
		);

		$this->UsersInfoModel->save($data);

	}

	function user_confirmation($code){
		if(!empty($code)){
			// verify account
			$user = $this->UsersModel->get_account(array('hash' => $code));


			if(count($user) && $user->validated == 0){
				// update verify
				$this->UsersModel->save(array('validated' => 1), $user->id);

				//add to data to session
				$info = array(
					'id' => $user->id,
					'email' => $user->email,
					'loggedin' => true,
					'firstname' => $user->fname,
					'lastname' => $user->lname,
					'validated' => true
				);
				$this->session->set_userdata($info);
				echo json_encode($info);
			}
		}else{
			show_404(current_url());
		}
	}

	function user_authentication(){

	}

	function user_session(){

	}

}

?>
