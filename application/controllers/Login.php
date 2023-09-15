<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model', 'login');
        $this->load->model('Master', 'ms');
        $this->load->library('session');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data = array(
            "title" => 'Login',
            "base" => base_url(),
            "site" => site_url(),
            "url_post" => site_url('login/validationlogin')
        );

        $this->load->view('login', $data);
    }

    function validationlogin()
    {

        $this->load->library('session');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $user = $this->input->post('username');
            $password = $this->input->post('password');
            $passmd5 = md5($user . $password);
            $checkdata = $this->login->getcountlogin($user, $passmd5);

            $rowlogin = $this->login->getLogindata($user, $passmd5)->row();
            if ($checkdata == 1) {
                $session = array(
                    'ses_statuslogin' => true,
                    'ses_username' => $rowlogin->username,
                    'ses_level' => $rowlogin->level,
                    'ses_base_url' => base_url()
                );
                $this->session->set_userdata($session);
                $message = "Login Sukses";
                $valid = true;
                $redir = site_url();
            } else {
                $session = array(
                    'ses_statuslogin' => false,
                );
                $this->session->set_userdata($session);
                $valid = false;
                $redir = site_url("Login");
                $message = "Login Failed, check your username or password";
                // $userName = $user;
                // $userId = $user;
                // $statuslogin = 0;
            }
            // $valid = $valid;
            // $message = $message;

            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_username" => null,
                "err_password" => null,
                "redirecto" => $redir
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Login Data Failed',
                "hasil" => false,
                "redirecto" => site_url("Login")
            );
        }
        echo json_encode($jsonmsg);
    }

    function register()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $nama = $this->input->post('nama');
        $passmd5 = md5($user . $pass);
        $rowcek = $this->ms->getby_id('user', $user, 'username')->num_rows();
        if ($rowcek >= 1) {
            $jsonmsg = array(
                "hasil" => false,
                "msg" => 'Register Gagal, Username sudah ada',
                "redirecto" => site_url("Login")
            );
        } else {
            $data = array(
                'nama' => $nama,
                'password' => $passmd5,
                'username' => $user,
                'status' => 1,
                'level' => 2,
            );
            $this->ms->input_data('user', $data);
            $jsonmsg = array(
                "hasil" => true,
                "msg" => 'Register Berhasil, Silahkan Login',
                "redirecto" => site_url("Login")
            );
        }

        echo json_encode($jsonmsg);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }
}
