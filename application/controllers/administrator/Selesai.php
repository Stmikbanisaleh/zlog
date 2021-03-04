<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Selesai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_selesai');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myairwaybill = $this->model_selesai->viewWhereCustomOrdering('pengiriman', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/selesai/view',
				'ribbon'            => '<li class="active">Daftar Pengiriman</li>',
				'page_name'         => 'Daftar Pengiriman',
				'myairwaybill'		=> $myairwaybill
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_selesai->viewCustomTampil('pengiriman', 'id', 'desc')->result_array();
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
				'nama'  => $this->input->post('e_nama'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_selesai->update($data_id, $data, 'role');
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
			$my_data = $this->model_selesai->viewWhere('role', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_selesai->delete($data_id, 'role');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function updatestatus()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {


			$id = $this->input->post('id');
			$status = $this->model_selesai->getPrevStatus($id)->result_array();
			if ($status[0]['keterangan'] == 0) {
				$data = array(
					'id_pengiriman'  => $this->input->post('id'),
					'waktu_update' => date('Y-m-d H:i:s'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name'),
					'keterangan'	=> 'Packing Telah selesai, barang sedang dalam proses pengiriman'
				);
				$status = 1;
				$action = $this->model_selesai->insert($data, 'pengiriman_detail_transport');
				$statuslog = array(
					'id_pengiriman'  => $this->input->post('id'),
					'status'	=> 1,
					'is_read'	=> 0,
					'createdAt' => date('Y-m-d H:i:s'),
				);
				$this->model_selesai->insert($statuslog, 'status_log');
			} else if ($status[0]['keterangan'] == 1) {
				$data = array(
					'id_pengiriman'  => $this->input->post('id'),
					'waktu_update' => date('Y-m-d H:i:s'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name'),
					'keterangan'	=> 'Pengiriman Telah selesai, barang telah terkirim'
				);
				$status = 2;
				$action = $this->model_selesai->insert($data, 'pengiriman_detail_transport');
				$this->model_selesai->updateWaktu($this->input->post('id'), 'pengiriman');
				$statuslog = array(
					'id_pengiriman'  => $this->input->post('id'),
					'status'	=> 2,
					'is_read'	=> 0,
					'createdAt' => date('Y-m-d H:i:s'),
				);
				$this->model_selesai->insert($statuslog, 'status_log');
			}
		
			$action = $this->model_selesai->updateStatus($this->input->post('id'), 'pengiriman', $status);
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/file/photo';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload('photo1');
			$do_upload2 = $this->upload->do_upload('photo2');
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name1 = $upload_data['file_name'];
				$data = array(
					'id_pengiriman'  => $this->input->post('airwaybill'),
					'keterangan'  => $this->input->post('keterangan'),
					'waktu_update'	=> date('Y-m-d H:i:s'),
					'file'			=> $file_name1,
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'id_pengiriman'  => $this->input->post('airwaybill'),
					'keterangan'  => $this->input->post('keterangan'),
					'waktu_update'	=> date('Y-m-d H:i:s'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}

			$action = $this->model_selesai->insert($data, 'pengiriman_detail_transport');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
