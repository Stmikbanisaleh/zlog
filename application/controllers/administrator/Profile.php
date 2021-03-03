<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_profile');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/profile/view',
				'ribbon'            => '<li class="active">Comapany Profile</li>',
				'page_name'         => 'Profile Perusahaan'
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_profile->viewOrdering('profile', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'nama_perusahaan'  => $this->input->post('e_nama_perusahaan'),
				'nama_jalan'  => $this->input->post('e_nama_jalan'),
				'kode_pos'  => $this->input->post('e_kode_pos'),
				'no_telp1'  => $this->input->post('e_telp1'),
				'no_telp2'  => $this->input->post('e_telp2'),
				'kata_footer1'  => $this->input->post('e_footer1'),
				'kata_footer2'  => $this->input->post('e_footer2'),
				'kabupaten'  => $this->input->post('e_kabupaten'),
				'kecamatan'  => $this->input->post('e_kecamatan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_profile->update($data_id, $data, 'profile');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_profile->viewWhere('profile', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

}
