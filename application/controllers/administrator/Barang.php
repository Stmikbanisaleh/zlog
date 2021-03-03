<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_barang');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mygoods = $this->model_barang->viewOrdering('kategorigoods','id','asc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/barang/view',
				'ribbon'            => '<li class="active">Master Barang</li>',
				'page_name'         => 'Master Barang',
				'mygoods'			=> $mygoods
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_barang->viewCustom('barang', 'id', 'desc')->result_array();
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
				'keterangan'  => $this->input->post('e_keterangan'),
				'satuan'  => $this->input->post('e_satuan'),
				'sku'  => $this->input->post('e_sku'),
				'kategorigoods'  => $this->input->post('e_kategorigoods'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
            );
			$action = $this->model_barang->update($data_id, $data, 'barang');
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
			$my_data = $this->model_barang->viewWhere('barang', $data)->result();
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
            $action = $this->model_barang->delete($data_id, 'barang');
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
				'satuan'  => $this->input->post('satuan'),
				'sku'  => $this->input->post('sku'),
				'kategorigoods'  => $this->input->post('kategorigoods'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_barang->checkDuplicate($data,'barang');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_barang->insert($data, 'barang');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
