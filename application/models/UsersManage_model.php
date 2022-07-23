<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UsersManage_model extends CI_Model { 
        public $title;
        public $content;
        public $date;

        public function getUserInfo()
        {
            $this->db->select("u.su_id id, u.username, u.firstname, u.lastname, u.gender, u.email, u.enable, u.last_access, u.sug_id groupid, g.name as usergroup");
            $this->db->from('sys_users u'); 
            $this->db->join('sys_user_groups g', 'u.sug_id = g.sug_id');
            $this->db->where('u.del_flag', 0);
            $query = $this->db->get();
            return $query->result();
        }
        public function update_user_acitve($id, $status){
            $dateTime = date('Y-m-d H:i:s'); 
            $this->db->set('enable', $status, FALSE);
            $this->db->set('date_update', "'{$dateTime}'", FALSE); 
            $this->db->where('sug_id', $id);
            $query = $this->db->update('sys_users');
            return $query; 
        }
        public function update_user_delete($id, $userId){
            $dateTime = date('Y-m-d H:i:s'); 
            $this->db->set('del_flag', 1, FALSE);
            $this->db->set('del_by', $userId, FALSE);
            $this->db->set('date_delete', "'{$dateTime}'", FALSE); 
            $this->db->where('su_id', $id);
            $query = $this->db->update('sys_users');
            return $query; 
        }
        public function update_user_data($id, $val){
            $dateTime = date('Y-m-d H:i:s'); 
            $this->db->set('firstname', "'{$val["firstName"]}'", FALSE);
            $this->db->set('lastname', "'{$val["lastName"]}'", FALSE);
            $this->db->set('email', "'{$val["email"]}'", FALSE);
            $this->db->set('gender', "'{$val["gender"]}'", FALSE); 
            $this->db->set('date_update', "'{$dateTime}'", FALSE); 
            $this->db->where('su_id', $id);
            $query = $this->db->update('sys_users');
            return $query; 
        }
    }
?>