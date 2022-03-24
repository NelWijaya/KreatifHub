<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Talent extends CI_Model
{
    function getDataTalent($limit, $start)
    {
        $this->db->get('talent');
        $this->db->join('fotoprofile', 'talent.id_foto_profile = fotoprofile.id');
        $this->db->join('kategori', 'talent.id_kategori = kategori.id');
        $query = $this->db->get('talent', $limit, $start)->result();
        return $query;
    }

    function getCount()
    {
        return $this->db->get('talent')->num_rows();
    }

    function getKeyword($key)
    {
        $this->db->select('*');
        $this->db->from('talent');
        $this->db->like('nama_kategori', $key);
        $this->db->or_like('name', $key);
        $this->db->join('fotoprofile', 'talent.id_foto_profile = fotoprofile.id');
        $this->db->join('kategori', 'talent.id_kategori = kategori.id');


        return $this->db->get()->result();
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