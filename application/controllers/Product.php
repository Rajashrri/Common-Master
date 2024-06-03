<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $data['page_name'] = 'Products Category List';
        $this->index->activity_log('Product Category List');
        $data['category_list'] = $this->common->list('tbl_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Product/category_list';
        $this->load->view('admin_template', $data);
    }

    public function addproductcategory() {
        $this->index->activity_log('Products Category List');
        $data['page_name'] = 'Add Product Category';
        $data['content_view'] = 'Product/addcat';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }

    public function get_sub_category() {
        $category_id = $this->input->post('id', TRUE);
        $data = $this->common->get_sub_category($category_id)->result();
        echo json_encode($data);
    }

    public function add_category() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|is_unique[tbl_category.category_name]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => $this->common->cleanStr($this->input->post('category_name')),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $id = $this->common->insert_table('tbl_category', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Product Category added successfully.'
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

    public function fetch_category() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'tbl_category');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'tbl_category', 'category_name', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_category() {
        $this->index->activity_log('Edit Product Category');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => $this->common->cleanStr($this->input->post('category_name')),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $q = $this->db->get_where('tbl_category', array('id' => $id))->row();

            if ($this->input->post('category_name') == $q->category_name) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $this->common->update_table('tbl_category', $update_data, $id);

                $array = array(
                    'success' => 'Product Category updated successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'categorynameedit_error' => form_error('category_name')
            );
        }
        echo json_encode($array);
    }

    public function delete_category() {
        $id = $this->input->post('id');
        $this->index->activity_log('Delete Product Category');
        $this->common->delete_table('tbl_category', $id);
        $this->common->delete_table1('product', 'category_id', $id);
        $this->common->delete_table1('tbl_subcategory', 'category_id', $id);

        $array = array(
            'success' => 'Product Category deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_category() {
        $this->index->activity_log('Status Product Category');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('tbl_category', $delete_data, $id);
        $this->common->update_table1('product', $delete_data, 'category_id', $id);
        $this->common->update_table1('tbl_subcategory', $delete_data, 'category_id', $id);

        $array = array(
            'success' => 'Product Category status updated successfully.'
        );
        echo json_encode($array);
    }

    public function subcategory_list() {
        $data['page_name'] = 'Products Category List';
        $this->index->activity_log('Products Category List');
        $data['subcategory_list'] = $this->common->list('tbl_subcategory');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['category_list'] = $this->common->subcat('tbl_subcategory');
        $data['content_view'] = 'Product/subcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function addproductsubcategory() {
        $data['page_name'] = 'Products Category List';
        $this->index->activity_log('Add Products Category List');
        $data['content_view'] = 'Product/addsubcat';
        $data['category_list'] = $this->common->subcat('tbl_subcategory');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }

    public function add_subcategory() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('subcategory', 'Subcategory Name', 'trim|required|is_unique[tbl_subcategory.subcategory]', array('is_unique' => 'This %s already exists.'));

        if ($this->form_validation->run()) {
            if ($this->input->post('category_id') == '0') {
                $insert_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'subcategory' => $this->input->post('subcategory'),
                    'url' => $this->common->cleanStr($this->input->post('subcategory')),
                    'status' => '1',
                    'createdBy' => $this->session->userdata('user_id'),
                    'createdDate' => DATE
                );
                $id = $this->common->insert_table('tbl_subcategory', $insert_data);
                $array = array(
                    'success' => 'Product Category added successfully.'
                );
            } else {
                $insert_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'subcategory' => $this->input->post('subcategory'),
                    'url' => $this->common->cleanStr($this->input->post('subcategory')),
                    'status' => '1',
                    'createdBy' => $this->session->userdata('user_id'),
                    'createdDate' => DATE
                );

                $id = $this->common->insert_table('tbl_subcategory', $insert_data);
                if ($id) {
                    $array = array(
                        'success' => 'Product Sub Category added successfully.'
                    );
                }
            }
        } else {
            $array = array(
                'error' => true,
                'categorypro_error' => form_error('category_id'),
                'subcategory_error' => form_error('subcategory')
            );
        }
        echo json_encode($array);
    }

    public function fetch_subcategory() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'tbl_subcategory');
            echo json_encode($data);
        }
    }

    function check_order_no1($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'tbl_subcategory', 'subcategory', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no1', 'This SubCategory Name already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_subcategory() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('subcategory', 'Subcategory Name', 'trim|required|callback_check_order_no1');

        if ($this->form_validation->run()) {

            $id = $this->input->post('id');
            if ($this->input->post('category_id') == '0') {
                $update_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'subcategory' => $this->input->post('subcategory'),
                    'url' => $this->common->cleanStr($this->input->post('subcategory')),
                );
                $this->common->update_table('tbl_subcategory', $update_data, $id);
                if ($this->db->affected_rows() == 0) {
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                } else {
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('tbl_subcategory', $update_data, $id);
                    $array = array(
                        'success' => 'Product Category updated successfully.'
                    );
                }
            } else {
                $update_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'subcategory' => $this->input->post('subcategory'),
                    'url' => $this->common->cleanStr($this->input->post('subcategory')),
                );
                $this->common->update_table('tbl_subcategory', $update_data, $id);
                if ($this->db->affected_rows() == 0) {
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                } else {
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('tbl_subcategory', $update_data, $id);
                    $array = array(
                        'success' => 'Product Sub Category updated successfully.'
                    );
                }
            }
        } else {
            $array = array(
                'error' => true,
                'categoryproedit_error' => form_error('category_id'),
                'subcategorycat_error' => form_error('subcategory')
            );
        }
        echo json_encode($array);
    }

    public function editproductseo($id) {

        if ($id == 'editproductseo') {



            $id = $this->input->post('id');
            $update_data = array(
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword'),
                'alt_tag_main_img' => $this->input->post('alt_tag_main_img'),
                'alt_tag_featured_img' => $this->input->post('alt_tag_featured_img'),
                'schemap' => $this->input->post('schemap'),
                'url' => $this->common->cleanStr($this->input->post('url')),
            );

            $bb = $this->common->cleanStr($this->input->post('url'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'product');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'product');
            }
            $this->common->update_table('product', $update_data, $id);
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
            $data['page_name'] = 'Update Product SEO';
            $data['edit_details'] = $this->common->view('product', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $this->index->activity_log('Product Seo');
            $data['content_view'] = 'Product/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function delete_subcategory() {
        $this->index->activity_log('Product Sub category Delete');
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('tbl_subcategory');
        $query = $this->db->get();
        $row = $query->row();
        if ($row->category_id == '0') {
            $this->common->delete_table('tbl_subcategory', $id);
            $this->common->delete_table1('tbl_subcategory', 'category_id', $id);
            $this->common->delete_table1('product', 'category_id', $id);
        } else {
            $this->common->delete_table('tbl_subcategory', $id);
            $this->common->delete_table1('product', 'category_id', $id);
        }
        $array = array(
            'success' => 'Product Category and Sub Category  Deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_subcategory() {
        $id = $this->input->post('id');
        $this->index->activity_log('Product Sub category status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('tbl_subcategory', $delete_data, $id);
        $this->common->update_table1('product', $delete_data, 'category_id', $id);

        $array = array(
            'success' => 'Product Category and Sub Category status updated successfully.'
        );
        echo json_encode($array);
    }

    public function addproduct() {
        $data['page_name'] = 'Add Products';
        $this->index->activity_log('Add Products');
        $data['category_list'] = $this->common->subcat('tbl_subcategory');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Product/add_product';
        $this->load->view('admin_template', $data);
    }

    public function product_list() {
        $data['page_name'] = 'Products List';
        $this->index->activity_log('Products List');
        $data['product_list'] = $this->common->list('product');
        $data['category_list'] = $this->common->list2('tbl_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Product/product_list';
        $this->load->view('admin_template', $data);
    }

    public function getCityDepartment() {
        // POST data 
        $postData = $this->input->post();

        $data = $this->common->getSubcategoryDependency($postData, 'id,subcategory', 'category_id', 'tbl_subcategory');

        echo json_encode($data);
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
                $allowed_extension = array("jpg", "jpeg", "gif", "png", "webp");
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

    public function insert_product() {

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('name', ' Name', 'trim|required');
        $this->form_validation->set_rules('name', ' Name', 'trim|required');
        $this->form_validation->set_rules('briefinfo', ' briefinfo', 'trim|required');

        if (empty($_FILES['featured_image']['name'])) {
            $this->form_validation->set_rules('featured_image', 'Image', 'required');
        }
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('featured_image', 'Image', 'required');
        }


        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'name' => $this->input->post('name'),
                'url' => $this->common->cleanStr($this->input->post('name')),
                'briefinfo' => $this->input->post('briefinfo'),
                'description' => $this->input->post('description'),
                'status' => '1',
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");
            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $errors = array();
//            $maxsize = 26214400;

                $maxsize = 1000;
                $maxsize1 = 500;

                if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['image']['size'] == $maxsize) && ($_FILES["image"]["size"] == $maxsize1 )) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['image'];
                $path = './uploads/product/';
                $file_path_image = base_url() . 'uploads/product/';
                $image = $this->common->upload_image($image_data, 1, $path);

                $insert_data['image'] = $image;
                $insert_data['image_url'] = $file_path_image . $image;
            }

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 1000;
                $maxsize1 = 500;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) && ($_FILES["featured_image"]["size"] == $maxsize1)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/product/';
                $file_path_image = base_url() . 'uploads/product/';
                $image = $this->common->upload_image($image_data, 2, $path);

                $insert_data['featured_image'] = $image;
                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }

            $id = $this->common->insert_table('product', $insert_data);

            $lid = $this->db->insert_id();

            $url = array(
                'column_id' => $lid,
                'type' => 'product',
                'old_url' => '',
                'new_url' => $this->common->cleanStr($this->input->post('name')),
            );

            $this->common->insert_table('url_redirections', $url);
            if ($id == true) {
                $this->session->set_flashdata('success', 'Product added successfully !!!!! ');
            }

            redirect("add-product");
            // }
        } else {
            $this->session->set_flashdata('Error', 'Something went wrong ');
            redirect("add-product");
        }
    }

    public function myformAjax($id) {
        $this->db->where("category_id", $id);
        $this->db->where('status', '1');
        $result = $this->db->get("tbl_subcategory")->result();
        echo json_encode($result);
    }

    public function editproduct($id) {

        $data['page_name'] = 'Edit Product';
        $this->index->activity_log('Product Edit');
        $data['edit_details'] = $this->common->view('product', $id);
        $data['category_list'] = $this->common->subcat('tbl_subcategory');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Product/edit_product';

        $this->load->view('admin_template', $data);
    }
    public function fetch_seqprocat() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'tbl_subcategory');
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

             $this->common->update_table('tbl_subcategory', $update_data, $id);
          
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
    
    public function editproduct1() {
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('name', ' Name', 'trim|required');
        $this->form_validation->set_rules('name', ' Name', 'trim|required');
        $this->form_validation->set_rules('briefinfo', ' briefinfo', 'trim|required');

        if ($this->form_validation->run()) {

            $id = $this->input->post('id');

            $update_data['category_id'] = $this->input->post('category_id');
            $update_data['name'] = $this->input->post('name');
            $update_data['url'] = $this->common->cleanStr($this->input->post('name'));
            $update_data['subcategory_id'] = $this->input->post('subcategory_id');

            $update_data['description'] = $this->input->post('description1');
            $update_data['briefinfo'] = $this->input->post('briefinfo');
            $update_data['createdBy'] = $this->session->userdata('user_id');
            $update_data['createdDate'] = DATE;
            // 
            $update_data['status'] = '1';

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");
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
                $path = './uploads/product/';
                $file_path_image = base_url() . 'uploads/product/';
                $image = $this->common->upload_image($image_data, 1, $path);

                $update_data['image'] = $image;
                $update_data['image_url'] = $file_path_image . $image;

                $query = $this->common->un($id,'product');
                $row = $query->row();
                $img = $row->image ;

                if(file_exists("uploads/product/".$img)){
                    unlink("uploads/product/".$img);
                }
            }

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/product/';
                $file_path_image = base_url() . 'uploads/product/';
                $fimage = $this->common->upload_image($image_data, 2, $path);

                $update_data['featured_image'] = $fimage;
                $update_data['featured_imageurl'] = $file_path_image . $fimage;

                $query = $this->common->un($id,'product');
                $row = $query->row();
                $img = $row->featured_image ;

                if(file_exists("uploads/product/".$img)){
                    unlink("uploads/product/".$img);
                }
            }

            $this->common->update_table('product', $update_data, $id);
            $aff = $this->db->affected_rows();

            $bb = $this->common->cleanStr($this->input->post('name'));
            $this->db->select('*');
            $this->db->where('column_id', $id);
            $this->db->where('type', 'product');

            $this->db->from('url_redirections');
            $query = $this->db->get();
            $row = $query->row();
            if ($row->new_url != $bb) {
                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );
                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'product');
            }
            if ($aff == 0) {
                $this->session->set_flashdata('warning', 'You have made no changes');

                redirect("edit-product/" . $id);
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('product', $update_data, $id);
                $this->session->set_flashdata('success', 'Product Updated successfully ');
                redirect("edit-product/" . $id);
            }
        } else {
            $this->session->set_flashdata('Error', 'Something went wrong ');
            redirect("edit-product/" . $id);
        }
    }

    function isAlreadyExit() {
        $mobile = trim($this->input->get('category_name'));
        $result = $this->common->isExit($mobile, 'category_name', 'tbl_category');
        if ($result) {
            echo $msg = "false";
        } else {
            echo $msg = "true";
        }
    }

    function isAlreadyExitEdit() {
        $id = $this->uri->segment(2);

        $mobile = trim($this->input->get('category_name'));

        $result = $this->common->isExitEdit($mobile, $id, 'category_name', 'tbl_category');
        if ($result) {
            echo $msg = "false";
        } else {
            echo $msg = "true";
        }
    }

    public function status_product() {
        $id = $this->input->post('id');
        $this->index->activity_log('Product Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('product', $delete_data, $id);

        $array = array(
            'success' => 'Product status Updated successfully.'
        );

        echo json_encode($array);
    }

    public function delete_product() {
        $id = $this->input->post('id');
        $this->index->activity_log('Product Delete');

        $query = $this->common->un($id,'product');
        $row = $query->row();
        $img = $row->featured_image ;
        $img2 = $row->image ;

        if(file_exists("uploads/product/".$img)){
           unlink("uploads/product/".$img);
        }
        if(file_exists("uploads/product/".$img2)){
            unlink("uploads/product/".$img2);
        }

        $this->common->delete_table('product', $id);
        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'product');

        $array = array(
            'success' => 'Product deleted successfully.'
        );
        echo json_encode($array);
    }
    public function fetch_seq() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'product');
            echo json_encode($data);
        }
    }
 public function edit_seq() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
             
            );

             $this->common->update_table('product', $update_data, $id);
          
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
    public function featured() {
        $id = $this->input->post('id');
        $this->index->activity_log('Product Featured');
        $delete_data = array(
            'featured' => $this->input->post('status'),
        );
        $this->common->update_table('product', $delete_data, $id);

        $array = array(
            'success' => 'Product featured status updated successfully.'
        );

        echo json_encode($array);
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
                                'name' => $row['name'],
                                'category_id' => $row['category_id'],
                                'subcategory_id' => $row['subcategory_id'],
                                'briefinfo' => $row['briefinfo'],
                                'details' => $row['details'],
                                'status' => 1,
                                'createdDate' => DATE
                            );

