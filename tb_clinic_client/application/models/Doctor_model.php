<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Doctor_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/Tubes_Pemrog_Klinik_Fadil_Fahira/tbclinic_server/doctor/dct',
            // You can set any number of default request options.
            // jika login authnya tidak sesuai dengan yang ada di file rest
            'auth'  => ['admin', '1234'],
            'http_errors' => false
        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'ulbi123'
            ],
            'http_errors' => false
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
        // return $result['data'];
    }

    public function getById($doctor_id)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'ulbi123',
                'doctor_id' => $doctor_id
                ]
        ]);

        $result = json_decode($response->getBody()->getContents(),TRUE);
        return $result['data'];
    }
    public function save($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }


    public function delete($doctor_id)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => 'ulbi123',
                'doctor_id' => $doctor_id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
