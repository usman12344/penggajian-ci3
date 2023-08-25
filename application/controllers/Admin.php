<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
    }

    public function index()
    {
        $data['title'] = "Data Master";

        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function data_pegawai()
    {
        $data['title'] = "Data Pegawai";

        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get_where('data_pegawai')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_pegawai', $data);
        $this->load->view('template/footer');
    }

    public function tambahdata()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get_where('data_pegawai')->result_array();


        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('nama_pegawai', 'Nama_pegawai', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_pegawai.email]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/data_pegawai', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'email' => $this->input->post('email'),
                'password' => '',
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jabatan' => $this->input->post('jabatan'),
                'tanggal_masuk' => $this->input->post('tanggal'),
                'status' => $this->input->post('status'),
                'photo' => 'defaul.jpg',
                'role_id' => 1
            );
            $this->db->insert('data_pegawai', $data);

            $des = array(
                'bulan' => '',
                'hadir' => '',
                'sakit' => '',
                'alpha' => '',
                'id_pegawai' => $this->db->insert_id()
            );

            $this->db->insert('data_kehadiran', $des);

            $jab = array(
                'gaji_pokok' => '',
                'tj_transport' => '',
                'uang_makan' => '',
                'bonus' => '',
                'nik' => $this->input->post('nik')
            );

            $this->db->insert('data_jabatan', $jab);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success Add Data Pegawai
          </div>
          ');
            redirect('admin/data_pegawai');
        }
    }

    public function hapus($id, $nik)
    {
        // $this->db->query("DELETE data_pegawai,data_kehadiran 
        // FROM data_pegawai,data_kehadiran
        // WHERE data_pegawai.id_pegawai=data_kehadiran.pegawai_id= " . $id . "");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
        $tes = $this->db->get_where('data_jabatan', ['nik' => $nik])->row_array();

        $this->db->where('id_jabatan', $tes['id_jabatan']);
        $this->db->delete('data_jabatan');
        $this->db->where('id_pegawai', $id);
        // $this->db->where('pegawai_id', $id);
        $this->db->delete(['data_pegawai', 'data_kehadiran']);

        // $this->db->where('pegawai_id', $id);



        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Delete Success
              </div>
              ');
        redirect('admin/data_pegawai');
    }

    public function errors()
    {
        $data['title'] = "Errors";
        $this->load->view('template/errors');
    }

    public function data_jabatan()
    {
        $data['title'] = "Data Jabatan";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        // $data['user'] = $this->db->get_where('data_jabatan')->result_array();

        $this->load->model('Satu_model', 'satu');

        $data['nama'] = $this->satu->getNama();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('template/footer');
    }

    public function data_absensi_pegawai()
    {
        $data['title'] = "Data Absensi Pegawai";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Satu_model', 'satu');

        $data['Nik'] = $this->satu->getNik();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_absensi_pegawai', $data);
        $this->load->view('template/footer');
    }

    // public function inputabsensi()
    // {
    //     $data['title'] = "Update Absensi";
    //     $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->load->model('Satu_model', 'satu');

    //     $data['Nik'] = $this->satu->getNik();

    //     // $data['submenu'] = $this->menu->getSubMenu();
    //     // $data['menu'] = $this->db->get_where("user_menu", ['menu' => $this->input->post('menu_id')])->row_array();
    //     // $data['menu_id'] = $this->input->post('menu_id');
    //     // var_dump($data['menu']);
    //     // var_dump($data['menu_id']);
    //     // die;
    //     // var_dump($data['menu']);
    //     // var_dump($this->input->post('id'));
    //     // die;
    //     // $this->form_validation->set_rules('title', 'Title');

    //     var_dump($this->input->post('id_kehadiran'));
    //     die;


    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('template/header', $data);
    //         $this->load->view('template/sidebar', $data);
    //         $this->load->view('admin/data_absensi_pegawai', $data);
    //         $this->load->view('template/footer');
    //     } else {
    //         $data = [
    //             'bulan' => "juli",
    //             'hadir' => $this->input->post('hadir',  true),
    //             'sakit' => $this->input->post('sakit', true),
    //             'alpha' => $this->input->post('alpha', true),
    //         ];

    //         $this->db->where('id_kehadiran', $this->input->post('id_kehadiran'));
    //         $this->db->update("data_kehadiran", $data);

    //         // $this->db->where('menu', $this->input->post('menu_id', true));
    //         // $this->db->update("user_menu", $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //             Absensi edit success!
    //           </div>');
    //         redirect('admin/data_absensi_pegawai');
    //     }
    // }

    public function inputabsensi()
    {
        $data['title'] = "Data Transaksi";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Satu_model', 'satu');

        $data['Nik'] = $this->satu->getNik();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_input_absensi', $data);
        $this->load->view('template/footer');
    }

    public function tambahdataabsensi()
    {
        $data['title'] = "Update Data Absensi";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('Satu_model', 'satu');

        $data['Nik'] = $this->satu->getNik();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_input_absensi', $data);
        $this->load->view('template/footer');

        $result = array();
        $id_kehadiran = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $hadir = $this->input->post('hadir');
        $sakit = $this->input->post('sakit');
        $alpha = $this->input->post('alpha');
        $potongan = $this->input->post('potongan');
        $keterangan = $this->input->post('keterangan');

        foreach ($id_kehadiran as $key => $val) {
            $result[] = array(
                'id_kehadiran' => $id_kehadiran[$key],
                'bulan' => $bulan[$key],
                'hadir' => $hadir[$key],
                'sakit' => $sakit[$key],
                'alpha' => $alpha[$key],
                'potongan' => $potongan[$key],
                'keterangan' => $keterangan[$key],
            );
        }

        $this->db->update_batch('data_kehadiran', $result, 'id_kehadiran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success Add Data Pegawai
          </div>
          ');
        redirect('admin/data_absensi_pegawai');
    }


    public function inputabsensii()
    {
        $data['title'] = "Data Transaksi";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Satu_model', 'satu');

        $data['Nik'] = $this->satu->getNik();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_input_absensii', $data);
        $this->load->view('template/footer');
    }

    public function tambahdataabsensii()
    {
        $data['title'] = "Tambah Data Absensi";
        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('Satu_model', 'satu');

        $data['Nik'] = $this->satu->getNik();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_input_absensi', $data);
        $this->load->view('template/footer');

        $result = array();
        $id_pegawai = $this->input->post('id');
        var_dump($id_pegawai);
        $bulan = $this->input->post('bulan');
        $hadir = $this->input->post('hadir');
        $sakit = $this->input->post('sakit');
        $alpha = $this->input->post('alpha');
        $potongan = $this->input->post('potongan');
        $keterangan = $this->input->post('keterangan');

        foreach ($id_pegawai as $key => $val) {
            $result[] = array(
                'bulan' => $bulan[$key],
                'hadir' => $hadir[$key],
                'sakit' => $sakit[$key],
                'alpha' => $alpha[$key],
                'potongan' => $potongan[$key],
                'keterangan' => $keterangan[$key],
                'id_pegawai' => $id_pegawai[$key],
            );
        }

        $this->db->insert_batch('data_kehadiran', $result, 'id_pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success Add Data Pegawai
          </div>
          ');
        redirect('admin/data_absensi_pegawai');
    }

    // Setting Potongan gaji
    public function setting_potongan_gaji()
    {
        $data['title'] = "Data Master";

        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get('potongan_gaji')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/setting_potongan_gaji', $data);
        $this->load->view('template/footer');
    }

    // Data Gaji
    public function data_gaji()
    {
        $data['title'] = "Data Master";

        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Satu_model', 'satu');
        // $ff = $this->db->get("potongan_gaji")->row_array();
        // $alpha = $ff['jml_potongan'];

        $data['Gaji'] = $this->satu->getGaji();
        $data['total_asset'] = $this->satu->hitungJumlahAsset();
        $data['total_inventori'] = $this->satu->hitungJumlahInventori();
        $data['alpha'] = $this->satu->alpha();
        $data['potongan'] = $this->satu->potongan();
        // var_dump($data['Gaji']);
        // die;

        // foreach ($data['Gaji'] as $key => $alpha) {
        //     var_dump($data['Gaji'] = $this->satu->alpha($alpha['id_pegawai']));
        // }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data_gaji', $data);
        $this->load->view('template/footer');
    }

    public function laporan_gaji()
    {
        $data['title'] = "Data Master";

        $data['admin'] = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Satu_model', 'satu');
        // $ff = $this->db->get("potongan_gaji")->row_array();
        // $alpha = $ff['jml_potongan'];

        $data['Gaji'] = $this->satu->getGaji();
        $data['total_asset'] = $this->satu->hitungJumlahAsset();
        $data['total_inventori'] = $this->satu->hitungJumlahInventori();
        $data['alpha'] = $this->satu->alpha();
        $data['potongan'] = $this->satu->potongan();
        // var_dump($data['Gaji']);
        // die;

        // foreach ($data['Gaji'] as $key => $alpha) {
        //     var_dump($data['Gaji'] = $this->satu->alpha($alpha['id_pegawai']));
        // }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/laporan_gaji', $data);
        $this->load->view('template/footer');
    }
}
