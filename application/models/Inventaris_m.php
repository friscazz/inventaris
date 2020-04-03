<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_m extends CI_Model{
     
      
     public function getMax($table = null, $field = null){
          $this->db->select_max($field);
          return $this->db->get($table)->row_array()[$field];
     }
     public function Dataedit($id){
          return $this->db->get_where('inventaris', ['id' => $id])->row_array();
     }
     public function editData($img, $barang, $nama){
          $harga = $this->input->post('harga', true);
          $harga_awal = preg_replace("/[^0-9]/", "", $harga);
          $harga_int = (int) $harga_awal;
          $tanggal = date('m-d-Y', strtotime($this->input->post('pembelian', true)));        
          if ($img['image'] == null) {
                    $update = array(
                         'nama_barang' => $barang,
                         'penanggung_jawab' => $nama,
                         'id_kondisi' => $this->input->post('kondisi', true),
                         'id_kategori' => $this->input->post('kategori', true),
                         'tgl_beli' => $tanggal,
                         'harga' => $harga_int
                    );
          } else {
               $update = array(
                    'nama_barang' => $barang,
                    'penanggung_jawab' => $nama,
                    'id_kondisi' => $this->input->post('kondisi', true),
                    'id_kategori' => $this->input->post('kategori', true),
                    'img' => $img['image'],
                    'tgl_beli' => $tanggal,
                    'harga' => $harga_int
               );
          }
          $this->db->where('id', $this->input->post('id'));
          $this->db->update('inventaris', $update);
     }
     public function tampilData(){
          $sql = $this->db->query("SELECT i.id,i.nama_barang,i.penanggung_jawab,k.nama_kondisi,ka.nama_kategori FROM inventaris as i LEFT JOIN kategori as ka ON ka.id = i.id_kategori LEFT JOIN kondisi as k ON k.id = i.id_kondisi ");
          return $sql->result_array();
     }
     public function addData($img,$kode,$barang,$nama,$image_name,$tanggal,$harga_int){
                
          $post = array('nama_barang' => $barang,
                    'penanggung_jawab' => $nama,
                    'id_kondisi' => $this->input->post('kondisi', true),
                    'id_kategori' => $this->input->post('kategori', true),
                    'kode' => $kode,
                    'img' => $img['image'],
                    'img_code' => $image_name,
                    'tgl_beli' => $tanggal,
                    'harga' => $harga_int );
          $this->db->insert('inventaris',$post);
     }
     public function tampilKategori(){
          return $this->db->get('kategori')->result_array();
     }
     public function AddKategori(){
          $post = array('nama_kategori' => $this->input->post('kategori',true) );
          $this->db->insert('kategori',$post);
     }
     public function DeleteKategori($id)
     {
          $this->db->where('id',$id);
          $this->db->delete('kategori');
     }
     public function UpdateKategori($id){
          $update = array('nama_kategori' => $this->input->post('kategori', true));
          $this->db->where('id',$id);
          $this->db->update('kategori',$update);
     }
     
     public function tampilJenis()
     {
          return $this->db->get('jenis')->result_array();
     }
     public function AddJenis()
     {
          $post = array('nama_jenis' => $this->input->post('jenis', true));
          $this->db->insert('jenis', $post);
     }
     public function DeleteJenis($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('jenis');
     }
     public function UpdateJenis($id)
     {
          $update = array('nama_jenis' => $this->input->post('jenis', true));
          $this->db->where('id', $id);
          $this->db->update('jenis', $update);
     }
    
     public function tampilKondisi()
     {
          return $this->db->get('kondisi')->result_array();
     }
     public function AddKondisi()
     {
          $post = array('nama_kondisi' => $this->input->post('kondisi', true));
          $this->db->insert('kondisi', $post);
     }
     public function DeleteKondisi($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('kondisi');
     }
     public function UpdateKondisi($id)
     {
          $update = array('nama_kondisi' => $this->input->post('kondisi', true));
          $this->db->where('id', $id);
          $this->db->update('kondisi', $update);
     }
}