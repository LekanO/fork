<?php

class Api extends CI_Controller {

	public function __construct() {

		parent:: __construct();

	}

	private function _requireLogin(){
		if($this->session->userdata('user_id') == false){
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
			}
		}

	public function login() {

		$login = $this->input->post('login');
		$password = $this->input->post('password');

		$this->load->model('user_model');

		$result = $this->user_model->get_table([
			'login' =>  $login,
			'password' => hash('sha256', $password . SALT)
		]);

		if($result){
			$this->output->set_content_type('application_json');
			$this->session->set_userdata(['user_id' => $result[0]['user_id']]);
			$this->output->set_output(json_encode(['result' => 1]));
		}else{
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
		}
}

	public function register() {

		$this->output->set_content_type('application_json');

		$this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]|is_unique[user.login]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
		
		if ($this->form_validation->run() == false){
			$this->output->set_output(json_encode(['result' => 0,  'error' => $this->form_validation->error_array()]));
			return false;
		}

		$login = $this->input->post('login' );
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');		

		$this->load->model('user_model');
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

	public function create_todo(){	

	$this->output->set_content_type('application_json');

	$this->form_validation->set_rules('content', 'Content', 'required|min_length[5]|max_length[50]');

		if($this->form_validation->run() == false) {
			$this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
			return false;
		}
			
		$result = $this->db->insert('todo', [
			'content' => $this->input->post('content'),
			'user_id' => $this->session->userdata('user_id')
		]);
		
		if($result) {

			$query	= $this->db->get_where('todo', ['todo_id' => $this->db->insert_id()]);
			
			$result = $query->result();

			$this->output->set_output(json_encode([
				'result' => 1,
				'data' => $result
			]));
		}
		else{
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
		}
	}

	public function get_todo($id = null){
	//	_requireLogin();

		// $this->output->set_content_type('application_json');
		
		if ($id != null){
			$this->db->where([
				'todo_id' => $id,
				'user_id' => $this->session->userdata('user_id')
			]);
		}
		else{
			$this->db->where('user_id', $this->session->userdata('user_id'));
		}
			$query = $this->db->get('todo');

			$result = $query->result();

		if($result) {
			$this->output->set_output(json_encode($result));
		}

	}

	public function update_todo(){
	
	_requireLogin();
	$todo_id = $this->input->post('todo_id');		
		
	}

	public function delete_todo(){
	_requireLogin();
	$todo_id = $this->input->post('todo_id');	
		
	}

	public function create_note(){
	// _requireLogin();
	// $note_id = $this->input->post('note_id');

	}

	public function update_note(){
	_requireLogin();
	$note_id = $this->input->post('note_id');		
		
	}

	public function delete_note(){
	_requireLogin();
	$note_id = $this->input->post('note_id');
		
	}

}