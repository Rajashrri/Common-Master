<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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

        $data['page_name'] = 'Projects Category List';

        $this->index->activity_log('Projects CategoryAdd');

        $data['projectcategory_list'] = $this->common->list('projectcategory');

        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Project/projectcategory_list';

        $this->load->view('admin_template', $data);
    }

    //project category

    public function fetch_seqprocat() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'projectcategory');
            echo json_encode($data);
        }
    }
 public function edit_seqprocat() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
             
            );

             $this->common->update_table('projectcategory', $update_data, $id);
          
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
    public function fetch_seqpro() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'project');
            echo json_encode($data);
        }
    }
 public function edit_seqpro() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
             
            );

             $this->common->update_table('project', $update_data, $id);
          
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
    public function projectcategory_list() {

        $data['page_name'] = 'Project Category List';

        $this->index->activity_log('Project Category List');
        $data['projectcategory_list'] = $this->common->list('projectcategory');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Project/projectcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function add_projectcategory() {

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('category_name', 'project category Name', 'trim|required|is_unique[projectcategory.category_name]', array('is_unique' => 'This %s already exists.'));

        if ($this->form_validation->run()) {

            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => $this->common->cleanStr($this->input->post('category_name')),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $id = $this->common->insert_table('projectcategory', $insert_data);

            if ($id) {

                $array = array(
                    'success' => 'Project Category added successfully.'
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

    public function fetch_projectcategory() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $id = $this->input->post('id');

            $data = $this->common->fetch_data($id, 'projectcategory');

            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {

        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';

        $result = $this->common->check_unique_order_no($order_no, 'projectcategory', 'category_name', $id);

        if ($result == 0)
            $response = true;

        else {

            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');

            $response = false;
        }

        return $response;
    }

    public function edit_projectcategory() {

        $id = $this->input->post('id');

        $this->index->activity_log('Edit Project Category');

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {

            $id = $this->input->post('id');

            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => $this->common->cleanStr($this->input->post('category_name')),
                    // 'createdDate' => DATE
            );

            $this->common->update_table('projectcategory', $update_data, $id);

            if ($this->db->affected_rows() == 0) {



                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {

                $update_data['createdDate'] = DATE;

                $this->common->update_table('projectcategory', $update_data, $id);

                $array = array(
                    'success' => 'Project Category updated successfully.'
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

    public function delete_projectcategory() {



        $this->index->activity_log('Project Category Delete');

        $id = $this->input->post('id');

        $this->common->delete_table('projectcategory', $id);

        $this->common->delete_table1('project', 'category_id', $id);

        $array = array(
            'success' => 'Project Category deleted successfully.'
        );

        echo json_encode($array);
    }

    public function status_projectcategory() {

        $this->index->activity_log('Project Category status');

        $id = $this->input->post('id');

        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );

        $this->common->update_table('projectcategory', $delete_data, $id);

        $this->common->update_table1('project', $delete_data, 'category_id', $id);

        $array = array(
            'success' => 'Project Category status updated successfully.'
        );

        echo json_encode($array);
    }

    // Project Functionality



    public function addproject() {

        $data['page_name'] = 'Add Projects';

        $this->index->activity_log('Add Projects');

        $data['project_list'] = $this->common->list('project');

        $data['projectcategory_list'] = $this->common->list1('projectcategory', 'status', '1');

        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Project/addproject';

        $this->load->view('admin_template', $data);
    }

    public function project_list() {

        $data['page_name'] = 'Projects List';

        $this->index->activity_log('Projects list');

        $data['project_list'] = $this->common->list('project');

        $data['projectcategory_list'] = $this->common->list('projectcategory');

        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Project/project_list';

        $this->load->view('admin_template', $data);
    }

    public function upload() {
        if ($_FILES["upload"]['name'] == '') {
            $this->form_validation->set_rules('featured_image', 'featured_image ', 'trim|required');
        } else {
            if (isset($_FILES['upload']['name'])) {
                $file = $_FILES['upload']['tmp_name'];
                $file_name = $_FILES['upload']['name'];
                $file_name_array = explode(".", $file_name);
                $extension = end($file_name_array);
                $new_image_name = rand() . '.' . $extension;
                chmod('upload', 0777);
                $allowed_extension = array("jpg", "gif", "png", "webp", "jpeg");
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

//ADD BLOG

    public function insert_project() {

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('name', 'name', 'trim|required');

     
        if ($this->form_validation->run()) {

            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'name' => $this->input->post('name'),
                'url' => $this->common->cleanStr($this->input->post('name')),
               
                'description' => $this->input->post('description'),
                'briefinfo' => $this->input->post('briefinfo'),
                'status' => '1', 
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {

                $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                $errors = array();

                $maxsize = 26214400;

                if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {

                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }

                if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {

                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }



                $image_data = $_FILES['image'];

                $path = './uploads/project/';

                $file_path_image = base_url() . 'uploads/project/';

                $image = $this->common->upload_image($image_data, 1, $path);

                $insert_data['image'] = $image;

                $insert_data['image_url'] = $file_path_image . $image;
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

                $path = './uploads/project/';

                $file_path_image = base_url() . 'uploads/project/';

                $image = $this->common->upload_image($image_data, 2, $path);

                $insert_data['featured_image'] = $image;

                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }





//insert data into database table.  

            $id = $this->common->insert_table('project', $insert_data);

            $lid = $this->db->insert_id();

            $url = array(
                'column_id' => $lid,
                'type' => 'project',
                'old_url' => '',
                'new_url' => $this->common->cleanStr($this->input->post('name')),
            );

            $this->common->insert_table('url_redirections', $url);

            if ($id) {

                $this->session->set_flashdata('success', 'Project added successfully.');

                redirect("add-project");
            }
        } else {

            $this->session->set_flashdata('error', 'Something went wrong ');

            redirect("add-project");
        }
    }

    public function edit_project($id) {



        $data['page_name'] = 'Edit Project';

        $this->index->activity_log('Edit Project');

        $data['edit_details'] = $this->common->view('project', $id);

        $data['projectcategory_list'] = $this->common->list1('projectcategory', 'status', '1');

        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Project/editproject';

        $this->load->view('admin_template', $data);
    }

    public function editproject() {

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

       

        if ($this->form_validation->run()) {

            $id = $this->input->post('id');

            $update_data = array(
               'category_id' => $this->input->post('category_id'),
                'name' => $this->input->post('name'),
                'url' => $this->common->cleanStr($this->input->post('name')),
               
                'description' => $this->input->post('description'),
                'briefinfo' => $this->input->post('briefinfo'),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {

                $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                $errors = array();

                $maxsize = 26214400;

                if (!in_array($extId, $extensionResume) && (!empty($_FILES["pic"]["type"]))) {

                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }

                if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {

                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }



                $image_data = $_FILES['image'];

                $path = './uploads/project/';

                $file_path_image = base_url() . 'uploads/project/';

                $image = $this->common->upload_image($image_data, 1, $path);

                $update_data['image'] = $image;

                $update_data['image_url'] = $file_path_image . $image;

                $query = $this->common->un($id,'project');
                $row = $query->row();
                $img = $row->image ;

                if(file_exists("uploads/project/".$img)){
                    unlink("uploads/project/".$img);
                }
            }



            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {

                $extId1 = pathinfo($_FILES['featured_image1']['name'], PATHINFO_EXTENSION);

                $errors = array();

                $maxsize = 26214400;

                if (!in_array($extId1, $extensionResume) && (!empty($_FILES["pic"]["type"]))) {

                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }

                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {

                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }



                $image_data = $_FILES['featured_image'];

                $path = './uploads/project/';

                $file_path_image = base_url() . 'uploads/project/';

                $image = $this->common->upload_image($image_data, 2, $path);

                $update_data['featured_image'] = $image;
                $update_data['featured_imageurl'] = $file_path_image . $image;

                $query = $this->common->un($id,'project');
                $row = $query->row();
                $img = $row->featured_image ;

                if(file_exists("uploads/project/".$img)){
                    unlink("uploads/project/".$img);
                }
            }

            // print_r($update_data);

            $this->common->update_table('project', $update_data, $id);

            $adf = $this->db->affected_rows();

            //   exit();

            $bb = $this->common->cleanStr($this->input->post('name'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'project');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'project');
            }
            if ($adf == 0) {
                $this->session->set_flashdata('warning', 'You have made no changes');

                redirect("edit-project/" . $id);
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('project', $update_data, $id);
                $this->session->set_flashdata('success', 'Project Updated successfully ');
                redirect("edit-project/" . $id);
            }
        } else {

            $this->session->set_flashdata('error', 'Something went wrong ');

            redirect("edit-project/" . $id);
        }
    }

    public function fetch_project() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $id = $this->input->post('id');

            $data = $this->common->fetch_data($id, 'project');

            echo json_encode($data);
        }
    }

    public function delete_project() {



        $this->index->activity_log('Project Delete');

        $id = $this->input->post('id');

        $query = $this->common->un($id,'project');
        $row = $query->row();
        $img = $row->featured_image ;
        $img2 = $row->image ;

        if(file_exists("uploads/project/".$img)){
           unlink("uploads/project/".$img);
        }
        if(file_exists("uploads/project/".$img2)){
            unlink("uploads/project/".$img2);
        }


        $this->common->delete_table('project', $id);

        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'project');

        $array = array(
            'success' => 'Project data deleted successfully.'
        );

        echo json_encode($array);
    }

    public function status_project() {

        $id = $this->input->post('id');

        $this->index->activity_log('Project Status');

        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );

        $this->common->update_table('project', $delete_data, $id);

        $array = array(
            'success' => 'Project status updated successfully.'
        );

        echo json_encode($array);
    }

    public function feature_project() {

        $id = $this->input->post('id');

        $this->index->activity_log('Project feature');

        if ($this->input->post('status_id') == '1') {

            $this->db->select('*');

            $this->db->where('featured', '1');

            $this->db->from('project');

            $query = $this->db->get();

            if ($query->num_rows() >= 3) {

                $array = array(
                    'error' => 'Only 3 projects can be featured.'
                );
            } else {

                $delete_data = array(
                    'featured' => $this->input->post('status_id'),
                );

                $this->common->update_table('project', $delete_data, $id);

                $array = array(
                    'success' => 'Project Featured status Updated successfully.'
                );
            }
        } else {

            $delete_data = array(
                'featured' => $this->input->post('status_id'),
            );

            $this->common->update_table('project', $delete_data, $id);

            $array = array(
                'success' => 'Project Featured status Updated successfully.'
            );
        }



        echo json_encode($array);
    }

    public function editseo($id) {



        if ($id == 'projectseo') {


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
            $this->common->update_table('project', $update_data, $id);

            $bb = $this->common->cleanStr($this->input->post('url'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'project');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'project');
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

            $data['page_name'] = 'Update Project SEO';

            $data['edit_details'] = $this->common->view('project', $id);

            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

            $data['user_detail'] = $this->common->view1();

            $this->index->activity_log('Project Seo');

            $data['content_view'] = 'Project/seo';

            $this->load->view('admin_template', $data);
        }
    }

    public function import() {

        $data = array();

        $memData = array();

        // If import request is submitted

        if ($this->input->post('importSubmit')) {

            // Form field validation rules

            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');

            // Validate submitted form data

            if ($this->form_validation->run() == true) {

                $insertCount = $updateCount = $rowCount = $notAddCount = 0;

                // If file uploaded

                if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                    // Load CSV reader library

                    $this->load->library('CSVReader');

                    // Parse data from CSV file

                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);

                    // Insert/update CSV data into database

                    if (!empty($csvData)) {

                        foreach ($csvData as $row) {

                            $rowCount++;

                            // Prepare data for DB insertion

                            $memData = array(
                                'title' => $row['title'],
                                'author_id' => $row['author'],
                                'category_id' => $row['category'],
                                'shortdescription' => $row['shortdescription'],
                                'description' => $row['description'],
                                'createdBy' => DATE
                            );

                            // Check whether email already exists in the database

                            $con = array(
                                'where' => array(
                                    'title' => $row['title']
                                ),
                                'returnType' => 'count'
                            );

                            $prevCount = $this->common->getRows('project', $con);

                            if ($prevCount > 0) {

                                // Update member data

                                $condition = array('title' => $row['title']);

                                $update = $this->csv->update('project', $memData, $condition);

                                if ($update) {

                                    $updateCount++;
                                }
                            } else {

                                // Insert member data

                                $insert = $this->common->insert('project', $memData);

                                if ($insert) {

                                    $insertCount++;
                                }
                            }
                        }



                        // Status message with imported data count

                        $notAddCount = ($rowCount - ($insertCount + $updateCount));

                        $successMsg = 'Data imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated(already exist) (' . $updateCount . ') | Not Inserted (' . $notAddCount . ')';

                        $this->session->set_userdata('success', $successMsg);
                    }
                } else {

                    $this->session->set_userdata('error', 'Error on file upload, please try again.');
                }
            } else {

                $this->session->set_userdata('error', 'Invalid file, please select only CSV file.');
            }
        }

        redirect('project-list');
    }

    public function file_check($str) {

        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {

            $mime = get_mime_by_extension($_FILES['file']['name']);

            $fileAr = explode('.', $_FILES['file']['name']);

            $ext = end($fileAr);

            if (($ext == 'csv') && in_array($mime, $allowed_mime_types)) {

                return true;
            } else {

                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');

                return false;
            }
        } else {

            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');

            return false;
        }
    }
    public function fetch_projectcategorylist(){
        $this->db->select('*');
        $this->db->from('projectcategory');
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
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-projectcategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-projectcategory"  />
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
                    $res = $this->common->eachcheckpri('editcproject', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delcproject', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-projectcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-projectcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-projectcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-projectcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-seqprojcat" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_projectlist(){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category_name', 'projectcategory');
           
            $sub_array[] = $row->name;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-project"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-project"  />
                            <span class="switch-toggle-slider">
                                <span class="switch-off">
                                    <i class="bx bx-x" style="color:red;"></i>
                                </span>
                            </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;
           
            $featured = '';
            if($row->featured=='1'){
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs feature-project"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs feature-project"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editproject', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delproject', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-project/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-project"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Project"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-project/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-project"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Project"></i></button>';
            } 
            $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'edit-projectseo/'.$row->id.'">SEO</i></a>';

            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqproj" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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