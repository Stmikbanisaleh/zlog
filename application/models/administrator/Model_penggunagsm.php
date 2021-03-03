<?php

class Model_penggunagsm extends CI_model
{
	

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewOrderingCustomV2($table, $order, $ordering)
    {
        return $this->db->query("select a.*,b.name as nama_operator,c.besar_quota as besar_quota_qty from pengguna_gsm a join operator b on a.operator = b.id
		join quota c on a.besar_quota = c.id ");
    }

	public function viewWhereCustom($operator)
    {
        return $this->db->query("select * from quota where operator = $operator");
    }

	public function viewWhereCustomV2($operator)
    {
        return $this->db->query("select * from quota where operator = $operator");
    }

	public function checkDuplicate($data, $table)
    {
        $this->db->where('id',$data['nama']);
        return $this->db->get($table)->num_rows();
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
