<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common_functions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Index_model', 'index');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function delete_allcat(){
        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {

                array_push($checkbox, $row);
            }

            if($this->input->post('page_name')=='Product Category/Sub Category' || $this->input->post('page_name')=='Service Category/Sub Category'){
                $abc = $this->common->deleteAll($checkbox, $this->input->post('category_tbl'),'category_id');
                $abc = $this->common->deleteAll($checkbox, $this->input->post('category_tbl'),'id');
            }else{
                $abc = $this->common->deleteAll($checkbox, $this->input->post('category_tbl'),'id');
            }
            $abc = $this->common->deleteAll($checkbox, $this->input->post('listtbl'),'category_id');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' deleted successfully',
            );
        } else {



            $array = array(
                'error' => 'Select atleast '.$this->input->post('page_name'),
            );
        }

        echo json_encode($array);
    }
    
    public function status_allcat(){
        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {



                array_push($checkbox, $row);
            }



            $delete_data = array(
                'status' => 1,
            );

            $abc = $this->common->statusall($checkbox, $delete_data, $this->input->post('category_tbl'),'id');

            $abc = $this->common->statusall($checkbox, $delete_data, $this->input->post('listtbl'),'category_id');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' activated successfully.',
            );
        } else {



            $array = array(
                'error' => 'Select atleast one '.$this->input->post('page_name'),
            );
        }
        echo json_encode($array);
    }

    public function status_allcatde() {

        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {

                // echo $row;

                array_push($checkbox, $row);
            }



            $delete_data = array(
                'status' => 0,
            );

            $abc = $this->common->statusall($checkbox, $delete_data, $this->input->post('category_tbl'),'id');

            $abc = $this->common->statusall($checkbox, $delete_data,$this->input->post('listtbl'),'category_id');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' deactivated successfully.',
            );
        } else {

            $array = array(
                'error' => 'Select atleast one '.$this->input->post('page_name'),
            );
        }

        echo json_encode($array);
    }

    public function delete_all() {

        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {



                array_push($checkbox, $row);
            }

            $abc = $this->common->deleteAll($checkbox, $this->input->post('listtbl'),'id');

            $abc = $this->common->deleteAllredirection($checkbox, $this->input->post('listtbl'), 'url_redirections');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' deleted successfully.',
            );
        } else {



            $array = array(
                'error' => 'Select atleast one '.$this->input->post('page_name'),
            );
        }

        echo json_encode($array);
    }

    public function status_all() {

        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {



                array_push($checkbox, $row);
            }



            $delete_data = array(
                'status' => 1,
            );

            $abc = $this->common->statusall($checkbox, $delete_data, $this->input->post('listtbl'),'id');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' activated successfully.',
            );
        } else {



            $array = array(
                'error' => 'Select atleast one '.$this->input->post('page_name'),
            );
        }

        echo json_encode($array);
    }

    public function status_allde() {

        if (!empty($this->input->post('checkbox_value'))) {

            $checkboxs = $this->input->post('checkbox_value');

            $checkbox = [];

            foreach ($checkboxs as $row) {
                array_push($checkbox, $row);
            }

            $delete_data = array(
                'status' => 0,
            );

            $abc = $this->common->statusall($checkbox, $delete_data, $this->input->post('listtbl'),'id');

            $array = array(
                'success' => 'Selected '.$this->input->post('page_name').' deactivated successfully.',
            );
        } else {
            $array = array(
                'error' => 'Select atleast one '.$this->input->post('page_name'),
            );
        }

        echo json_encode($array);
    }
}
?>