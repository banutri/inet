<?php


class M_Customer extends CI_Model
{
    function get_user($where)
    {
        return $this->db->get_where('user',$where)->result();
    }
    
    /// start get semua barang 
    function get_all_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }
    /// end get semua

    function get_all_barang_kategori($where)
    {
        $this->db->select('*');
        $this->db->where($where); // where kategori
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }


    /// start get query
    function get_all($table)
    {
        return $this->db->get($table)->result();
    }
    // end query


     /// start ge where
     function get_where($table,$where)
     {
         return $this->db->get_where($table,$where)->result();
     }
     // end get where


     // start pencarian
     // yg menargetkan kolom nama barang dan kolom nama kategori
     function search_data($keyword)
     {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('barang.nama_brg',$keyword); /// dicari per kolom
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $query  =   $this->db->get();
        return $query->result();
     }
     /// end pencarian


     /// start insert data 
     function insert($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->affected_rows();
    }
    /// end insert data


    /// start update data
     function update($table,$data,$where)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
        return $this->db->affected_rows();
    }
    /// end update data

    // function join_()
    // {
    //     $this->db->select('*');
    //     $this->db->from('barang');
    //     $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    function get_isi_keranjang($id_user)
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where(array('id_user'=>$id_user));
        $this->db->join('barang','keranjang.id_barang = barang.id_barang');
        $query = $this->db->get();
        return $query->result();
    }

    function get_kategori_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where(array('id_barang'=>$id_barang));
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    function get_pesanan($id_user)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where(array('id_user'=>$id_user));
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_pesanan($id_pesanan)
    {
        $this->db->select('pesanan.no_pesanan, total_harga,  nama_kurir, situs_kurir, nama_user, alamat_user, no_hp_user, harga_kurir');
        $this->db->from('pesanan');
        $this->db->where(array('pesanan.id_pesanan'=>$id_pesanan));
        $this->db->join('kurir','kurir.id_kurir = pesanan.id_kurir');
        // $this->db->join('pengiriman','pengiriman.no_pesanan = pesanan.no_pesanan');
        $this->db->join('user_detail','user_detail.id_user = pesanan.id_user');
  
        $query = $this->db->get();
        return $query->result();
    }   
    

    function get_data_pembayaran_by($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where(array('id_pesanan'=>$id_pesanan));
        $this->db->join('bank_transfer','bank_transfer.id_bank = pembayaran.id_bank');
        $query = $this->db->get();
        return $query->result();
    }

    function delete($table,$where)
    {
        $this->db->delete($table,$where);
        return $this->db->affected_rows();
    }
}

?>