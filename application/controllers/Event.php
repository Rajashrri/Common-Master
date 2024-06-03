<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
        $data['page_name'] = 'Event Category List';
        $this->index->activity_log('Event Category List');
        $data['eventcategory_list'] = $this->common->list('event_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Event/eventcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function featured_event() {
        $id = $this->input->post('id');
        $this->index->activity_log('Event Featured ');
        $delete_data = array(
            'alt_features' => $this->input->post('status_id'),
        );
        $this->common->update_table('event', $delete_data, $id);

        $array = array(
            'success' => 'Event featured Updated successfully.'
        );
        echo json_encode($array);
    }

public function edit_seqeventcat() {
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

    if ($this->form_validation->run()) {
        $id = $this->input->post('id');
        $update_data = array(
            'seq_id' => $this->input->post('seq_id'),
        );

        $this->common->update_table('event_category', $update_data, $id);

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



public function fetch_seqevent() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $id = $this->input->post('id');
        $data = $this->common->fetch_data($id, 'event');
        echo json_encode($data);
    }
}

public function fetch_seqeventcat() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $id = $this->input->post('id');
        $data = $this->common->fetch_data($id, 'event_category');
        echo json_encode($data);
    }
}
public function edit_seqevent() {
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

    if ($this->form_validation->run()) {
        $id = $this->input->post('id');
        $update_data = array(
            'seq_id' => $this->input->post('seq_id'),
        );

        $this->common->update_table('event', $update_data, $id);

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
    //event category

    public function eventcategory_list() {
        $data['page_name'] = 'Event Category List';
        $this->index->activity_log('Event Category List');
        $data['eventcategory_list'] = $this->common->list('event_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Event/eventcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function add_eventcategory() {

        $this->index->activity_log('Event Category Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'event category Name', 'trim|required|is_unique[event_category.category_name]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('event_category', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Event Category added successfully.'
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

    public function fetch_eventcategory() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'event_category');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'event_category', 'category_name', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_eventcategory() {
        $id = $this->input->post('id');
        $this->index->activity_log('Event Category Edit');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
            );
            $this->common->update_table('event_category', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('event_category', $update_data, $id);
                $array = array(
                    'success' => 'Event Category updated successfully.'
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

    public function delete_eventcategory() {
        $this->index->activity_log('Delete Category List');

        $id = $this->input->post('id');

        $this->common->delete_table('event_category', $id);
        $this->common->delete_table1('event', 'category_id', $id);

        $array = array(
            'success' => 'Event Category deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_eventcategory() {
        $this->index->activity_log('Status Category List');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('event_category', $delete_data, $id);
        $this->common->update_table1('event', $delete_data, 'category_id', $id);
        $array = array(
            'success' => 'Event Category status updated successfully.'
        );
        echo json_encode($array);
    }

    // Event Functionality

    public function addevent() {
        $data['page_name'] = 'Add Event';
        $this->index->activity_log('Add Event');
        $data['event_list'] = $this->common->list('event');
        $data['eventcategory_list'] = $this->common->list1('event_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Event/addevent';
        $this->load->view('admin_template', $data);
    }

    public function event_list() {
        $data['page_name'] = 'Event List';
        $this->index->activity_log('Event List');
        $data['event_list'] = $this->common->list('event');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Event/event_list';
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
    public function insert_event() {

        $insert_data = array(
            'category_id' => $this->input->post('category_id'),
            'name' => $this->input->post('name'),
            'url' => $this->common->cleanStr($this->input->post('name')),
            'from_date' => $this->input->post('from_date'),
            'end_date' => $this->input->post('end_date'),
            'entry_fee' => $this->input->post('entry_fee'),
            'timing' => $this->input->post('timing'),
            'briefintro' => $this->input->post('briefintro'),
            'link' => $this->input->post('link'),
            'details' => $this->input->post('details'),
            'status' => '1',
            'conical' => $this->common->cleanStr($this->input->post('name')),
            'createdBy' => $this->session->userdata('user_id'),
            'createdDate' => DATE
        );
        $extensionResume1 = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/events/pdf/';
            $file_path_image = base_url() . 'uploads/events/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $insert_data['pdf'] = $image;
            $insert_data['pdf_url'] = $file_path_image . $image;
        }
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
            $path = './uploads/events/';
            $file_path_image = base_url() . 'uploads/events/';
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
            $path = './uploads/events/';
            $file_path_image = base_url() . 'uploads/events/';
            $image = $this->common->upload_image($image_data, 2, $path);
            $insert_data['featured_image'] = $image;
            $insert_data['featured_imageurl'] = $file_path_image . $image;
        }


//insert data into database table.  
        $id = $this->common->insert_table('event', $insert_data);
        $lid = $this->db->insert_id();

        $url = array(
            'column_id' => $lid,
            'type' => 'event',
            'old_url' => '',
            'new_url' => $this->common->cleanStr($this->input->post('name')),
        );
        $this->common->insert_table('url_redirections', $url);

        $this->session->set_flashdata('success', 'Event Added successfully.');
        redirect("add-event");
    }

    public function edit_event($id) {

        $data['page_name'] = 'Edit Event';
        $this->index->activity_log('Edit Event');
        $data['edit_details'] = $this->common->view('event', $id);
        $data['eventcategory_list'] = $this->common->list1('event_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Event/editevent';
        $this->load->view('admin_template', $data);
    }

    public function editevent() {

        $id = $this->input->post('id');

        $update_data = array(
            'category_id' => $this->input->post('category_id'),
            'name' => $this->input->post('name'),
            'url' => $this->common->cleanStr($this->input->post('name')),
            'conical' => $this->common->cleanStr($this->input->post('name')),
            'from_date' => $this->input->post('from_date'),
            'end_date' => $this->input->post('end_date'),
            'entry_fee' => $this->input->post('entry_fee'),
            'timing' => $this->input->post('timing'),
            'briefintro' => $this->input->post('briefintro'),
            'link' => $this->input->post('link'),
            'details' => $this->input->post('details'),
        );

        $extensionResume1 = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume1) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/events/pdf/';
            $file_path_image = base_url() . 'uploads/events/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $update_data['pdf'] = $image;
            $update_data['pdf_url'] = $file_path_image . $image;

            $query = $this->common->un($id,'event');
            $row = $query->row();
            $img = $row->pdf ;

            if(file_exists("uploads/events/pdf/".$img)){
                unlink("uploads/events/pdf/".$img);
            }
        }
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
            $path = './uploads/events/';
            $file_path_image = base_url() . 'uploads/events/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $update_data['main_img'] = $image;
            $update_data['main_imgurl'] = $file_path_image . $image;

            $query = $this->common->un($id,'event');
            $row = $query->row();
            $img = $row->main_img ;

            if(file_exists("uploads/events/".$img)){
                unlink("uploads/events/".$img);
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
            $path = './uploads/events/';
            $file_path_image = base_url() . 'uploads/events/';
            $image = $this->common->upload_image($image_data, 2, $path);
            $update_data['featured_image'] = $image;
            $update_data['featured_imageurl'] = $file_path_image . $image;

            $query = $this->common->un($id,'event');
            $row = $query->row();
            $img = $row->featured_image ;

            if(file_exists("uploads/events/".$img)){
                unlink("uploads/events/".$img);
            }
        }

        $this->common->update_table('event', $update_data, $id);
        $ff = $this->db->affected_rows();

        $bb = $this->common->cleanStr($this->input->post('name'));
        $this->db->select('*');
        $this->db->where('column_id', $id);
        $this->db->where('type', 'event');

        $this->db->from('url_redirections');
        $query = $this->db->get();
        $row = $query->row();
        if ($row->new_url != $bb) {
            $url = array(
                'old_url' => $row->new_url,
                'new_url' => $bb,
            );

            $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'event');
        }


        if ($ff == 0) {
            $this->session->set_flashdata('warning', 'You have made no changes.');
            redirect("edit-event/" . $id);
        } else {
            $update_data['createdDate'] = DATE;
            $this->common->update_table('event', $update_data, $id);
            $this->session->set_flashdata('success', 'Event updated successfully.');
            redirect("edit-event/" . $id);
        }
    }

    public function fetch_event() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'event');
            echo json_encode($data);
        }
    }

    public function delete_event() {

        $this->index->activity_log('Event Delete');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'event');
        $row = $query->row();
        $img = $row->featured_image ;
        $img2 = $row->main_img ;
        $img3 = $row->pdf ;

        if(file_exists("uploads/events/".$img)){
           unlink("uploads/events/".$img);
        }
        if(file_exists("uploads/events/".$img2)){
            unlink("uploads/events/".$img2);
        }
        if(file_exists("uploads/events/pdf/".$img3)){
            unlink("uploads/events/pdf/".$img3);
        }
        
        $this->common->delete_table('event', $id);
        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'event');

        $array = array(
            'success' => 'Event deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_event() {
        $this->index->activity_log('Event Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('event', $delete_data, $id);
        $array = array(
            'success' => 'Event status updated successfully.'
        );
        echo json_encode($array);
    }

    public function feature_event() {
        $id = $this->input->post('id');
        $this->index->activity_log('Event featured');

        if ($this->input->post('status_id') == '1') {

            $this->db->select('*');

            $this->db->where('alt_features', '1');

            $this->db->from('event');

            $query = $this->db->get();

            if ($query->num_rows() >= 3) {

                $array = array(
                    'error' => 'Only 3 Event can be featured.'
                );
            } else {

                $delete_data = array(
                    'alt_features' => $this->input->post('status_id'),
                );

                $this->common->update_table('event', $delete_data, $id);

                $array = array(
                    'success' => 'Event featured status updated successfully.'
                );
            }
        } else {

            $delete_data = array(
                'alt_features' => $this->input->post('status_id'),
            );

            $this->common->update_table('event', $delete_data, $id);

            $array = array(
                'success' => 'Event featured status updated successfully.'
            );
        }


        echo json_encode($array);
    }

    public function editevntseo($id) {

        if ($id == 'editevntseo') {


            $id = $this->input->post('id');
            $update_data = array(
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'alt_tag_main_img' => $this->input->post('alt_tag_main_img'),
                'alt_tag_featured_img' => $this->input->post('alt_tag_featured_img'),
                'schemap' => $this->input->post('schemap'),
                'url' => $this->common->cleanStr($this->input->post('url')),
            );

            $bb = $this->common->cleanStr($this->input->post('url'));
            $this->db->select('*');
            $this->db->where('column_id', $id);
            $this->db->where('type', 'event');

            $this->db->from('url_redirections');
            $query = $this->db->get();
            $row = $query->row();
            if ($row->new_url != $bb) {
                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );
                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'event');
            }
            $this->common->update_table('event', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'error' => 'You have made no changes.'
                );
            } else {
                $array = array(
                    'success' => 'SEO data updated successfully.'
                );
            }

            echo json_encode($array);
        } else {
            $data['page_name'] = 'SEO Event';
            $data['edit_details'] = $this->common->view('event', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $this->index->activity_log('Event Seo');
            $data['content_view'] = 'Event/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_eventcategorylist(){
        $this->db->select('*');
        $this->db->from('event_category');
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
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-eventcategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-eventcategory"  />
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
                    $res = $this->common->eachcheckpri('editce', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delce', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-eventcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-eventcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-eventcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-eventcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-eventcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_eventlist(){
        $this->db->select('*');
        $this->db->from('event');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category_name', 'event_category');
           
            $sub_array[] = $row->name;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-event"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-event"  />
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
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs feature-event"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs feature-event"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('edite', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('dele', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-event/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-event"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete event"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-event/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-event"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Project"></i></button>';
            } 
            
            $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'edit-eventseo/'.$row->id.'">SEO</i></a>';
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqevent" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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