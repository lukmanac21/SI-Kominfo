<?php
function get_access($id_role,$id_menu){
    $ci = get_instance();
    $result = $ci->db->get_where('tbl_user_access',['id_role' => $id_role, 'id_sub_menu' =>$id_menu]);
    
    if($result->num_rows() > 0){
        return "checked = 'checked'";
    }
}
function get_status($id_barang){
    $ci = get_instance();
    $status = "0";
    $ci->db->select('tbl_dinas.nama_dinas');
    $ci->db->from('tbl_peminjaman');
    $ci->db->join('tbl_dinas','tbl_peminjaman.id_user = tbl_dinas.id_dinas');
    $ci->db->where(['tbl_peminjaman.id_barang' => $id_barang,'tbl_peminjaman.status_peminjaman' => $status]);
    $result = $ci->db->get();
    
    //$row = mysqli_fetch_row($result);
    
    if($result->num_rows() == 1){
        $ret = $result->row(); 
        return $ret->nama_dinas;
    }
    else{
        return "Dinas Kominfo";
    }
}
?>