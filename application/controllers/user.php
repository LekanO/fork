<?php

class User extends CI_Controller
{

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('user_model');
	}

	public function index() {


	}
	public function login() {

		$login = $this->input->post('login');
		$password = $this->input->post('password');

		$result = $this->user_model->get_table([
			'login' =>  $login,
			'password' => hash('sha256', $password . SALT)
		]);

		print_r($result);

		die('dead');

		$this->output->set_content_type('application_json');
		if($result){
			$this->session->set_userdata(['user_id' => $result[0]['user_id']]);
			$this->output->set_output(json_encode(['result' => 1]));
		}else{
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
	}
}

	public function register() {

		$this->output->set_content_type('application_json');

		$this->form_validation->set_rules('login', 'Login', 'required|min.length[5]|max_length[20]|is_unique[user.login]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');		
		$this->form_validation->set_rules('password', 'Password', 'required/matches[confirm_password]');

		
		if ($this->form_validation->run() == false){
			$this->output->set_output(json_encode(['result' => 0,  'data' => validation_errors()]));
			return false;
		}

		$login = $this->input->post('login' );
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');		

		$user_id = $this->user_model->insert_table([
			'login' =>  $login,
			'email' => $email,
			'password' => hash('sha256', $password . SALT),
		]);
		

		if($user_id) {
			$this->session->set_userdata(['user_id' => $user_id]);
			$this->output->set_output(json_encode(['result' => 1]));
		}else{
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
		}
	}

	public function test_get() 
	{
		$data = $this->user_model->get_table(2);
		print_r($data);
	}

	public function test_insert() {

		$this->user_model->insert_table(['login' => 'Mikey']);
	
	}

	public function test_update() {

		$result = $this->user_model->update(['login' => 'Peggy'], 3);

	}

	public function test_delete() {

		$result = $this->user_model->delete_table(11);
		print_r($result);
	}

}