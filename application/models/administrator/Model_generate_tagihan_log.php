<?php

class Model_generate_tagihan_log extends CI_model
{

	function viewOrderingTagihan()
    {
		return $this->db->query("select a.due_date,a.createdAt,c.name,c.no_wa,a.invoice, a.month, a.year,a.status, sum(b.price) as total_tagihan from invoice a 
		join invoice_detail b on a.id = b.invoice_id
		join customer c on a.no_services = c.no_services ");
	}

	function cek($bulan, $tahun, $no_services)
    {
		return $this->db->query("select no_services from invoice where no_services ='$no_services' and month='$bulan' and year ='$tahun' ");
	}
	
	function cekInvoice($month, $year)
    {
		return $this->db->query("select invoice, no_services from invoice where month = '$month' and year = '$year' and status = 0  ");
	}

	function viewCustomer($invoice)
    {
		return $this->db->query("Select a.invoice,a.month,a.year,b.price,d.name as nama_layanan from invoice a join invoice_detail b on a.id = b.invoice_id
		join customer c on a.no_services = c.no_services
		join package_item d on b.item_id = d.id
		where a.invoice ='".$invoice."'");
	}

	function viewPelanggan($invoice)
    {
		return $this->db->query("Select b.no_services,b.name,b.email,b.address from invoice a
		join customer b on a.no_services = b.no_services
		where a.invoice ='".$invoice."'");
	}

	function generateTagihan($services)
    {
		return $this->db->query("Select a.id as item_id , a.price from package_item a join services b on a.id = b.item_id
		where b.no_services ='".$services."'");
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
