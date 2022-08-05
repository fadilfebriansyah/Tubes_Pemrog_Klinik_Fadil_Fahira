<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_model extends CI_Model
{
    private $_table_medical = 'medical_record';

    //fungsi untuk mendapatkan data 
    public function getDataMedical
($medical_id)
    {
        $this->db->from($this->_table_medical);
        if ($medical_id) {
            $this->db->where('medical_record.medical_id', $medical_id);
        }
         //action ka medical
         $this->db->join('action', 'action.action_id = medical_record.action_id');
        //medical ka registry
        $this->db->join('registry', 'registry.registry_id = medical_record.registry_id');
         //patience ka registry
         $this->db->join('patience', 'patience.patience_id = registry.patience_id');
         //doctor ka registry
         $this->db->join('doctor', 'doctor.doctor_id = registry.doctor_id');
         //recipe ka medical
        //  $this->db->join('recipe', 'medical_record.medical_id = recipe.medical_id');

        $this->db->select('medical_record.medical_id, medical_date, medical_diagnose, medical_temperature,
         medical_blood_pressure,medical_price, medical_total, action.action_id, action.action_name,action.action_price,
         registry.registry_id,patience.patience_name');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertMedical($data)
    {
        $this->db->insert($this->_table_medical, [
            'medical_id' => '',
            'medical_date' => $data['medical_date'],
            'medical_diagnose' => $data['medical_diagnose'],
            'medical_temperature' => $data['medical_temperature'],
            'medical_blood_pressure' => $data['medical_blood_pressure'],
            'medical_price' => $data['medical_price'],
            'medical_total' => $data['medical_total'],
            'registry_id' => $data['registry_id'],
            'action_id' => $data['action_id']
        ]);

        $idNewInsert = $this->db->insert_id();
        
        $this->db->from('medical_record');
        $this->db->where('medical_record.medical_id', $idNewInsert);
        $this->db->select('medical_record.medical_total , medical_record.medical_price as harga_medis');
        $medisHarga = $this->db->get()->row();

        $this->db->from('action');
        $this->db->where('action.action_id', $data['action_id']);
        $this->db->select('action.action_price as harga_tindakan');
        $aksiHarga = $this->db->get()->row();
        
        $this->db->from('registry');
        $this->db->where('registry.registry_id', $data['registry_id']);
        $this->db->select('registry.registry_price as harga_daftar');
        $daftarHarga = $this->db->get()->row();

        $sumTotal = intval($medisHarga->harga_medis) + intval($aksiHarga->harga_tindakan) 
        + intval($daftarHarga->harga_daftar);

        $this->db->update('medical_record', [
            'medical_total' => $sumTotal
        ], ['medical_id' => $idNewInsert]);

        return 1;
    }

    //fungsi untuk mengubah data
//     public function updateMedical
// ($data, $medical_id)
//     {
//         //Menggunakan Query Builder
//         $this->db->update($this->_table_medical, $data, [
//             'medical_id' => $medical_id,
//             'medical_price' => $data['medical_price'],
//             'action_id' => $data['action_id']
//         ]);
//         $this->db->from('medical_record');
//         $this->db->where('medical_record.medical_id');
//         $this->db->select('medical_record.medical_total , medical_record.medical_price as harga_medis');
//         $medisHarga = $this->db->get()->row();

//         $this->db->from('action');
//         $this->db->where('action.action_id', $data['action_id']);
//         $this->db->select('action.action_price as harga_tindakan');
//         $aksiHarga = $this->db->get()->row();
        
//         $sumTotal = intval($medisHarga->harga_medis) + intval($aksiHarga->harga_tindakan);

//         $this->db->update('medical_record', [
//             'medical_total' => $sumTotal
//         ], ['medical_id' => $medical_id]);


//         return 1;
//         // return $query;
//     }

    //fungsi untuk menghapus data
    public function deleteMedical
($medical_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_medical, ['medical_id' => $medical_id]);
        return $this->db->affected_rows();
        // return $query;
    }

}
