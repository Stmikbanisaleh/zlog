<?php

class Model_laporan_pengiriman extends CI_model
{


    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function getAllStatus($awal, $akhir)
    {
        return $this->db->query("Select a.airwaybill , a.nomor ,b.nama as driver , a.tgl_pengiriman, a.tgl_estimasi,a.tgl_selesai , a.keterangan,d.nama as agent, c.nama as jalur from pengiriman a
		join driver b on a.driver = b.id
		join ekspedisi c on a.jalur = c.id  
		join agent d on a.agent = d.id where a.createdAt between '$awal' and '$akhir'");
    }

	public function getByStatus($awal, $akhir, $status)
    {
        return $this->db->query("Select a.airwaybill , a.nomor ,b.nama as driver , a.tgl_pengiriman, a.tgl_estimasi,a.tgl_selesai , a.keterangan,d.nama as agent, c.nama as jalur from pengiriman a
		join driver b on a.driver = b.id
		join ekspedisi c on a.jalur = c.id  
		join agent d on a.agent = d.id where a.createdAt between '$awal' and '$akhir' and a.keterangan = $status ");
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }


	public function checkDuplicate($data, $table)
    {
        $this->db->where('name',$data['name']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
