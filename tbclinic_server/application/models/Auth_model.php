<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $_table_users = 'users';

    public function login($username, $password)
    {
        $this->db->from($this->_table_users);

        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->join('keys','keys.user_id = users.user_id');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function register($data)
    {
        $this->db->insert($this->_table_users, [
            'user_id' => '',
            'username' => $data['username'],
            'password' => $data['password'],
            'no_hp' =>$data['no_hp'],
        ]);
        $query = $this->db->insert_id();
        return $query;
    }

    public function SimpanKunci($data){
        $this->db->insert('keys', [
            'user_id' => $data['user_id'],
            'key' => $data['key']
        ]);

        return $this->db->affected_rows();
    }

/*
    //fungsi untuk mendapatkan data 
    public function getDataUser($user_id)
    {
        //Menggunakan query builder
        if ($user_id) {
            $this->db->from($this->_table_users);
            $this->db->where('user_id', $user_id);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    public function getDataUserName($username)
    {
        //Menggunakan query builder
        if ($username) {
            $this->db->from($this->_table_users);
            $this->db->where('username', $username);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    public function cekUsername($username)
    {
        if ($username) {
            $this->db->from($this->_table_users);
            $this->db->where('username', $username);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }
    public function cekNoHP($nohp)
    {
        if ($nohp) {
            $this->db->from($this->_table_users);
            $this->db->where('no_hp', $nohp);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_users);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertUser($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_users, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    public function loginYa($username, $password)
    {
        return $this->db->query("SELECT user_id FROM users where username = '$username' AND password = '$password'");
        // $this->db->from('user');
        // $this->db->where('username', $username);
        // $this->db->where('password', $password);
        // $this->db->limit(1);
        // $query =  $this->db->get()->row_array();
        // return $query;
    } */
}
