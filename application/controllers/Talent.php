<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talent extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kategori');
        $this->load->model('M_Talent');
        $this->load->helper('security');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['kategori'] = $this->M_Kategori->getDataKategori();

        // Config
        $config['base_url'] = base_url() . 'talent/index';
        $config['total_rows'] = $this->M_Talent->getCount();
        $config['per_pages'] = 10;

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['talent'] = $this->M_Talent->getDataTalent($config['per_pages'], $data['start']);

        // echo "<pre>";
        // print_r($data['talent']);
        // echo "</pre>";
        // die();
        $this->load->view('talent/index',  $data);
    }


    public function kategori()
    {
        $dataKategori = $this->M_Kategori->getDataKategori();
        $data = array('data' => $dataKategori);
        $this->load->view('talent/kategori',  $data);
    }

    public function search()
    {
        $key = $this->input->post('keyword');
        $data['talent'] = $this->M_Talent->getKeyword($key);
        $this->load->view('talent/search', $data);
    }


    public function addTalent()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $age = $this->input->post('age');
        $gender = $this->input->post('gender');
        $kategori = $this->input->post('kategori');
        $skills = $this->input->post('skills');
        $location = $this->input->post('location');
        $aboutme = $this->input->post('aboutme');
        $photo = $_FILES['photo'];
        // echo "<pre>";
        // print_r($kategori);
        // echo "</pre>";
        // die();

        if ($photo = '') {
        } else {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                echo "Upload Gagal";
                die();
            } else {
                $photo = $this->upload->data('file_name');
            }
        }

        $arrPhoto = array(
            'foto_profile' => $photo,
        );

        $arrPhoto = $this->security->xss_clean($arrPhoto);
        $dataTbPhoto = $this->M_Talent->insertPhotoTalent($arrPhoto);

        $arrIns = array(
            'email' => $email,
            'phone_number' => $phone_number,
            'age' => $age,
            'id_foto_profile' => $dataTbPhoto->id,
            'name' => $name,
            'gender' => $gender,
            'skills' => $skills,
            'location' => $location,
            'aboutme' => $aboutme,
            'id_kategori' => $kategori,
        );
        $arrIns = $this->security->xss_clean($arrIns);
        $add = $this->M_Talent->insertDataTalent($arrIns);
        if (!$add) {
            $this->session->set_flashdata('success', 'Data Talent berhasil ditambah!');
        } else {
            $this->session->set_flashdata('danger', 'Data Talent gagal ditambah!');
        }
        redirect(base_url('/'));
    }


    // UNTUK KATEGORI

    public function addKategori()
    {
        $kategori = $this->input->post('kategori');
        $arrIns = array(
            'nama_kategori' => $kategori,
        );
        $arrIns = $this->security->xss_clean($arrIns);

        $add = $this->M_Kategori->insertDataKategori($arrIns);

        if (!$add) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah!');
        } else {
            $this->session->set_flashdata('danger', 'Data gagal ditambah!');
        }

        redirect(base_url('talent/kategori'));
    }

    public function updateKategori($id)
    {
        $kategori = $this->input->post('kategori');

        $arrIns = array(
            'nama_kategori' => $kategori,
        );
        $arrIns = $this->security->xss_clean($arrIns);

        $update = $this->M_Kategori->updateDataKategori($id, $arrIns);
        if (!$update) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        } else {
            $this->session->set_flashdata('danger', 'Data gagal diupdate!');
        }
        redirect(base_url('talent/kategori'));
    }

    public function deleteKategori($id)
    {
        $delete = $this->M_Kategori->deleteDataKategori($id);
        if (!$delete) {
            $this->session->set_flashdata('success', 'Data berhasil didelete!');
        } else {
            $this->session->set_flashdata('danger', 'Data gagal didelete!');
        }
        redirect(base_url('talent/kategori'));
    }
}