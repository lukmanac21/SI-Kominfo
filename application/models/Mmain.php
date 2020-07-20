<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmain extends CI_MODEL{
    function check_login($table,$where){
        return $this->db->get_where($table,$where);
    }
    function show_data_barang_excel(){
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kegiatan','tbl_barang.id_kegiatan = tbl_kegiatan.id_kegiatan');
        $this->db->join('tbl_jenis','tbl_barang.id_jenis = tbl_jenis.id_jenis');
        $this->db->join('tbl_satuan','tbl_barang.id_satuan = tbl_satuan.id_satuan');
        $this->db->order_by('tbl_jenis.nama_jenis ASC, tbl_barang.nama_barang ASC');
        $query = $this->db->get();
        return $query->result();
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
    function show_all_data_order_by($table,$field){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($field);
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
        $this->db->from('tbl_sub_menu');
        $this->db->join('tbl_user_access', 'tbl_sub_menu.id_sub_menu = tbl_user_access.id_sub_menu');
        $this->db->join('tbl_role', 'tbl_user_access.id_role = tbl_role.id_role');
        $this->db->where('tbl_role.id_role =',$id_role);
        $query = $this->db->get();
        return $query->result();
    }
    function show_menu_selected($role_id){
        $this->db->select('tbl_menu.id_menu, tbl_menu.nama_menu, tbl_sub_menu.nama_sub_menu');
        $this->db->from('tbl_user_access');
        $this->db->join('tbl_sub_menu','tbl_user_access.id_sub_menu = tbl_sub_menu.id_sub_menu');
        $this->db->join('tbl_menu','tbl_menu.id_menu = tbl_sub_menu.id_menu');
        $this->db->where('tbl_user_access.id_role =',$role_id );
        $this->db->group_by('tbl_menu.id_menu');
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
    function show_data_pencairan($id_pencairan){
        $this->db->select('*');
        $this->db->from('tbl_detailpencairan');
        $this->db->join('tbl_rekening','tbl_detailpencairan.id_rekening = tbl_rekening.id_rekening');
        $this->db->join('tbl_pencairandana','tbl_detailpencairan.id_pencairan = tbl_pencairandana.id_pencairan');
        $this->db->where('tbl_detailpencairan.id_pencairan =',$id_pencairan);
        $this->db->order_by('tbl_rekening.kode_rekening ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function show_data_pencairan_header($id_pencairan){
        $this->db->select('*');
        $this->db->from('tbl_pencairandana');
        $this->db->where('tbl_pencairandana.id_pencairan =',$id_pencairan);
        $query = $this->db->get();
        return $query->result();
    }

}