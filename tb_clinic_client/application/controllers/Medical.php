<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Medical_model');
      $this->load->library('form_validation');
      $this->load->model('Registry_model');
      $this->load->model('Action_model');
      $this->load->model('Medicine_model');
   }

   public function index()
   {
      $data['title'] = "List Data Rekam Medis";

      $check = $this->Medical_model->getAll();
      $data['data_medical'] = $this->Medical_model->getAll();

      if(isset($check['error'])){
         $data['data_medical'] = $this->Medical_model->getAll();
      } else{
         $data['data_medical'] = $this->Medical_model->getAll()['data'];
      }

      if(isset($check['error'])){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medical/gagal', $data);
      $this->load->view('templates/footer');
      }
      else {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medical/index', $data);
      $this->load->view('templates/footer');
      }
      
   }

   public function detail($medical_id)
   {
      $data['title'] = "Detail Data Rekam Medis";

      $data['data_medical'] = $this->Medical_model->getById($medical_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medical/detail', $data);
      $this->load->view('templates/footer');
   }

   public function add()
   {
      $data['title'] = "Tambah Data Rekam Medis";

      $data['data_registry'] = $this->Registry_model->getAll();
      $data['data_action'] = $this->Action_model->getAll();
      $data['data_medicine'] = $this->Medicine_model->getAll();


      $this->form_validation->set_rules('medical_date', 'Medical Date', 'trim|required');
      $this->form_validation->set_rules('medical_diagnose', 'Medical Diagnose', 'trim|required');
      $this->form_validation->set_rules('medical_temperature', 'Medical Temperature', 'trim|required');
      $this->form_validation->set_rules('medical_blood_pressure', 'Medical Blood Pressure', 'trim|required');
      $this->form_validation->set_rules('medical_price', 'Medical Price', 'trim|required');
      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('action_id', 'Action ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medical/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "registry_id" => $this->input->post('registry_id'),
            "medical_date" => $this->input->post('medical_date'),
            "medical_diagnose" => $this->input->post('medical_diagnose'),
            "medical_temperature" => $this->input->post('medical_temperature'),
            "medical_blood_pressure" => $this->input->post('medical_blood_pressure'),
            "medical_price" => $this->input->post('medical_price'),
            "medical_total" => $this->input->post('medical_total'),
            "action_id" => $this->input->post('action_id'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Medical_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('medical');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('medical');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('medical');
         }
      }
   }

   public function edit($medical_id)
   {
      $data['title'] = "Update Data Rekam Medis";

      $data['data_medical'] = $this->Medical_model->getById($medical_id);
      $data['data_registry'] = $this->Registry_model->getAll();
      $data['data_action'] = $this->Action_model->getAll();
      $data['data_medicine'] = $this->Medicine_model->getAll();


      $this->form_validation->set_rules('medical_date', 'Medical Date', 'trim|required');
      $this->form_validation->set_rules('medical_diagnose', 'Medical Diagnose', 'trim|required');
      $this->form_validation->set_rules('medical_temperature', 'Medical Temperature', 'trim|required');
      $this->form_validation->set_rules('medical_blood_pressure', 'Medical Blood Pressure', 'trim|required');
      $this->form_validation->set_rules('medical_price', 'Medical Price', 'trim|required');
      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('action_id', 'Action ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medical/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "medical_id" => $this->input->post('medical_id'),
            "registry_id" => $this->input->post('registry_id'),
            "medical_date" => $this->input->post('medical_date'),
            "medical_diagnose" => $this->input->post('medical_diagnose'),
            "medical_temperature" => $this->input->post('medical_temperature'),
            "medical_blood_pressure" => $this->input->post('medical_blood_pressure'),
            "medical_price" => $this->input->post('medical_price'),
            "action_id" => $this->input->post('action_id'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Medical_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('medical');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('medical');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('medical');
         }
      }
   }

   public function delete($medical_id)
   {
      $update = $this->Medical_model->delete($medical_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('medical');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('medical');
      }
   }
}
