<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kategori extends CI_Model
{
    function getDataKategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    function insertDataKategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function updateDataKategori($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    function deleteDataKategori($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('kategori');
    }
}