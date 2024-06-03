<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Index_model', 'index');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function index() {
        $data['page_name'] = 'News Category List';
        $this->index->activity_log('News Category List');
        $data['newscategory_list'] = $this->common->list('news_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'News/newscategory_list';
        $this->load->view('admin_template', $data);
    }
  

    public function edit_seqnewscat() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('news_category', $update_data, $id);

            $array = array(
                'success' => 'Sequence updated successfully.'
            );
        } else {
            $array = array(
                'error' => true,
                'seq_error' => form_error('seq_id')
            );
        }
        echo json_encode($array);
    }


    public function fetch_seqnews() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'news');
            echo json_encode($data);
        }
    }

    public function edit_seqnews() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('news', $update_data, $id);

            $array = array(
                'success' => 'Sequence updated successfully.'
            );
        } else {
            $array = array(
                'error' => true,
                'seq_error' => form_error('seq_id')
            );
        }
        echo json_encode($array);
    }
    //news category



    public function add_newscategory() {
        $this->index->activity_log('News Category Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'news category Name', 'trim|required|is_unique[news_category.category_name]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => $this->common->cleanStr($this->input->post('category_name')),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('news_category', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'News Category added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'categoryname_error' => form_error('category_name')
            );
        }
        echo json_encode($array);
    }

    public function fetch_newscategory() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'news_category');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'news_category', 'category_name', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_newscategory() {
        $this->index->activity_log('News Category Edit');
        $id = $this->input->post('id');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
            );
            $this->common->update_table('news_category', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('news_category', $update_data, $id);
                $array = array(
                    'success' => 'Newscategory updated successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'category_error' => form_error('category_name')
            );
        }
        echo json_encode($array);
    }

    public function delete_newscategory() {
        $this->index->activity_log('News Category Delete');

        $id = $this->input->post('id');

        $this->common->delete_table('news_category', $id);
        $this->common->delete_table1('news', 'category_id', $id);

        $array = array(
            'success' => 'Newscategory deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_newscategory() {
        $this->index->activity_log('News Category Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('news_category', $delete_data, $id);
        $this->common->update_table1('news', $delete_data, 'category_id', $id);
        $array = array(
            'success' => 'Newscategory status updated successfully.'
        );
        echo json_encode($array);
    }

    // News Functionality

    public function addnews() {
        $data['page_name'] = 'Add News';
        $this->index->activity_log('News Add');
        $data['newscategory_list'] = $this->common->list1('news_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'News/addnews';
        $this->load->view('admin_template', $data);
    }

    public function news_list() {
        $data['page_name'] = 'News List';
        $this->index->activity_log('News List');
        $data['news_list'] = $this->common->list('news');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'News/newslist';
        $this->load->view('admin_template', $data);
    }

    public function upload() {
        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload')) {
            echo json_encode(array('error' => $this->upload->display_errors()));
        } else {
            $upload_data = $this->upload->data();
            $url = base_url() . 'upload/' . $upload_data['file_name'];
            $message = '';
            $function_number = $this->input->get('CKEditorFuncNum');
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }

//ADD BLOG
    public function insert_news() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('briefintro', 'briefintro', 'trim|required');

        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'posted_by' => $this->input->post('posted_by'),
                'title' => $this->input->post('title'),
                'url' => $this->common->cleanStr($this->input->post('title')),
                'date' => $this->input->post('date'),
                'briefintro' => $this->input->post('briefintro'),
                'details' => $this->input->post('details'),
//            'conical' => $this->common->cleanStr($this->input->post('title')),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['main_img']) && $_FILES['main_img']['name'] != "") {
                $extId = pathinfo($_FILES['main_img']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["main_img"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['main_img']['size'] >= $maxsize) || ($_FILES["main_img"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['main_img'];
                $path = './uploads/news/';
                $file_path_image = base_url() . 'uploads/news/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['main_img'] = $image;
                $insert_data['main_imgurl'] = $file_path_image . $image;
            }



            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId2 = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId2, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/news/';
                $file_path_image = base_url() . 'uploads/news/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $insert_data['featured_image'] = $image;
                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }


            $id = $this->common->insert_table('news', $insert_data);

            $lid = $this->db->insert_id();

            $url = array(
                'column_id' => $lid,
                'type' => 'news',
                'old_url' => '',
                'new_url' => $this->common->cleanStr($this->input->post('title')),
            );

            $this->common->insert_table('url_redirections', $url);

            if ($id) {
                $this->session->set_flashdata('success', 'News added successfully !!!!! ');
                redirect("add-news");
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("add-news");
        }
    }

    public function edit_news($id) {

        $data['page_name'] = 'Edit News';
        $this->index->activity_log('News Edit');
        $data['edit_details'] = $this->common->view('news', $id);
        $data['newscategory_list'] = $this->common->list1('news_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'News/editnews';
        $this->load->view('admin_template', $data);
    }

    public function editnews() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('briefintro', 'briefintro', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');

            $update_data = array(
                'category_id' => $this->input->post('category_id'),
                'posted_by' => $this->input->post('posted_by'),
                'title' => $this->input->post('title'),
                'url' => $this->common->cleanStr($this->input->post('title')),
//            'conical' => $this->common->cleanStr($this->input->post('title')),
                'date' => $this->input->post('date'),
                'briefintro' => $this->input->post('briefintro'),
                'details' => $this->input->post('details'),
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['main_img']) && $_FILES['main_img']['name'] != "") {
                $extId = pathinfo($_FILES['main_img']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["main_img"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['main_img']['size'] >= $maxsize) || ($_FILES["main_img"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['main_img'];
                $path = './uploads/news/';
                $file_path_image = base_url() . 'uploads/news/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $update_data['main_img'] = $image;
                $update_data['main_imgurl'] = $file_path_image . $image;

                $query = $this->common->un($id,'news');
                $row = $query->row();
                $img = $row->main_img ;

                if(file_exists("uploads/news/".$img)){
                    unlink("uploads/news/".$img);
                }
            }



            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId2 = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId2, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/news/';
                $file_path_image = base_url() . 'uploads/news/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $update_data['featured_image'] = $image;
                $update_data['featured_imageurl'] = $file_path_image . $image;

                $query = $this->common->un($id,'news');
                $row = $query->row();
                $img = $row->featured_image ;

                if(file_exists("uploads/news/".$img)){
                    unlink("uploads/news/".$img);
                }
            }


            $this->common->update_table('news', $update_data, $id);
            $hb = $this->db->affected_rows();

            $bb = $this->common->cleanStr($this->input->post('title'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'news');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'news');
            }

            if ($hb == 0) {
                $this->session->set_flashdata('warning', 'You have made no changes.');
                redirect("edit-news/" . $id);
            }
            $update_data['createdDate'] = DATE;
            $this->common->update_table('news', $update_data, $id);
            $this->session->set_flashdata('success', 'News Updated successfully');
            redirect("edit-news/" . $id);
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("edit-news/" . $id);
        }
    }

    public function fetch_news() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'news');
            echo json_encode($data);
        }
    }

    public function delete_news() {

        $this->index->activity_log('News Delete');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'news');
        $row = $query->row();
        $img = $row->featured_image ;
        $img2 = $row->main_img ;

        if(file_exists("uploads/news/".$img)){
           unlink("uploads/news/".$img);
        }
        if(file_exists("uploads/news/".$img2)){
            unlink("uploads/news/".$img2);
        }

        $this->common->delete_table('news', $id);
        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'news');

        $array = array(
            'success' => 'News Deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_news() {
        $id = $this->input->post('id');
        $this->index->activity_log('News Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('news', $delete_data, $id);
        $array = array(
            'success' => 'News status updated successfully.'
        );
        echo json_encode($array);
    }

    public function feature_news() {
        $id = $this->input->post('id');
        $this->index->activity_log('News Featured');

        if ($this->input->post('status_id') == '1') {

            $this->db->select('*');

            $this->db->where('alt_features', '1');

            $this->db->from('news');

            $query = $this->db->get();

            if ($query->num_rows() >= 3) {

                $array = array(
                    'error' => 'Only 3 news can be featured.'
                );
            } else {

                $delete_data = array(
                    'alt_features' => $this->input->post('status_id'),
                );

                $this->common->update_table('news', $delete_data, $id);

                $array = array(
                    'success' => 'News featured status updated successfully.'
                );
            }
        } else {

            $delete_data = array(
                'alt_features' => $this->input->post('status_id'),
            );

            $this->common->update_table('news', $delete_data, $id);

            $array = array(
                'success' => 'News featured status updated successfully.'
            );
        }

        echo json_encode($array);
    }

    public function editseo($id) {

        if ($id == 'editnewsseo') {

            $id = $this->input->post('id');
            $update_data = array(
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword'),
                'url' => $this->common->cleanStr($this->input->post('url')),
                'alt_tag_main_img' => $this->input->post('alt_tag_main_img'),
                'alt_tag_featured_img' => $this->input->post('alt_tag_featured_img'),
                'schemap' => $this->input->post('schemap'),
            );
            $this->common->update_table('news', $update_data, $id);

            $bb = $this->common->cleanStr($this->input->post('url'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'news');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'news');
            }



            if ($this->db->affected_rows() == 0) {

                $array = array(
                    'error' => 'You have made no changes.'
                );
            } else {

                $array = array(
                    'success' => 'SEO data Updated successfully.'
                );
            }


            echo json_encode($array);
        } else {
            $data['page_name'] = 'Update SEO News';
            $this->index->activity_log('News Seo');
            $data['edit_details'] = $this->common->view('news', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'News/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_newscategorylist(){
        $this->db->select('*');
        $this->db->from('news_category');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->category_name;
            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-newscategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-newscategory"  />
                            <span class="switch-toggle-slider">
                                <span class="switch-off">
                                    <i class="bx bx-x" style="color:red;"></i>
                                </span>
                            </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;
           
            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editcn', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delcn', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-newscategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-newscategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-newscategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-newscategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-newscategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
            } 
            
            $sub_array[]  =  $action;       
            $data[] = $sub_array;

            $count++;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
    public function fetch_newslist(){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category_name', 'news_category');
           
            $sub_array[] = $row->title;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input  status-news"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input  status-news"  />
                            <span class="switch-toggle-slider">
                                <span class="switch-off">
                                    <i class="bx bx-x" style="color:red;"></i>
                                </span>
                            </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;
           
            $featured = '';
            if($row->alt_features =='1'){
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs feature-news"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs feature-news"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editn', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('deln', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-news/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-news"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete news"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-news/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-news"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete news"></i></button>';
            } 
            
            // $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'edit-newsseo/'.$row->id.'">SEO</i></a>';
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqnews" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
            } 
            
            $sub_array[]  =  $action;       
            $data[] = $sub_array;

            $count++;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
}
?>