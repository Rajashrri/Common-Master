<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staticmodule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->index->activity_update();
         $this->login->is_logged_in();
    }


    public function index(){
       
        $this->index->activity_log('Add Staticpage Seo');
   
        $data['page_name'] = 'addstatic';
        $data['content_view'] = 'Staticpagemodule/add';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['pagename']= $this->common->list('pagename');
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }
    public function insert(){
        $this->form_validation->set_error_delimiters('', '');
        // $this->form_validation->set_rules('pagename[]', 'Pagename', 'trim|required');
        $this->form_validation->set_rules('pagename[]', 'Pagename', 'trim|required|is_unique[staticpageseo.pagename]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('metatitle', 'Meta title', 'trim|required');
        $this->form_validation->set_rules('metadesc', 'Meta desc', 'trim|required');
      
        $this->form_validation->set_rules('schemacode', 'Schema code', 'trim|required');
       
        if ($this->form_validation->run()) {
        $food_list = $this->input->post('pagename');
        foreach($food_list as $food) {
        $insert_data = array(
            'pagename' => $food,
            'metatitle' => $this->input->post('metatitle'),
            'metadesc' => $this->input->post('metadesc'),
          
            'schemacode' => $this->input->post('schemacode'),
            'altfeatured' => $this->input->post('ogtags'),
            
        );
        $this->db->insert('staticpageseo',$insert_data);
        $array= array(
            'success'=>'SEO Content added for the selected static pages',
        );
    }
    }else{
        $array = array(
            'error' => true,
            'pagename_error' => form_error('pagename[]'),
            'metatitle_error' => form_error('metatitle'),
            'metadesc_error' => form_error('metadesc'),
           
            'schemacode_error' => form_error('schemacode'),
        );
    }
       
   
    echo json_encode($array);
    }
    public function list(){
        $this->index->activity_log('Static Module List');

        $data['page_name'] = 'Staticpagelist';
        $data['plist'] = $this->common->list('staticpageseo');
        $data['content_view'] = 'Staticpagemodule/list';
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }
    
    public function delete(){
        $id = $this->input->post('id');
        $this->index->activity_log('Delete Static page seo');
        $this->common->delete_table('staticpageseo', $id);
        $array = array(
            'success' => 'SEO Content deleted successfully.'
        );
        echo json_encode($array);
    }
    public function edit($id) {
        if ($id == 'edit') {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('pagename[]', 'Pagename', 'trim|required');
            //$this->form_validation->set_rules('pagename[]', 'Pagename', 'trim|required|is_unique[staticpageseo.pagename]', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('metatitle', 'Meta title', 'trim|required');
            $this->form_validation->set_rules('metadesc', 'Meta desc', 'trim|required');
           
            $this->form_validation->set_rules('schemacode', 'Schema code', 'trim|required');

            if ($this->form_validation->run()) {


                $id = $this->input->post('id');

                $food_list = $this->input->post('pagename');
              
                $update_data = array(
                    'pagename' => $food_list,
                    'metatitle' => $this->input->post('metatitle'),
                    'metadesc' => $this->input->post('metadesc'),
                   
                    'schemacode' => $this->input->post('schemacode'),
                    'altfeatured' => $this->input->post('ogtags'),
                    
                );
                
                $this->common->update_table('staticpageseo', $update_data, $id);
                if($this->db->affected_rows()== 0){
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                  
                $array = array(
                    'success' => 'SEO Content updated successfully.'
                );
            }
            
               
            } else {
                $array = array(
                    'error' => true,
                    'pagename1_error' => form_error('pagename[]'),
                    'metatitle1_error' => form_error('metatitle'),
                    'metadesc1_error' => form_error('metadesc'),
                    'canonical1_error' => form_error('canonical'),
                    'schemacode1_error' => form_error('schemacode'),
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Staticpagelist';
            $this->index->activity_log('Edit staticpageseo');
            $data['edit_details'] = $this->common->view('staticpageseo', $id);
            $data['pagename']= $this->common->list('pagename');
            $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $data['content_view'] = 'Staticpagemodule/edit';
            $this->load->view('admin_template', $data);
        }
    }
    public function websitesetting(){
          $data['page_name'] = 'Website Settings';
          
            $data['edit_details'] = $this->common->list1('websetfront', 'id',1);
            $data['edit_details1'] = $this->common->list('frontemail');
        $data['edit_details2'] = $this->common->list('frontcontact');
            $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $data['content_view'] = 'websiteset';
            $this->load->view('admin_template', $data);
    }
    public function insertsettings(){
     
        //  $this->index->activity_log('Update Profile');

        $id = '1';
        $update_data['insta'] = $this->input->post('insta');
        $update_data['fb'] = $this->input->post('fb');
        $update_data['wp'] = $this->input->post('wp');
        $update_data['link'] = $this->input->post('link');
        $update_data['yt'] = $this->input->post('yt');
        $update_data['twitter'] = $this->input->post('twitter');
        
        $update_data['pcolor'] = $this->input->post('pcolor');
        $update_data['tcolor'] = $this->input->post('tcolor');
        $update_data['paracolor'] = $this->input->post('paracolor');
        $update_data['scolor'] = $this->input->post('scolor');
        $update_data['bscolor'] = $this->input->post('bscolor');
        $update_data['bpcolor'] = $this->input->post('bpcolor');
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


        $this->pro->update_table('websetfront', $update_data, $id);
        
        $this->db->truncate('frontemail'); 
        
        if(!empty($this->input->post('package_name[]'))){
         for ($i = 0; $i < count($this->input->post('package_name[]')); $i++) {
            $data = array(
                'email' => $this->input->post('package_name')[$i],
               
            );

            $this->db->insert('frontemail', $data);
        
         }
         
        $this->db->truncate('frontcontact');
        
          if(!empty($this->input->post('package_name1[]'))){
         for ($i = 0; $i < count($this->input->post('package_name1[]')); $i++) {
            $data = array(
                'contact' => $this->input->post('package_name1')[$i],
               
            );
            $this->db->insert('frontcontact', $data);
        }
          }
        if($this->db->affected_rows() == 0){
        $this->session->set_flashdata('warning', 'You have made no changes.');
        redirect('website-set');
        }else{
              $this->session->set_flashdata('success', 'Website Settings updated successfully');
              redirect('website-set');
        }
        }
         
    }
      public function deleteem() {
        $rowId = $this->input->post('id');

        $this->common->delete_table1('frontemail', 'id', $rowId);
        $array= array(
            'success'=>'Email id Deleted Successfully',
        );
        echo json_encode($array);
    }

    public function deletecontact() {
        $rowId = $this->input->post('id');

        $this->common->delete_table1('frontcontact', 'id', $rowId);
        $array= array(
            'success'=>'Contact Number Deleted Successfully',
        );
          echo json_encode($array);
    }
    
    public function list_page(){
          $data['page_name'] = 'Page_List';
        $this->index->activity_log('Page_list Add');
        $data['list'] = $this->common->list('pagename');
        $data['user_details'] = $this->pro->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Staticpagemodule/pagelist';
        $this->load->view('admin_template', $data);
    }
     public function add_page() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('pagename', 'Page Name', 'trim|required|is_unique[pagename.pagename]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'pagename' => $this->input->post('pagename'),
              
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('pagename', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Page Name added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'pagename_error' => form_error('pagename')
            );
        }
        echo json_encode($array);
    }

    public function fetch_page() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'pagename');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no( $order_no, 'pagename', 'pagename',$id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Page Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_page() {
        $id = $this->input->post('id');
        $this->index->activity_log('Edit Page');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('pagename', 'Page Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'pagename' => $this->input->post('pagename'),
                
            );
            $this->common->update_table('pagename', $update_data, $id);
            if($this->db->affected_rows() == 0){

                $array = array(
                    'warning' => 'You have made no changes.'
                );
            }else{
                $update_data['createdDate'] = DATE;
                $this->common->update_table('pagename', $update_data, $id);
            $array = array(
                'success' => 'Page Name updated successfully.'
            );
        }
        } else {
            $array = array(
                'error' => true,
                'pagename1_error' => form_error('pagename')
            );
        }
        echo json_encode($array);
    }

    public function delete_page() {

        $this->index->activity_log('Static Page Delete');
        $id = $this->input->post('id');

        $this->common->delete_table('pagename', $id);
        $this->common->delete_table1('staticpageseo', 'pagename', $id);

        $array = array(
            'success' => 'Page Name deleted successfully.'
        );
        echo json_encode($array);
    }
}