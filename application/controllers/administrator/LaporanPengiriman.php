<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LaporanPengiriman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_laporan_pengiriman');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/laporan/view',
				'ribbon'            => '<li class="active">Laporan Pengiriman </li>',
				'page_name'         => 'Laporan Pengiriman',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_laporan_pengiriman->viewOrdering('agent', 'id', 'desc')->result_array();
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
				'telp'  => $this->input->post('e_telp'),
				'alamat'  => $this->input->post('e_alamat'),
				'pj'  => $this->input->post('e_pj'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_laporan_pengiriman->update($data_id, $data, 'agent');
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
			$my_data = $this->model_laporan_pengiriman->viewWhere('agent', $data)->result();
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
			$action = $this->model_laporan_pengiriman->delete($data_id, 'agent');
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
				'pj'  => $this->input->post('pj'),
				'alamat'  => $this->input->post('alamat'),
				'telp'  => $this->input->post('telp'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
			);
			$cek = $this->model_laporan_pengiriman->checkDuplicate($data, 'agent');
			if ($cek > 0) {
				echo json_encode(401);
			} else {
				$action = $this->model_laporan_pengiriman->insert($data, 'agent');
				echo json_encode($action);
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function laporanpengiriman()
	{
		// if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		$status = $this->input->post('status');
		if($status == 10){
			$data = $this->model_laporan_pengiriman->getAllStatus($awal, $akhir)->result_array();
		} else {
			$data = $this->model_laporan_pengiriman->getByStatus($awal, $akhir, $status)->result_array();
		}

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="GeneratedFile.xlsx"');
		header('Cache-Control: max-age=0');
		
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		
		// } else {
		// 	$this->load->view('pageadmin/login'); //Memanggil function render_view
		// }
	}
}
