<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    function get_all($table)
    {
        return $this->db->get($table)->result();
    }

    function get_where($table,$where)
    {
        return $this->db->get_where($table,$where)->result();
    }

    function insert($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->affected_rows();
    }

    function delete($table,$where)
    {
        $this->db->delete($table,$where);
        return $this->db->affected_rows();
    }

    function update($table,$data,$where)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
        return $this->db->affected_rows();
    }

    function get_pesanan()
    {
        $this->db->select('pesanan.id_pesanan, pesanan.no_pesanan,user_detail.nama_user,pesanan.status_pesanan,pesanan.dibuat_pesanan,pesanan.total_harga,kurir.nama_kurir');
        // $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('user_detail', 'user_detail.id_user = pesanan.id_user');
        $this->db->join('kurir', 'kurir.id_kurir = pesanan.id_kurir');
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_pesanan($id_pesanan)
    {
        $this->db->select('pesanan.no_pesanan, total_harga, status_pesanan, nama_status, nama_kurir, situs_kurir, alamat_user, no_hp_user');
        $this->db->from('pesanan');
        $this->db->where(array('pesanan.id_pesanan'=>$id_pesanan));
        $this->db->join('pesanan_status','pesanan_status.id_status = pesanan.status_pesanan');
        $this->db->join('kurir','kurir.id_kurir = pesanan.id_kurir');
        // $this->db->join('pengiriman','pengiriman.no_pesanan = pesanan.no_pesanan');
        $this->db->join('user_detail','user_detail.id_user = pesanan.id_user');
        

        

        $query = $this->db->get();
        return $query->result();
    }  

    function get_pembayaran()
    {
        $this->db->select('pembayaran.id_pembayaran, pembayaran.no_pembayaran, pesanan.no_pesanan,  pesanan.total_harga, pembayaran.status_pembayaran, pembayaran.dibuat_pembayaran, pembayaran_status.nama_status, pembayaran_status.id_status, user_detail.nama_user');
        $this->db->from('pembayaran');
        $this->db->join('pesanan','pesanan.id_pesanan = pembayaran.id_pesanan ');
        $this->db->join('pembayaran_status','pembayaran_status.id_status = pembayaran.status_pembayaran ');
        $this->db->join('user_detail', 'user_detail.id_user = pembayaran.id_user');
        $query = $this->db->get();
        return $query->result();
    }


    function get_data_pendapatan()
    {
        
        $this->db->select('*');
        $this->db->from('pesanan');
        

        $query = $this->db->get();
        return $query->result();

    }

    
}


?>