<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_customer');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myrole = $this->model_customer->viewOrdering('role','id','desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/customer/view',
				'ribbon'            => '<li class="active">Daftar User</li>',
				'page_name'         => 'Daftar User',
				'myrole'			=> $myrole
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_customer->viewOrdering('user','id','desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		$data_id = array(
			'idsaldo'  => $this->input->post('e_id')
		);
		$data = array(
			'TotalTagihan'  => $this->input->post('e_tot_tagihan_v'),
			'Bayar'  => $this->input->post('e_bayar_v'),
			'Sisa'  => $this->input->post('e_sisa_v'),
			'tipe_generate'  => 'N',
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_customer->update($data_id, $data, 'user');
		echo json_encode($action);
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_customer->viewWhere('user', $data)->result();
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
            $action = $this->model_customer->delete($data_id, 'user');
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
				'keterangan'  => $this->input->post('keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_customer->checkDuplicate($data,'user');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_customer->insert($data, 'user');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
