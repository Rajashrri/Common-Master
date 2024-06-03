<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Common_model', 'common');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function index() {
        $data['page_name'] = 'Dashboard';
        $data['content_view'] = 'dashboard';
        $data['user_details'] = $this->pro->list('user_login');
        $this->load->view('admin_template', $data);
    }

    public function profile() {
        $this->index->activity_log('Profile');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['page_name'] = 'Profile';
        $data['content_view'] = 'profile_page';
        $this->load->view('admin_template', $data);
    }

    public function upload() {
        if ($_FILES["upload"]['name'] == '') {
            $this->form_validation->set_rules('pic', 'pic ', 'trim|required');
        } else {
            if (isset($_FILES['upload']['name'])) {
                $file = $_FILES['upload']['tmp_name'];
                $file_name = $_FILES['upload']['name'];
                $file_name_array = explode(".", $file_name);
                $extension = end($file_name_array);
                $new_image_name = rand() . '.' . $extension;
                chmod('upload', 0777);
                $allowed_extension = array("jpg", "gif", "png");
                if (in_array($extension, $allowed_extension)) {
                    move_uploaded_file($file, './upload/' . $new_image_name);
                    $function_number = $_GET['CKEditorFuncNum'];
                    $url = base_url() . 'upload/' . $new_image_name;
                    $message = '';
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
                }
            }
        }
    }

    public function edit_profile() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', ' Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact Number', 'trim|numeric|required|max_length[10]|min_length[10]');
        if ($this->form_validation->run()) {
            $id = $this->session->userdata('user_id');
            $update_data['name'] = $this->input->post('name');
            $update_data['contact'] = $this->input->post('contact');
            $update_data['email'] = $this->input->post('email');
            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");
            if (isset($_FILES['pic']) && $_FILES['pic']['name'] != "") {
                $extId = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["pic"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['pic']['size'] >= $maxsize) || ($_FILES["pic"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['pic'];
                $path = './uploads/img/';
                $file_path_image = base_url() . 'uploads/img/';
                $image = $this->pro->upload_image($image_data, 1, $path);
                $update_data['pic'] = $image;
                $update_data['pic_url'] = $file_path_image . $image;

                $query = $this->common->un($id,'user_login');
                $row = $query->row();
                $img = $row->pic ;

                if(file_exists("uploads/img/".$img)){
                    unlink("uploads/img/".$img);
                }
            }
            $this->pro->update_table('user_login', $update_data, $id);
            $array = array(
                'success' => 'Profile Updated successfully.'
            );
            $email = $this->session->set_userdata('email', $update_data['email']);
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'email_error' => form_error('email'),
                'contact_error' => form_error('contact')
            );
        }
        echo json_encode($array);
    }

    public function settings() {
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->index->activity_log('Website settings');
        $data['page_name'] = 'Settings';
        $data['content_view'] = 'setting_page';
        $this->load->view('admin_template', $data);
    }

    public function edit_setting() {
        $id = $this->session->userdata('user_id');
        $update_data['insta'] = $this->input->post('insta');
        $update_data['fb'] = $this->input->post('fb');
        $update_data['wp'] = $this->input->post('wp');
        $update_data['link'] = $this->input->post('link');
        $update_data['yt'] = $this->input->post('yt');
        $update_data['twitter'] = $this->input->post('twitter');
        $update_data['metades'] = $this->input->post('metades');
        $update_data['metatitle'] = $this->input->post('metatitle');
        $update_data['pcolor'] = $this->input->post('pcolor');
        $update_data['tcolor'] = $this->input->post('tcolor');
        $update_data['paracolor'] = $this->input->post('paracolor');
        $update_data['scolor'] = $this->input->post('scolor');
        $update_data['bscolor'] = $this->input->post('bscolor');
        $update_data['bpcolor'] = $this->input->post('bpcolor');        
         $update_data['smtp_host'] = $this->input->post('smtp_host');
        $update_data['smtp_port'] = $this->input->post('smtp_port');
        $update_data['smtp_user'] = $this->input->post('smtp_user');
        $update_data['smtp_pass'] = $this->input->post('smtp_pass');
        $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");
        if (isset($_FILES['logo']) && $_FILES['logo']['name'] != "") {
            $extId = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            $max_width = 150; 
            $max_height = 65; 
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["logo"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['logo']['size'] >= $maxsize) || ($_FILES["logo"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }
            if (($_FILES['logo']['size'] >= $max_width) || ($_FILES["logo"]["size"] >= $max_height)) {
                $array = array(
                    'error' => 'Please refer to the image size Dimension above',
                );
            }
            $image_data = $_FILES['logo'];
            $path = './uploads/img/';
            $file_path_image = base_url() . 'uploads/img/';
            $image = $this->pro->upload_image($image_data, 1, $path);
            $update_data['logo'] = $image;
            $update_data['logo_url'] = $file_path_image . $image;
        }
        if (isset($_FILES['favicon']) && $_FILES['favicon']['name'] != "") {
            $extId = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["favicon"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['favicon']['size'] >= $maxsize) || ($_FILES["favicon"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }

            $image_data = $_FILES['favicon'];
            $path = './uploads/img/';
            $file_path_image = base_url() . 'uploads/img/';
            $image = $this->pro->upload_image($image_data, 2, $path);
            $update_data['favicon'] = $image;
            $update_data['fav_url'] = $file_path_image . $image;
        }


        $this->pro->update_table('user_login', $update_data, $id);
                if($this->db->affected_rows() == 0){
        $array = array(
            'error' => 'You have made no changes.'
        );   
        }else{
        $array = array(
            'success' => 'Website Settings updated successfully.'
        );
    }
        echo json_encode($array);
    }

}
?>