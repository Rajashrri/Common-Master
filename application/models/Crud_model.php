<?php

class Crud_model extends CI_Model {

    function make_query($table,$select_column,$order_column) {
        $this->db->select($select_column);
        $this->db->from($table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like($select_column[1], $_POST["search"]["value"]);
            $this->db->or_like($select_column[2], $_POST["search"]["value"]);
           //  $this->db->or_like($select_column[3], $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'ASC');
        }
    }

    function make_datatables($table,$select_column,$order_column) {
        $this->make_query($table,$select_column,$order_column);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data($table,$select_column,$order_column) {
        $this->make_query($table,$select_column,$order_column);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data($table) {
        $this->db->select("*");
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function make_query1($table,$select_column,$order_column) {
        $this->db->select($select_column);
        $this->db->where('role','Sub Admin');
        $this->db->from($table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like($select_column[1], $_POST["search"]["value"]);
            $this->db->or_like($select_column[2], $_POST["search"]["value"]);
           //  $this->db->or_like($select_column[3], $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'ASC');
        }
    }

    function make_datatables1($table,$select_column,$order_column) {
        $this->make_query1($table,$select_column,$order_column);
         $this->db->where('role','Sub Admin');
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data1($table,$select_column,$order_column) {
        $this->make_query1($table,$select_column,$order_column);
        $this->db->where('role','Sub Admin');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data1($table) {
        $this->db->select("*");
        $this->db->where('role','Sub Admin');
        $this->db->from($table);
        return $this->db->count_all_results();
    }

}
?>