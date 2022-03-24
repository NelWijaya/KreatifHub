<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Talent extends CI_Model
{
    function getDataKategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }
}