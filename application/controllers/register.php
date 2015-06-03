<?php 

class Register extends CI_Controller {
	
	public function index() {
		$this->load->view('register/inc/header_view');
		$this->load->view('register/register_view');
		$this->load->view('register/inc/footer_view');
	}	


/*	public function test() {

		$query = $this->db->get_where('user', ['user_id' => 4]);

		print_r($query->result());


		$this->db->where(['user_id' => 4]);
		$this->db->update('user' , ['login' => 'Adam', 'password' => 'password', 'email' => 'adam@hotmail.com']);
	
		$this->db->where(['user_id' => 5]);
		$this->db->delete('user');

	}


	public function code(){

	echo hash('sha256', 'password' . SALT);

	} */

}