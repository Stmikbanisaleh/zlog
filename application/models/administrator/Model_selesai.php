<?php

class Model_selesai extends CI_model
{


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

	public function viewWhereCustomOrdering()
    {
		return $this->db->query("select * from pengiriman where keterangan = 0 or keterangan = 1 ");
    }

	public function viewCustomOrderingV2()
    {
		return $this->db->query("select * from pengiriman where keterangan !=2 ");
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

	function updateStatus($id, $table, $status)
    {
        return $this->db->query("update $table set keterangan = $status where id = $id");
    }

	function getPrevStatus($id)
    {
        return $this->db->query("select keterangan from pengiriman where id = $id");
    }
    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
