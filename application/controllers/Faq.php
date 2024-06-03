<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Index_model', 'index');
        $this->index->activity_update();
    }

    public function index()
    {

        $id = $this->session->userdata('user_id');
        $data['page_name'] = 'FAQs Category List';
        $data['faqcategory_list'] = $this->common->list('faq_category');
        $this->index->activity_log('FAQs Category List');
        $data['content_view'] = 'Faq/faqcategory_list';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }

    //FAQ CAtegory



    public function add_faqcategory()
    {
        $this->index->activity_log('FAQs Category Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required|is_unique[faq_category.category]');
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category' => $this->input->post('category'),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('faq_category', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Faq Category added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'category_error' => form_error('category')
            );
        }
        echo json_encode($array);
    }

    public function fetch_faqcategory()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'faq_category');
            echo json_encode($data);
        }
    }
    function check_order_no($order_no)
    {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'faq_category', 'category', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }



    public function edit_faqcategory()
    {
        $this->index->activity_log('FAQs Category Edit');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required|callback_check_order_no');
        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category' => $this->input->post('category'),


            );
            $this->common->update_table('faq_category', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $update_data['createdBy'] = $this->session->userdata('user_id');
                $this->common->update_table('faq_category', $update_data, $id);
                $array = array(
                    'success' => 'Faq Category updated successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'faqcategory1_error' => form_error('category')
            );
        }
        echo json_encode($array);
    }

    public function status_faqcategory()
    {
        $id = $this->input->post('id');
        $this->index->activity_log('FAQs Category Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('faq_category', $delete_data, $id);
        $this->common->update_table1('faq_list', $delete_data, 'category_id', $id);

        $array = array(
            'success' => 'Faq status updated successfully.'
        );
        echo json_encode($array);
    }

    public function delete_faqcategory()
    {
        $id = $this->input->post('id');
        $this->index->activity_log('FAQs Category Delete');
        $this->common->delete_table('faq_category', $id);
        $this->common->delete_table1('faq_list', 'category_id', $id);

        $array = array(
            'success' => 'Faq Category deleted successfully.'
        );
        echo json_encode($array);
    }

    // faq functionality

    public function addfaq()
    {

        $data['page_name'] = "Add FAQ's";
        $data['faqcategory_list'] = $this->common->list2('faq_category');
        $this->index->activity_log("Add FAQ's");
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Faq/addfaq';
        $this->load->view('admin_template', $data);
    }

    public function faq_list()
    {
        $this->index->activity_log("FAQ's List");
        $data['page_name'] = "FAQ's List";
        $data['faq_list'] = $this->common->list('faq_list');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['faqcategory_list'] = $this->common->list('faq_list');
        $data['content_view'] = 'Faq/faq_list';
        $this->load->view('admin_template', $data);
    }

    public function add_faq()
    {
        $this->index->activity_log('Add FAQ');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');

        $this->form_validation->set_rules('faq', 'Question', 'trim|required');
        $this->form_validation->set_rules('answer', 'Answer', 'trim|required');

        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'faq' => $this->input->post('faq'),
                'status' => '1',
                'answer' => $this->input->post('answer'),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('faq_list', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Faq added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'cat_error' => form_error('category_id'),
                'faq_error' => form_error('faq'),
                'answer_error' => form_error('answer')
            );
        }
        echo json_encode($array);
    }

    public function fetch_faq()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'faq_list');
            echo json_encode($data);
        }
    }

    public function editfaq($id)
    {
        if ($id == 'edit') {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');

            $this->form_validation->set_rules('faq', 'question', 'trim|required');
            $this->form_validation->set_rules('answer', 'Answer', 'trim|required');
            if ($this->form_validation->run()) {
                $id = $this->input->post('id');
                $update_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'faq' => $this->input->post('faq'),
                    'answer' => $this->input->post('answer'),


                );
                $this->common->update_table('faq_list', $update_data, $id);
                if ($this->db->affected_rows() == 0) {
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                } else {
                    $update_data['createdDate'] = DATE;
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $this->common->update_table('faq_list', $update_data, $id);
                    $array = array(
                        'success' => 'Faq Updated successfully.'
                    );
                }
            } else {
                $array = array(
                    'error' => true,
                    'cat1_error' => form_error('category_id'),
                    'faq1_error' => form_error('faq'),
                    'answer1_error' => form_error('answer')
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = "Edit FAQ's";
            $this->index->activity_log("Edit FAQ's");
            $data['edit_details'] = $this->common->view('faq_list', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['faqcategory_list'] = $this->common->list2('faq_category');
            $data['content_view'] = 'Faq/editfaq';
            $this->load->view('admin_template', $data);
        }
    }

    public function delete_faq()
    {
        $id = $this->input->post('id');
        $this->index->activity_log('Delete FAQ');
        $this->common->delete_table('faq_list', $id);
        $array = array(
            'success' => 'Faq deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_faq()
    {
        $this->index->activity_log('Status FAQ');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('faq_list', $delete_data, $id);
        $array = array(
            'success' => 'Faq status updated successfully.'
        );
        echo json_encode($array);
    }
   
    public function edit_seqfaqcat() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('faq_category', $update_data, $id);

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
    public function fetch_seqfaq() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'faq_list');
            echo json_encode($data);
        }
    }

    public function edit_seqfaq() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('faq_list', $update_data, $id);

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

    public function fetch_faqcategorylist(){
        $this->db->select('*');
        $this->db->from('faq_category');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->category;
            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-faqcategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-faqcategory"  />
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
                    $res = $this->common->eachcheckpri('editcf', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delcf', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-faqcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-faqcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-faqcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-faqcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-faqcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_faqlist(){
        $this->db->select('*');
        $this->db->from('faq_list');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category', 'faq_category');
           
            $sub_array[] = $row->faq;
            $sub_array[] = '<button type="button" class="btn btn-primary btn-xs fetch-faq" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#basicModal">View</button>';

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-faq"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-faq"  />
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
                    $res = $this->common->eachcheckpri('editf', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delf', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-faq/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-faq"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Faq"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-faq/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-faq"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Faq"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqfaq" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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