<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
    public function register_get()
    {
        $username = $this->get('username');
        $data = $this->Auth_model->getDataUser($username);
        //jika variabel $data terdapat data didalamnya 
        if ($data) {
            $this->response(
                [
                    'data' => $data,
                    'status' => 'success',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
            //jika data tidak ada
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' => 'Data Tidak Ada',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_OK
            );
        }
    }

    public function login_post()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password'])) {

                $user_login = $this->Auth_model->loginYa($_POST['username'], $_POST['password']);
                $result['user_id'] = null;

                if ($user_login->num_rows() == true) {
                    $result['value'] = "berhasil";
                    $result['pesan'] = "berhasil login!";
                    $result['user_id'] = $user_login->row()->user_id;
                } else {
                    $result['value'] = "salah";
                    $result['pesan'] = "Username Atau Password Salah!";
                }
            } else {
                $result['value'] = "kosong";
                $result['pesan'] = "Ada Yang Kosong!";
            }
        } else {
            $result['value'] = "Invalid";
            $result['pesan'] = "Invalid Request Method!";
        }

        echo json_encode($result);
    }

    public function register_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'no_hp' => $this->post('no_hp')
        );

        $cek_data = '';
        if ($data['username'] != NULL) {
            $cek_data = $this->Auth_model->getDataUserName($this->post('username'));
        } elseif ($data['no_hp'] != NULL) {
            $cek_data = $this->Auth_model->getDataUserName($this->post('no_hp'));
        } elseif ($data['user_id'] != NULL) {
            $cek_data = $this->Auth_model->getDataUserName($this->post('user_id'));
        }

        //Jika semua data wajib diisi
        if (
            $data['username'] == NULL || $data['password'] == NULL || $data['no_hp'] == NULL
        ) {

            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data duplikat
        } else if ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data tersimpan
        } elseif ($this->Auth_model->insertUser($data) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
