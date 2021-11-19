<?php

class Opac_model extends CI_Model{
    function get_kategori(){
        $query = $this->db->query("
            select * from tbl_kategori
        ");
        return $query;
    }

    function get_opac($judul, $subyek, $pengarang, $penerbit, $tahun_terbit){
        $query = $this->db->query("
            select a.*, b.*, c.* from tbl_buku a
            inner join tbl_kategori b 
            on a.id_kategori = b.id_kategori
            inner join tbl_rak c 
            on a.id_rak = c.id_rak
            where a.title like '%$judul%' and a.id_kategori like '%$subyek%' and a.pengarang like '%$pengarang%' and a.penerbit like '%$penerbit%' and a.thn_buku like '%$tahun_terbit%'
        ");
        return $query;
    }
}