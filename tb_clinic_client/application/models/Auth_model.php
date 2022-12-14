<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Auth_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/auth',
            // You can set any number of default request options.
            'auth'  => ['ulbi', 'pemrograman3'],
        ]);
    }

    
    public function loginClient($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }

    public function registerClient($data)
    {
        $registerUri = $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/auth/register',
        ]);

        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }

    public function simpanKunci($data) {
        $simpanKunciUri = new Client([
            'base_uri' => 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/auth/simpankunci',
        ]);

        $response = $simpanKunciUri->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);

        return $result;
    }
}
