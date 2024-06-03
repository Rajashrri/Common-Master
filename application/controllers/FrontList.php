<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FrontList extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->login->is_logged_in();
    }

    public function index() {
        $this->login->is_logged_in();
        $data['page_name'] = 'Contact Enquiry List';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['list'] = $this->common->list('contact');
        $data['content_view'] = 'List/contactenq';
        $this->load->view('admin_template', $data);
    }

    public function fetch_test() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'contact');
            echo json_encode($data);
        }
    }

    public function fetch_sertest() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'enqury');
            echo json_encode($data);
        }
    }

    public function fetch_cartest() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'career_enquiry');
            echo json_encode($data);
        }
    }

    public function service_enquiry() {
        $this->login->is_logged_in();
        $data['page_name'] = 'Service Enquiry List';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['enq_list'] = $this->common->list('enqury');
        $data['content_view'] = 'List/seviceEnq_list';
        $this->load->view('admin_template', $data);
    }

    public function newletterr_enquiry() {
        $this->login->is_logged_in();
        $data['page_name'] = 'Newsletter Enquiry List';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['contact_list'] = $this->common->list('newsletter');
        $data['content_view'] = 'List/newsletter_list';
        $this->load->view('admin_template', $data);
    }

    
}
?>