<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Talent extends CI_Model
{
    function getDataTalent()
    {
        $this->db->get('talent');
        $this->db->join('fotoprofile', 'talent.id_foto_profile = fotoprofile.id');
        $this->db->join('kategori', 'talent.id_kategori = kategori.id');
        $query = $this->db->get('talent');
        return $query->result();
    }

    function getPhotoTalent($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fotoprofile');

        return $query->row();
    }

    function getKategoriTalent($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('kategori');
        return $query->row();
    }

    function insertDataTalent($data)
    {
        $this->db->insert('talent', $data);
    }

    function insertPhotoTalent($data)
    {
        $this->db->insert('fotoprofile', $data);

        $query = $this->db->get('fotoprofile')->last_row();
        return $query;
    }
}