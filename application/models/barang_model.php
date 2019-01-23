<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class barang_model extends CI_Model {
    
public function get_barang()
{
    return $this->db->join('kategori','kategori.id_kategori=barang.id_kategori')->get('barang')->result();
}
    public function masuk_db()
    {
        $data_barang=array(
            'nama_barang'=>$this->input->post('nama_barang'),
            'harga'=>$this->input->post('harga'),
            'stok'=>$this->input->post('stok'),
            'id_kategori'=>$this->input->post('id_kategori')
        );
        $sql_masuk=$this->db->insert('barang', $data_barang);
        return $sql_masuk;
    }

    public function detail_barang($id_barang='')
    {
        return $this->db->where('id_barang',$id_barang)->get('barang')->row();
    }
    public function update_barang()
    {
        $dt_up_barang=array(
            'nama_barang'=>$this->input->post('nama_barang'),
            'harga'=>$this->input->post('harga'),
            'stok'=>$this->input->post('stok'),
            'id_kategori'=>$this->input->post('id_kategori'));
        return $this->db->where('id_barang',$this->input->post('id_barang'))->
        update('barang', $dt_up_barang); 
    }
    public function hapus_barang($id_barang='')
    {
        $delete = $this->db->where('id_barang',$id_barang)->delete('barang');
        return $delete;
    }
        
    }
