<?php defined('BASEPATH') or exit('No direct script access allowed');

class Userrole_model extends CI_Model
{
	private $table = "user_role";

	public function create($data = [])
	{
		return $this->db->insert($this->table, $data);
	}
	public function read_all_as_list(){
		$result = $this->db->select('ur_id,ur_role')
			->from('user_role')
			->where('ur_status', '1')
			->get()
			->result();

		$list[''] = display('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				if ($value->ur_id != 1) {
					$list[$value->ur_id] = display($value->ur_role);
				}
			}
			return $list;
		} else {
			return false;
		}
	}
	public function read_basic_as_list(){
		$result = $this->db->select('ur_id,ur_role')
		->from('user_role')
		->where('ur_status', '1')
		->get()
		->result();

	$list[''] = display('select_user_role');
	if (!empty($result)) {
		foreach ($result as $value) {
			if ($value->ur_id != 1) {
				$list[$value->ur_id] = display($value->ur_role);
			}
		}
		return $list;
	} else {
		return false;
	}
	}
	public function update($data = [])
	{
		return $this->db->where('user_id', $data['user_id'])
			->update($this->table, $data);
	}

	public function delete($id = null)
	{
		$this->db->where('user_id', $id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}