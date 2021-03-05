<?php

class Model_customer extends CI_model
{

    public function view()
    {
        return  $this->db->query('select * from jenjang where isdeleted != 1 ');
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewOrderingCustom($table, $order, $ordering)
    {
        return $this->db->query("select a.*,b.nama as nama_role from $table a join role b on a.role_id = b.id order by id desc");
    }

	public function checkDuplicate($data, $table)
    {
        $this->db->where('email',$data['email']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
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
