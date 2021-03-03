<?php

class Model_pengiriman extends CI_model
{
	
	public function getEstimasiDay($id)
    {
        
        return $this->db->query("select tgl_estimasi,tgl_pengiriman from pengiriman where id = $id");
    }

	public function viewKeterangan($id)
    {
        
        return $this->db->query("select deskripsi from pengiriman where id = $id");
    }


	public function getkategorigoods($id)
    {
        
        return $this->db->query("select b.nama from kategorigoods b join barang a on b.id = a.kategorigoods where b.id = $id");
    }


	public function viewCustom($table, $data)
    {
        
        return $this->db->query("select a.id,a.satuan,b.nama as barang,a.berat, a.harga, a.dimensi from pengiriman_detail a join barang b
		on a.barang = b.id where a.id_pengiriman = $data[id_pengiriman]");
    }

	public function viewCustomTampil($table, $data)
    {
        
        return $this->db->query("select a.airwaybill, a.tgl_pengiriman ,a.tgl_estimasi,a.id, a.nomor,a.keterangan , b.nama as agent , c.nama as driver , d.nama as jalur from pengiriman a
		join agent b on a.agent = b.id
		join driver c on a.driver = c.id 
		join ekspedisi d on a.jalur = d.id 
		order by a.createdAt desc");
    }

	
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
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
