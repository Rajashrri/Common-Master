<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
    }

    public function setlogin() {
      
        $this->db->select('*');
        $this->db->where('id', '1');
        $query = $this->db->get('user_login');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->flag == '1') {
                redirect('master');
            } else {
                $data['page_name'] = 'Admin Panel Setup';
                $data['user_detail'] = $this->common->view1();
                $this->load->view('Setup', $data);
            }
        }
       
    }

    function chklogin() {

        if ($_SESSION['token'] == $this->input->post('token')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $array = array(
                    'error' => true,
                    'msg' => 'Invalid Username or Password.'
                );
            } else {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'contact' => $this->input->post('contact'),
                    'name' => $this->input->post('username'),
                    'compemail' => $this->input->post('compname'),
                );
                $this->common->update_table1('user_login', $data, 'id', '1');
                $array = array(
                    'error' => false,
                    'msg' => 'Admin Login Setup Completed Successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'msg' => 'Invalid Username or Password.'
            );
        }
        echo json_encode($array);
    }

    public function webset() {
        $id = '1';
        $update_data['pcolor'] = $this->input->post('pcolor');
        $update_data['scolor'] = $this->input->post('scolor');
        $update_data['paracolor'] = $this->input->post('paracolor');
        $update_data['tcolor'] = $this->input->post('tcolor');
        $update_data['bpcolor'] = $this->input->post('bpcolor');
        $update_data['bscolor'] = $this->input->post('bscolor');

        $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");

        if (isset($_FILES['logo']) && $_FILES['logo']['name'] != "") {
            $extId = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["logo"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['logo']['size'] >= $maxsize) || ($_FILES["logo"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
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

        if ($this->db->affected_rows() == 0) {
            $array = array(
                'error' => 'You have made no changes.'
            );
        } else {
            $array = array(
                'success' => 'Admin Panel Settings Updated successfully.'
            );
        }
        echo json_encode($array);
    }

    public function websitesetting() {
        $id = '1';
        $update_data['insta'] = $this->input->post('insta');
        $update_data['fb'] = $this->input->post('fb');
        $update_data['wp'] = $this->input->post('wp');
        $update_data['twitter'] = $this->input->post('twitter');
        $update_data['link'] = $this->input->post('link');
        $update_data['yt'] = $this->input->post('yt');
        $this->pro->update_table('user_login', $update_data, $id);
        if ($this->db->affected_rows() == 0) {
            $array = array(
                'error' => 'You have made no changes.'
            );
        } else {
            $array = array(
                'success' => 'Social Links Setting Updated successfully.'
            );
        }
        echo json_encode($array);
    }

    public function privilegesetup() {
        if ($this->input->post('product') == 1) {
            $data['subcatp'] = 1;
            $data['addscp'] = 1;
            $data['editscp'] = 1;
            $data['delscp'] = 1;
            $data['addp'] = 1;
            $data['editp'] = 1;
            $data['delp'] = 1;
            $data['listp'] = 1;
        } else {
            $data['subcatp'] = 0;
            $data['addscp'] = 0;
            $data['editscp'] = 0;
            $data['delscp'] = 0;
            $data['addp'] = 0;
            $data['editp'] = 0;
            $data['delp'] = 0;
            $data['listp'] = 0;
        }

        if ($this->input->post('project') == 1) {

            $data['catproject'] = 1;
            $data['addcproject'] = 1;
            $data['editcproject'] = 1;
            $data['delcproject'] = 1;
            $data['addproject'] = 1;
            $data['editproject'] = 1;
            $data['delproject'] = 1;
            $data['listproject'] = 1;
        } else {
            $data['catproject'] = 0;
            $data['addcproject'] = 0;
            $data['editcproject'] = 0;
            $data['delcproject'] = 0;
            $data['addproject'] = 0;
            $data['editproject'] = 0;
            $data['delproject'] = 0;
            $data['listproject'] = 0;
        }

        if ($this->input->post('blog') == 1) {

            $data['catb'] = 1;
            $data['addcb'] = 1;
            $data['editcb'] = 1;
            $data['delcb'] = 1;
            $data['addb'] = 1;
            $data['editb'] = 1;
            $data['delb'] = 1;
            $data['listb'] = 1;
        } else {
            $data['catb'] = 0;
            $data['addcb'] = 0;
            $data['editcb'] = 0;
            $data['delcb'] = 0;
            $data['addb'] = 0;
            $data['editb'] = 0;
            $data['delb'] = 0;
            $data['listb'] = 0;
        }

        if ($this->input->post('services') == 1) {

            $data['subcats'] = 1;
            $data['addscs'] = 1;
            $data['editscs'] = 1;
            $data['delscs'] = 1;
            $data['adds'] = 1;
            $data['edits'] = 1;
            $data['dels'] = 1;
            $data['lists'] = 1;
        } else {
            $data['subcats'] = 0;
            $data['addscs'] = 0;
            $data['editscs'] = 0;
            $data['delscs'] = 0;
            $data['adds'] = 0;
            $data['edits'] = 0;
            $data['dels'] = 0;
            $data['lists'] = 0;
        }
        if ($this->input->post('faq') == 1) {

            $data['catf'] = 1;
            $data['addcf'] = 1;
            $data['editcf'] = 1;
            $data['delcf'] = 1;
            $data['addf'] = 1;
            $data['editf'] = 1;
            $data['delf'] = 1;
            $data['listf'] = 1;
        } else {
            $data['catf'] = 0;
            $data['addcf'] = 0;
            $data['editcf'] = 0;
            $data['delcf'] = 0;
            $data['addf'] = 0;
            $data['editf'] = 0;
            $data['delf'] = 0;
            $data['listf'] = 0;
        }
        if ($this->input->post('gallery') == 1) {

            $data['catg'] = 1;
            $data['addcg'] = 1;
            $data['editcg'] = 1;
            $data['delcg'] = 1;
            $data['addg'] = 1;
            $data['editg'] = 1;
            $data['delg'] = 1;
            $data['listg'] = 1;
        } else {
            $data['catg'] = 0;
            $data['addcg'] = 0;
            $data['editcg'] = 0;
            $data['delcg'] = 0;
            $data['addg'] = 0;
            $data['editg'] = 0;
            $data['delg'] = 0;
            $data['listg'] = 0;
        }
        if ($this->input->post('event') == 1) {

            $data['cate'] = 1;
            $data['addce'] = 1;
            $data['editce'] = 1;
            $data['delce'] = 1;
            $data['adde'] = 1;
            $data['edite'] = 1;
            $data['dele'] = 1;
            $data['liste'] = 1;
        } else {
            $data['cate'] = 0;
            $data['addce'] = 0;
            $data['editce'] = 0;
            $data['delce'] = 0;
            $data['adde'] = 0;
            $data['edite'] = 0;
            $data['dele'] = 0;
            $data['liste'] = 0;
        }
        if ($this->input->post('video') == 1) {

            $data['catv'] = 1;
            $data['addcv'] = 1;
            $data['editcv'] = 1;
            $data['delcv'] = 1;
            $data['addv'] = 1;
            $data['editv'] = 1;
            $data['delv'] = 1;
            $data['listv'] = 1;
        } else {
            $data['catv'] = 0;
            $data['addcv'] = 0;
            $data['editcv'] = 0;
            $data['delcv'] = 0;
            $data['addv'] = 0;
            $data['editv'] = 0;
            $data['delv'] = 0;
            $data['listv'] = 0;
        }
        if ($this->input->post('job') == 1) {

            $data['catj'] = 1;
            $data['editcj'] = 1;
            $data['addcj'] = 1;
            $data['delcj'] = 1;
            $data['addj'] = 1;
            $data['editj'] = 1;
            $data['delj'] = 1;
            $data['listj'] = 1;
        } else {
            $data['catj'] = 0;
            $data['editcj'] = 0;
            $data['addcj'] = 0;
            $data['delcj'] = 0;
            $data['addj'] = 0;
            $data['editj'] = 0;
            $data['delj'] = 0;
            $data['listj'] = 0;
        }
        if ($this->input->post('teams') == 1) {

            $data['addt'] = 1;
            $data['editt'] = 1;
            $data['delt'] = 1;
            $data['listt'] = 1;
        } else {
            $data['addt'] = 0;
            $data['editt'] = 0;
            $data['delt'] = 0;
            $data['listt'] = 0;
        }
        if ($this->input->post('pdf') == 1) {

            $data['addpd'] = 1;
            $data['editpd'] = 1;
            $data['delpd'] = 1;
            $data['listpd'] = 1;
        } else {
            $data['addpd'] = 0;
            $data['editpd'] = 0;
            $data['delpd'] = 0;
            $data['listpd'] = 0;
        }
        if ($this->input->post('news') == 1) {

            $data['catn'] = 1;
            $data['addcn'] = 1;
            $data['editcn'] = 1;
            $data['delcn'] = 1;
            $data['addn'] = 1;
            $data['editn'] = 1;
            $data['deln'] = 1;
            $data['listn'] = 1;
        } else {
            $data['catn'] = 0;
            $data['addcn'] = 0;
            $data['editcn'] = 0;
            $data['delcn'] = 0;
            $data['addn'] = 0;
            $data['editn'] = 0;
            $data['deln'] = 0;
            $data['listn'] = 0;
        }
        if ($this->input->post('testimonials') == 1) {

            $data['addtest'] = 1;
            $data['edittest'] = 1;
            $data['deltest'] = 1;
            $data['listest'] = 1;
        } else {
            $data['addtest'] = 0;
            $data['edittest'] = 0;
            $data['deltest'] = 0;
            $data['listest'] = 0;
        }
        if ($this->input->post('clientele') == 1) {

            $data['addct'] = 1;
            $data['editct'] = 1;
            $data['delct'] = 1;
            $data['listct'] = 1;
        } else {
            $data['addct'] = 0;
            $data['editct'] = 0;
            $data['delct'] = 0;
            $data['listct'] = 0;
        }


        if ($this->input->post('link') == 1) {

            $data['link'] = 1;
            $data['addlink'] = 1;
            $data['editlink'] = 1;
            $data['dellink'] = 1;
        } else {
            $data['link'] = 0;
            $data['addlink'] = 0;
            $data['editlink'] = 0;
            $data['dellink'] = 0;
        }

        $data['user_id'] = 'admin';
        $data['addusers'] = '1';
        $data['users'] = '1';
        $data['listusers'] = '1';
        $data['slider'] = $this->input->post('slider');
        $data['loginhis'] = $this->input->post('loginhis');
        $data['activitylog'] = $this->input->post('activitylog');

        $r = $this->db->insert('privilege', $data);

        $dd['flag'] = '1';
        $this->common->update_table1('user_login', $dd, 'id', '1');
        if ($r) {
            $array = array(
                'success' => 'Admin Modules Setup Added Successfully',
            );
        }
        echo json_encode($array);
    }
}
?>