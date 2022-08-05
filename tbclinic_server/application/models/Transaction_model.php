<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    private $_table_transaction = 'transaction';

    //fungsi untuk mendapatkan data
    public function getDataTransaction($transaction_id)
    {
        $this->db->from($this->_table_transaction);
        if ($transaction_id) {
            $this->db->where('transaction_id', $transaction_id);
        }
        //medical ka transaction
        $this->db->join('medical_record','medical_record.medical_id = transaction.medical_id');
        
        $this->db->select('transaction_id, transaction_date, transaction_total, 
        medical_record.medical_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertTransaction($data)
    {
        $this->db->insert($this->_table_transaction, [
            'transaction_id' => '',
            'transaction_date' => $data['transaction_date'],
            'transaction_total' => $data['transaction_total'],
            'medical_id' => $data['medical_id']
        ]);

        $idNewInsert = $this->db->insert_id();
        
        $this->db->from('transaction');
        $this->db->where('transaction.transaction_id', $idNewInsert);
        $this->db->select('transaction.transaction_total');
        $resepTotal = $this->db->get()->row();

        $this->db->from('medical_record');
        $this->db->where('medical_record.medical_id', $data['medical_id']);
        $this->db->select('medical_record.medical_total as harga_medis');
        $medisHarga = $this->db->get()->row();

      
        
        $sumTotal = intval($medisHarga->harga_medis);

        $this->db->update('transaction', [
            'transaction_total' => $sumTotal
        ], ['transaction_id' => $idNewInsert]);

        return 1;
    }

    //fungsi untuk mengubah data
    public function updateTransaction($data, $transaction_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_transaction, $data, ['transaction_id' => $transaction_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteTransaction($transaction_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_transaction, ['transaction_id' => $transaction_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
