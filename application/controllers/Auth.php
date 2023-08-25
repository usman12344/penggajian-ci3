<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $data['title'] = "Login Page";

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header');
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_pegawai', ['email' => $email])->row_array();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($data['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('User');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password wrong!
                  </div>
                  ');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has been not active!
              </div>
              ');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            This email is not registered!
          </div>
          ');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $data['title'] = "Registration";

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_pegawai.email]', [
            'is_unique' => 'this is email already!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email', true);

            $data = [
                'nik' => '',
                'nama_pegawai' => $this->input->post('name', true),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jenis_kelamin' => '',
                'jabatan' => '',
                'tanggal_masuk' => time(),
                'status' => 1,
                'photo' => 'default.jpg',
                'role_id' => 1
            ];

            $this->db->insert('data_pegawai', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Account Created! Please Login!
          </div>
          ');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out
          </div>
          ');
        redirect('auth');
    }
}
