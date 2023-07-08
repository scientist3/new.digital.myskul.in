<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $organisation;
	private $user_id;
	public function __construct()
	{
		parent::__construct();

		$this->load->model(
			array(
				'dashboard_model',
				'setting_model',
				'user_model',
				'organisation_model',
				'cluster_model',
				'center_model',
				'user_model',
				'messages/message_model',
				'organisation/user1_model'
			)
		);
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 2)
			redirect('login');
		$this->user_id = $user_id = $this->session->userdata('user_id');
		$this->organisation = $this->organisation_model->read_orgheads_org($user_id);
		//print_r($this->organisation);
		//print_r($this->user_id);
	}
	public function index()
	{
		$data['title'] = "Admin";
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		//print_r($data['organisation']);
		#--------------------------------------------------#
		$data['total_clusters'] = $this->cluster_model->total_clusters_of_org($this->organisation->org_id);
		$data['total_centers'] = $this->center_model->total_centers_of_org($this->organisation->org_id);
		$data['total_animators'] = $this->user_model->total_animators_of_org($this->organisation->org_id);
		$data['total_students'] = $this->user_model->total_students_of_org($this->organisation->org_id);
		$data['new_messages'] = $this->message_model->new_messages_for_user($this->user_id);
		$data['total_logedin_today'] = $this->user1_model->total_logedin_today($this->organisation->org_id, $this->user_id);
		$data['total_cor_logedin'] = $this->user1_model->total_cor_loggedin_today($this->organisation->org_id, $this->user_id);
		$data['total_ani_logedin'] = $this->user1_model->total_ani_loggedin_today($this->organisation->org_id, $this->user_id);
		$data['total_std_logedin'] = $this->user1_model->total_std_loggedin_today($this->organisation->org_id, $this->user_id);

		$data['total_absentee_today'] = $this->user1_model->total_absentee_today($this->organisation->org_id, $this->user_id);
		$data['total_cor_absentee'] = $this->user1_model->total_cor_absentee_today($this->organisation->org_id, $this->user_id);
		$data['total_ani_absentee'] = $this->user1_model->total_ani_absentee_today($this->organisation->org_id, $this->user_id);
		$data['total_std_absentee'] = $this->user1_model->total_std_absentee_today($this->organisation->org_id, $this->user_id);

		#--------------------------------------------------#
		$data['content'] = $this->load->view('organisation/home', $data, true);
		$this->load->view('organisation/starter/starter_layout', $data);
	}

	public function profile()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');
		$data['title'] = display('profile');
		#------------------------------# 
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->user_model->read_user_by_id($user_id);
		$data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$data['content'] = $this->load->view('organisation/profile', $data, true);
		$this->load->view('organisation/layout/main_wrapper_lte', $data);
	}

	public function email_check($email, $user_id)
	{
		$emailExists = $this->db->select('email')
			->where('email', $email)
			->where_not_in('user_id', $user_id)
			->get('student')
			->num_rows();

		if ($emailExists > 0) {
			$this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
			return false;
		} else {
			return true;
		}
	}

	// Profile Edit
	public function form()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = display('edit_profile');
		$user_id = $this->session->userdata('user_id');
		#-------------------------------#
		$this->form_validation->set_rules('firstname', display('first_name'), 'required|max_length[50]');
		// $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

		$this->form_validation->set_rules('email', display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");

		$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5');

		$this->form_validation->set_rules('phone', display('phone'), 'max_length[20]');
		$this->form_validation->set_rules('mobile', display('mobile'), 'required|max_length[20]');
		$this->form_validation->set_rules('blood_group', display('blood_group'), 'max_length[10]');
		$this->form_validation->set_rules('sex', display('sex'), 'required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth', display('date_of_birth'), 'max_length[10]');
		//$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
		$this->form_validation->set_rules('status', display('status'), 'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'uploads/admin/profilepic/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture,
				200,
				200
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
		#-------------------------------# 
		$data['user'] = (object) $postData = [
			'user_id' => $this->input->post('user_id'),
			'firstname' => $this->input->post('firstname', true),
			'mobile' => $this->input->post('mobile', true),
			'email' => /*"std".$this->randStrGen(3,4)."@gmail.com",// */$this->input->post('email'),
			//'user_role'     => $this->input->post('user_role'),
			'picture' => (!empty($picture) ? $picture : $this->input->post('old_picture')),
			'password' => md5($this->input->post('password')),
			'district' => $this->input->post('district'),
			'block' => $this->input->post('block'),
			'village' => $this->input->post('village'),
			'age' => $this->input->post('age'),
			'sex' => $this->input->post('sex'),
			//'created_by'    => $this->session->userdata('user_id'),
			//'create_date'   => date('Y-m-d'),
			'update_date' => date('Y-m-d'), //$this->input->post('update_date'),
			//'status'        => 1 //$this->input->post('status')
			/*
						'user_id'      => $this->input->post('user_id',true),
						'firstname'    => $this->input->post('firstname',true),
						'lastname'     => $this->input->post('lastname',true),
						'designation'  => $this->input->post('designation',true),
						'department_id' => $this->input->post('department_id',true),
						'address'      => $this->input->post('address',true),
						'phone'        => $this->input->post('phone',true),
						'mobile'       => $this->input->post('mobile',true),
						'email'        => $this->input->post('email',true),
						'password'     => md5($this->input->post('password',true)),
						'short_biography' => $this->input->post('short_biography',true),
						'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
						'specialist'   => $this->input->post('specialist',true),
						'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
						'sex'          => $this->input->post('sex',true),
						'blood_group'  => $this->input->post('blood_group',true),
						'degree'       => $this->input->post('degree',true),
						'created_by'   => $this->session->userdata('user_id'),
						'create_date'  => date('Y-m-d'),
						'status'       => $this->input->post('status',true),*/
		];
		//$data['student'] = (object)$postData;
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if ($this->user_model->update($postData)) {
				#set success message
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			//update profile picture
			if ($postData['user_id'] == $this->session->userdata('user_id')) {
				$this->session->set_userdata([
					'picture' => $postData['picture'],
					'fullname' => $postData['firstname'] . ' ' . $postData['lastname']
				]);
			}
			redirect('organisation/organisation/profile/');
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->dashboard_model->profile($user_id);
			$data['user_role_list'] = $this->dashboard_model->get_user_roles();
			$data['content'] = $this->load->view('organisation/profile', $data, true);
			$this->load->view('organisation/layout/main_wrapper_lte', $data);
		}
	}
}