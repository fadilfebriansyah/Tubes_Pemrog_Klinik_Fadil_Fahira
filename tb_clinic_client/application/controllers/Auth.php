<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Auth_model');
      $this->load->library('form_validation');
      $this->load->library('session');
   }

   public function index()
   {
    if ($this->session->userdata('key') == ''){
        $this->load->view('auth/login');
    } else{
        redirect ('dashboard');
    }
   }

   public function login() {
        $data = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
        ];

        $insert = $this->Auth_model->loginClient($data);
        if($insert['status'] == 'Login Berhasil'){
            $this->session->set_flashdata('flash','Login Berhasil!');
            $this->session->set_userdata('KEY', $insert['data']['key']);
            redirect('dashboard');
        }elseif ($insert['status'] == 'Login Gagal') {
            $this->session->set_flashdata('message','Username atau Password Salah atau ApiKey Tidak Ada!');
            redirect('auth');
        }else{
            $this->session->set_flashdata('message', 'Login Error!');
            redirect('auth');
        }
    }
    public function logout() {
		$this->session->unset_userdata('KEY');
		redirect('auth');
	}

	public function register()
	{
		$this->load->view('auth/register');
	}
    public function registerClient()
	{
		$data = [
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
            "no_hp" => $this->input->post('no_hp'),
		];

		$insert = $this->Auth_model->registerClient($data);
		if($insert['status'] == 'Register Berhasil'){
			$this->session->set_flashdata('flash','Register Berhasil!');
			$this->generateapikey($insert['data']);
		}elseif ($insert['status'] == 'Register Gagal') {
			$this->session->set_flashdata('message','Inputan tidak boleh ada yang kosong!');
			redirect('auth/register');
		}else{
			$this->session->set_flashdata('message', 'Register Error!');
			redirect('auth/register');
		}
	}

	public function generateapikey($newId) {
		$newKey['newKey'] = '';
		$newKey['newId'] = $newId;
		$this->load->view('auth/generatekunci', $newKey);
	}

	public function generatekey() {
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charsLength = strlen($chars);
		$keyLength = 7;
		$newKey['newKey'] = '';
		for ($i = 0;$i < $keyLength; $i++) {
			$newKey['newKey'] .= $chars[rand(0, $charsLength - 1)];
		}
		$data = [
			'user_id' => $this->input->post('user_id'),
			'key' => $newKey['newKey']
		];

		$saveKey = $this->Auth_model->simpanKunci($data);
		$newKey['newId'] = $this->input->post('user_id');

		$this->load->view('auth/generatekunci', $newKey);
	}
	// public function registerClient()
	// {
	// 	$data = [
	// 		"username" => $this->input->post('username'),
	// 		"password" => $this->input->post('password'),
    //         "no_hp" => $this->input->post('no_hp'),
	// 	];

	// 	$insert = $this->Auth_model->registerClient($data);
	// 	if($insert['status'] == 'Register Berhasil'){
	// 		$this->session->set_flashdata('flash','Register Berhasil!');
	// 		$this->generatekunci($insert['data']);
	// 	}elseif ($insert['status'] == 'Register Gagal') {
	// 		$this->session->set_flashdata('message','Inputan tidak boleh ada yang kosong!');
	// 		redirect('auth/register');
	// 	}else{
	// 		$this->session->set_flashdata('message', 'Register Error!');
	// 		redirect('auth/register');
	// 	}
	// }

	// public function generatekunci($newId) {
	// 	$randomstring['newKey'] = '';
	// 	$randomstring['newId'] = $newId;
	// 	$this->load->view('auth/generatekunci', $randomstring);
	// }

	
    // public function generateRandomString($length = 5)
    // {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $charactersLength = strlen($characters);
    //     $randomString['newKey'] = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $randomString['newKey'] .= $characters[rand(0, $charactersLength - 1)];
    //     }
    //     $data = [
    //         'user_id' => $this->input->post('user_id'),
    //         'key' => $randomString['newKey']
    //     ];

    //     $simpanKunci = $this->Auth_model->simpanKunci($data);
    //     $randomString['newKey'] = $this->input->post('user_id');

    //     $this->load->view('auth/generatekunci', $newKey);
        
    // }
}