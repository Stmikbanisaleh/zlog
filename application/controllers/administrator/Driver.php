<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_driver');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mywilayah = $this->model_operator->viewOrdering('wilayah', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/driver/view',
				'ribbon'            => '<li class="active">Master Driver</li>',
				'page_name'         => 'Daftar Driver',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_driver->viewOrdering('driver', 'id', 'desc')->result_array();
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
				'telp'  => $this->input->post('e_telp'),
				'alamat'  => $this->input->post('e_alamat'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_driver->update($data_id, $data, 'driver');
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
			$my_data = $this->model_driver->viewWhere('driver', $data)->result();
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
            $action = $this->model_driver->delete($data_id, 'driver');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

            $data = array(
                'nama'  => $this->input->post('nama'),
				'telp'  => $this->input->post('telp'),
				'alamat'  => $this->input->post('alamat'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_driver->checkDuplicate($data,'driver');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_driver->insert($data, 'driver');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