//                          
                            // Check whether email already exists in the database
                            $con = array(
                                'where' => array(
                                    'name' => $row['name']
                                ),
                                'returnType' => 'count'
                            );

                            $prevCount = $this->common->getRows('product', $con);

                            if ($prevCount > 0) {
                                // Update member data
                                $condition = array('name' => $row['name']);
                                $update = $this->csv->update('product', $memData, $condition);

                                if ($update) {
                                    $updateCount++;
                                }
                            } else {
                                // Insert member data
                                $insert = $this->common->insert('product', $memData);

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
        redirect('service-list');
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

    public function fetch_productsubcategorylist(){
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $categoryname ='';
            if($row->category_id=='0'){
            $categoryname .= $row->subcategory ;
                }else{
            $categoryname .= $this->common->selectivename($row->category_id,'subcategory','tbl_subcategory') ;
                }
            $sub_array[] = $categoryname;

            $subcategory ='';
            if($row->category_id=='0'){
                $subcategory .= '' ;
            }else{
                $subcategory .= $row->subcategory;  
            }
            $sub_array[] = $subcategory;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input  status-subcategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input  status-subcategory"  />
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
                    $res = $this->common->eachcheckpri('editscp', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delscp', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-subcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-subcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-subcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-subcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-seqprocat" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_productlist(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'subcategory', 'tbl_subcategory');
            $sub_array[] = $this->common->cat_name($row->subcategory_id, 'subcategory', 'tbl_subcategory');
            $sub_array[] = $row->name;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-product"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-product"  />
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
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs featured-product"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs featured-product"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editp', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delp', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-product/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-product"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Product"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-product/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
            <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-product"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete Product"></i></button>';
            } 
            $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'editproductseo/'.$row->id.'">SEO</i></a>';

            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seq" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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