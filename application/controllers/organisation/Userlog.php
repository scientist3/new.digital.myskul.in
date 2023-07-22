<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlog extends CI_Controller
{
	private $user_id;
	private $org;

	public function __construct()
	{
		parent::__construct();

		$this->load->model(
			array(
				'organisation/user1_model',
				'organisation/cluster1_model',
				'organisation/center1_model',
				'center_model',
				'dashboard_model',
				'organisation_model'
			)
		);
		if (
			$this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 2
		)
			redirect('login');
		$this->user_id = $this->session->userdata('user_id');
		//$this->org_id = $this->session->userdata('org_id');
		$this->org = $this->organisation_model->read_orgheads_org($this->user_id);
	}
	public function index()
	{
		$data['title'] = 'Attendence Report';
		/*---------- Read Center List And District List ----------*/
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$l = [];
		$l['all'] = 'All';
		foreach ($data['user_role_list'] as $k => $v) {
			if ($k != 1 && $k != 2) {
				$l[$k] = $v;
			}
		}
		$data['user_role_list1'] = $l;
		$data['district_list'] = $this->dashboard_model->district_list();
		$data['org_name'] = $this->org->org_name;
		$data['org_id'] = $this->org->org_id;
		$data['cluster_id'] = $this->input->post('cluster_id');
		$data['center_id'] = $this->input->post('center_id');
		$data['user_role'] = !empty($this->input->post('user_role')) ? $this->input->post('user_role') : '4';
		//$data['user_role'] 		= ($this->input->post('user_role')=='all')?'':$data['user_role'];
		$data['date'] = !empty($this->input->post('date')) ? $this->input->post('date') : date('Y-m-d');

		$data['users'] = $this->user1_model->get_users(
			$data['org_id'],
			$data['cluster_id'],
			$data['center_id'],
			(($data['user_role'] == 'all') ? null : $data['user_role']),
			$data['date'],
			$this->user_id
		);

		$data['cluster_list'] = $this->cluster1_model->read_clusters_of_org_as_list($this->org->org_id);
		$cluster_ids = $this->cluster1_model->get_cluster_ids_of_org($this->org->org_id);
		$data['center_list'] = $this->center1_model->read_centers_of_cluster_as_list($cluster_ids);

		//print_r($data['date']);
		//die();
		// print_r($data['cluster_list']);
		//print_r($cluster_ids);
		// die();
		//print_r($data['center_list']);
		//die();

		// print_r($data['users']);die();
		$data['content'] = $this->load->view('organisation/userlog/member', $data, true);
		$this->load->view('organisation/layout/main_wrapper_lte', $data);
		// $data['users'] =$this->user1_model->get_users($this->org_id);
	}

	public function view($user_id)
	{

		$data['title'] = 'Attendence Report';
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$data['end_date'] = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
		$data['start_date'] = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d', strtotime($data['end_date'] . '-3 days'));
		$data['user_id'] = $user_id;
		$data['users'] = $this->user1_model->user_log_from_to_date(
			$data['user_id'],
			$data['start_date'],
			$data['end_date']
		);
		$data['content'] = $this->load->view('organisation/userlog/view', $data, true);
		$this->load->view('organisation/layout/main_wrapper_lte', $data);
	}

	public function absent()
	{
		$data['title'] = 'Absentee Report';
		/*---------- Read Center List And District List ----------*/
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$l = [];
		$l['all'] = 'All';
		foreach ($data['user_role_list'] as $k => $v) {
			if ($k != 1 && $k != 2) {
				$l[$k] = $v;
			}
		}
		$data['user_role_list1'] = $l;
		$data['district_list'] = $this->dashboard_model->district_list();
		$data['org_name'] = $this->org->org_name;
		$data['org_id'] = $this->org->org_id;
		$data['cluster_id'] = $this->input->post('cluster_id');
		$data['center_id'] = $this->input->post('center_id');
		$data['user_role'] = !empty($this->input->post('user_role')) ? $this->input->post('user_role') : '4';
		//$data['user_role'] 		= ($this->input->post('user_role')=='all')?'':$data['user_role'];
		$data['date'] = !empty($this->input->post('date')) ? $this->input->post('date') : date('Y-m-d');

		$data['users'] = $this->user1_model->get_absent_users(
			$data['org_id'],
			$data['cluster_id'],
			$data['center_id'],
			(($data['user_role'] == 'all') ? null : $data['user_role']),
			$data['date'],
			$this->user_id
		);
		$data['cluster_list'] = $this->cluster1_model->read_clusters_of_org_as_list($this->org->org_id);
		$cluster_ids = $this->cluster1_model->get_cluster_ids_of_org($this->org->org_id);
		$data['center_list'] = $this->center1_model->read_centers_of_cluster_as_list($cluster_ids);

		$data['content'] = $this->load->view('organisation/userlog/absent_member', $data, true);
		$this->load->view('organisation/layout/main_wrapper_lte', $data);
		// $data['users'] =$this->user1_model->get_users($this->org_id);
	}
	public function viewabsent($user_id)
	{
		$data['title'] = 'Absentee Report';
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$data['end_date'] = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
		$data['start_date'] = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d', strtotime($data['end_date'] . '-3 days'));
		$data['user_id'] = $user_id;
		$data['users'] = $this->user1_model->user_absentee_log_from_to_date(
			$data['user_id'],
			$data['start_date'],
			$data['end_date']
		);
		$data['content'] = $this->load->view('organisation/userlog/absent_view', $data, true);
		$this->load->view('organisation/layout/main_wrapper_lte', $data);
	}
}