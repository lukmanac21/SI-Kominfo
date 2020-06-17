<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmain extends CI_MODEL{
    function check_login($table,$where){
        return $this->db->get_where($table,$where);
    }
    function load_data_profile($id){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('tbl_user.id_user =',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function getLogindata($table,$where){
        $query = $this->db->get_where($table,$where);
		return $query->row_array();
    }
    function show_data_list($table,$limit,$start){
        $query = $this->db->get($table,$limit,$start);
        return $query->result();
    }
    function show_all_data($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_where_list($table,$where,$limit,$start){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }   
    function show_all_data_where($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_join($table,$tablejoin,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($tablejoin, $where);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_join_list($table,$tablejoin,$where,$limit,$start){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($tablejoin, $where);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_join_where($table,$tablejoin,$wherejoin,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($tablejoin, $wherejoin);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_join_two_table($table,$tablejoin,$tablejoin1,$wherejoin,$wherejoin1,$where,$limit,$start){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($tablejoin, $wherejoin);
        $this->db->join($tablejoin1, $wherejoin1);
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    function show_all_data_join_access($id_role){
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_user_access', 'tbl_menu.id_menu = tbl_user_access.id_menu');
        $this->db->join('tbl_role', 'tbl_user_access.id_role = tbl_role.id_role');
        $this->db->where('tbl_role.id_role =',$id_role);
        $query = $this->db->get();
        return $query->result();
    }
    function show_menu_selected($role_id){
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->join('tbl_user_access','tbl_menu.id_menu = tbl_user_access.id_menu');
        $this->db->where('tbl_user_access.id_role = ' ,$role_id);
        $this->db->where('tbl_menu.is_active = 1');
        $this->db->order_by('tbl_menu.id_menu ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function save_data($data,$table){
        $this->db->insert($table,$data);
    }
    function delete_data($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function update_data($data,$where,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}