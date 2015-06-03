<?php

class User_model extends CI_Model
{

	/**
	* @usage
	* Single: $this-user_model->get(2);
	* All: $this->user_model->get();
	*/

	public function get_table($user_id = null) {
		
		if ($user_id === null){
			$query = $this->db->get('user');
		}elseif(is_array($user_id)){
			$query = $this->db->get_where('user', $user_id);
		}
		else{
 	 	    $query = $this->db->get_where('user', ['user_id' => $user_id]);
		}
		return $query->result_array();
	}

	/**
	* @usage
	* Single: $this->user_model->insert([ 'login' => 'Joth' ]);
	* All: $this->user_model->insert();
	*/


	public function insert_table($data) {

		$this->db->insert('user', $data);
		return $this->db->insert_id();

	}

	/**
	* @usage
	* Single: $result = $this->user_model->update(['login' => 'Peggy'], 3);
	* All: $this->user_model->update();
	*/

	public function update_table($data, $user_id) {
		
		$this->db->where(['user_id' => $user_id]);
		$this->db->update('user' , $data);
		return $this->db->affected_rows();
	}

	/**
	* @usage
	* Single: $this->user_model->delete(9);
	* All: $this->user_model->delete(9);
	*/

	public function delete_table($user_id) 
	{
		
		$this->db->delete('user', ['user_id' => $user_id]);

		return $this->db->affected_rows();
	}

}