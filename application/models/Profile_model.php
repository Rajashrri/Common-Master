<?php
class Profile_model extends CI_Model {

    function __construct() {    
    }

    
    function list($tbl_name) {
        $this->db->select('*');
        $this->db->group_by('id');
        $this->db->where('status !=', '2');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function insert_table($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    function delete_table($tbl_name, $id) {
        $this->db->where('id', $id);
        $this->db->delete($tbl_name);
    }

    function update_table($tbl_name, $data, $id) {
        $this->db->where('id', $id);
        $this->db->update($tbl_name, $data);
        return $this->db->affected_rows();
    }

    function update_category_status($tbl_name, $data, $id) {
        $this->db->where('category_id', $id);
        $this->db->update($tbl_name, $data);
    }

    function fetch_data($id, $tbl_name) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from($tbl_name);
        return $this->db->get()->row();
    }

    function view($tbl_name, $id) {
        $this->db->select('*');
        $this->db->where('id', $id);

        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function image_upload($file_element_name, $filename, $file_path) {
        $newfilename = '';
        if ($filename != '') {
            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            for ($i = 0; $i < 6; $i++) {
                $newfilename = $characters[rand(6, $characters)];
            }
            $file_name = $filename;
            $file_ext = explode('.', $file_name);
            $file_ext = end($file_ext);

            $config['upload_path'] = $file_path;
            $config['file_name'] = $newfilename . $file_ext;
            $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($file_element_name)) {
                $this->upload->display_errors('', '');
                $assoc_arr = array(
                    'error' => true,
                    'msg' => $this->upload->display_errors()
                );
            } else {
                $data = array('upload_data' => $this->upload->data());
                $assoc_arr = array(
                    'error' => false,
                    'msg' => $data['upload_data']['file_name']
                );
            }
        } else {
            $assoc_arr = array(
                'error' => true,
                'msg' => 'file not select'
            );
        }
        return $assoc_arr;
    }

    public function upload_image($image_data, $num, $path1) {
        $image = md5(date("d-m-y:h:i s")) . "_" . $num;
        if (is_array($image_data)) {
            $file_name = pathinfo(@$image_data['name'], PATHINFO_FILENAME);
            $extension = pathinfo(@$image_data['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file(@$image_data['tmp_name'], $path1 . '' . $image . '.' . $extension)) {
                $image = $image . '.' . $extension;
            } else {
                $image = Null;
            }
        }
        return $image;
    }
}
?>