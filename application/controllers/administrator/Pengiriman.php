<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_pengiriman');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mybarang = $this->model_pengiriman->viewOrdering('barang', 'id', 'desc')->result_array();
			$myagent = $this->model_pengiriman->viewOrdering('agent', 'id', 'desc')->result_array();
			$mydriver = $this->model_pengiriman->viewOrdering('driver', 'id', 'desc')->result_array();
			$myekspedisi = $this->model_pengiriman->viewOrdering('ekspedisi', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/pengiriman/view',
				'ribbon'            => '<li class="active">Daftar Pengiriman</li>',
				'page_name'         => 'Pengiriman',
				'myagent'			=> $myagent,
				'mybarang'			=> $mybarang,
				'mydriver'			=> $mydriver,
				'myekspedisi'		=> $myekspedisi


			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function detail()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$detail = $this->input->get('id');
			$keterangan = $this->model_pengiriman->viewKeterangan($detail)->result_array();
			$estimasiday = $this->model_pengiriman->getEstimasiDay($detail)->result_array();
			$totalDay = $this->diffDay($estimasiday[0]);
			$data = array(
				'page_content'      => '../pageadmin/pengiriman/view_detail',
				'ribbon'            => '<li class="active"> Pengiriman Detail</li>',
				'page_name'         => 'Pengiriman Detail',
				'id'				=> $detail,
				'estimasi_day'		=> $totalDay,
				'keterangan'		=> $keterangan[0]['deskripsi']
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	private function diffDay($estimasiday){
		$diff = strtotime($estimasiday['tgl_pengiriman']) - strtotime($estimasiday['tgl_estimasi']); 
		// 1 day = 24 hours 
		// 24 * 60 * 60 = 86400 seconds 
		return abs(round($diff / 86400)); 
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_pengiriman->viewCustomTampil('pengiriman', 'id', 'desc')->result_array();
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
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_pengiriman->update($data_id, $data, 'pengiriman');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function showkategorigoods()
	{

		$id = $this->input->post('id');
		$result = $this->model_pengiriman->getkategorigoods($id)->result_array();
		echo json_encode($result[0]['nama']);
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_pengiriman->viewWhere('pengiriman', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid_pengiriman()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id_pengiriman'  => $this->input->post('id'),
			);
			$my_data = $this->model_pengiriman->viewCustom('pengiriman_detail', $data)->result();
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
			$action = $this->model_pengiriman->delete($data_id, 'pengiriman');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function delete2()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_pengiriman->delete($data_id, 'pengiriman_detail');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'airwaybill'  => $this->input->post('airwaybill'),
				'agent'  => $this->input->post('agent'),
				'nomor'  => $this->input->post('nomor'),
				'driver'  => $this->input->post('driver'),
				'tgl_pengiriman'  => $this->input->post('tgl'),
				'tgl_estimasi'  => $this->input->post('tgl2'),
				'deskripsi'	=> $this->input->post('keterangan2'),
				'jalur'  => $this->input->post('jalur'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
			);
		
			$action = $this->model_pengiriman->insert($data, 'pengiriman');
			$id_pengiriman = $this->db->insert_id();
			// $datapengirimandetail = array(
			// 	'id_pengiriman'  => $id_pengiriman,
			// 	'waktu_update'	=> date('Y-m-d H:i:s'),
			// 	'createdAt' => date('Y-m-d H:i:s'),
			// 	'keterangan'	=> $this->input->post('keterangan2'),
			// 	'createdBy'	=> $this->session->userdata('name')
			// );
			// $this->model_pengiriman->insert($datapengirimandetail, 'pengiriman_detail_transport');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function simpanItem()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id_pengiriman'  => $this->input->post('id_pengiriman'),
				'barang'  => $this->input->post('barang'),
				'satuan'  => $this->input->post('satuan'),
				'berat'  => $this->input->post('berat'),
				'harga'  => $this->input->post('harga'),
				'dimensi'  => $this->input->post('dimensi'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
			);
			$action = $this->model_pengiriman->insert($data, 'pengiriman_detail');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function print()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			ob_start();
			$this->load->view('pageadmin/pengiriman/print');
			$html = ob_get_contents();
			ob_end_clean();
				
			require './assets/html2pdf/autoload.php';
			
			$pdf  = new Spipu\Html2Pdf\Html2Pdf('L', array(500,105), 'en', true, 'UTF-8', array(0, 0, 0, 0));
			$pdf->WriteHTML($html);
			$pdf->Output('Data Siswa.pdf', 'D');
	
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function print2()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
		//28.35 = 1
        $paper = array(0,0,595,420);
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('pageadmin/pengiriman/print',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}
