<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('profile_model', 'pro');
        $this->load->model('Common_model', 'common');
       
    }

    public function index() {
        if(!empty($this->session->userdata('lsd'))){
        $this->db->select('*');
        $this->db->where('id',$this->session->userdata('lsd'));
        $this->db->where('session_id !=',null);
      
        $query = $this->db->get('activity_logs');
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
        if ($row->admin_logged_in == 'true') {
            redirect('dashboard');
        }else{
            $this->db->select('*');
            $this->db->where('id','1');
            $query= $this->db->get('user_login');
            if ($query->num_rows() > 0) {
            $row = $query->row();
            if($row->flag == '1'){
            $data['page_name'] = 'master';
            $data['user_detail'] = $this->common->view1();
            $this->load->view('login/login', $data);
            }else{
                redirect('setup');
            }
            }
        }
       
        } else {
            $this->db->select('*');
            $this->db->where('id','1');
            $query= $this->db->get('user_login');
            if ($query->num_rows() > 0) {
            $row = $query->row();
            if($row->flag == '1'){
            $data['page_name'] = 'master';
            $data['user_detail'] = $this->common->view1();
            $this->load->view('login/login', $data);
            }else{
                redirect('setup');
            }
            }
        }
    }else{
        $this->db->select('*');
            $this->db->where('id','1');
            $query= $this->db->get('user_login');
            if ($query->num_rows() > 0) {
            $row = $query->row();
            if($row->flag == '1'){
            $data['page_name'] = 'master';
            $data['user_detail'] = $this->common->view1();
            $this->load->view('login/login', $data);
            }else{
                redirect('setup');
            }
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
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                );
                $result = $this->login->login_auth($data);
                if ($result == 'password_not_match') {
                    $array = array(
                        'error' => true,
                        'msg' => 'Password does not Match.'
                    );
                } else if ($result == 'user_not_exist') {
                    $array = array(
                        'error' => true,
                        'msg' => 'Not Existing User.'
                    );
                }else if ($result[0]->status != '1') {
                        $array = array(
                            'error' => true,
                            'msg' => 'You have Been Deactivated Contact Admin For further Enquires.'
                        );
                } else {
                    $session_data = array(
                        'custotplogin' => $result[0]->email,
                        'brw_logged_type' => $result[0]->role
                    );
                    $this->session->set_userdata($session_data);

                        $array = array(
                            'error' => false,
                            'msg' => 'Login OTP successfully send to your email.'
                        );
                }
            }
        } else {
            $array = array(
                'error' => true,
                'msg' => 'Invalid Username or Password.'
            );
        }
        echo json_encode($array);
    }

    public function verify_otp() {
            if ($this->session->userdata('brw_logged_in') == TRUE) {
                redirect('master');
            } else {
                $data['user_details'] = $this->pro->list('user_login');
                $data['user_detail'] = $this->common->view1();

                $data['page_name'] = 'OTP Validation';
                $this->load->view('login/verify_otp', $data);
            }
        }


    public function chk_otp() {
     
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('otp', 'OTP', 'required|trim|numeric|max_length[6]|min_length[6]');
            if ($this->form_validation->run() == FALSE) {
                $array = array(
                    'error' => true,
                    'msg' => form_error('otp')
                );
            } else {
                $data = array(
                    'cust_login' => base64_decode($this->input->post('custotplogin')),
                    'otp' => $this->input->post('otp')
                );
                $result = $this->login->otp_verify($data);
                if ($result == 'otp_not_match') {
                    $array = array(
                        'error' => true,
                        'msg' => 'OTP Does Not Match'
                    );
                } else if ($result == 'invalid_user') {
                    $array = array(
                        'error' => true,
                        'msg' => 'Not Valid User.'
                    );
                } else {
                    $session_data = array(
                        'name' => $result[0]->name,
                        'user_id' => $result[0]->id,
                        'email' => $result[0]->email,
                        'mobile_number' => $result[0]->contact,
                        'pic_url' => $result[0]->pic_url,
                        'logintime' => DATE,
                        'brw_logged_in' => TRUE,
                    );
                    $this->session->set_userdata($session_data);
                    if ($this->session->userdata('brw_logged_in') == TRUE) {
                        $this->index->activity_insert();
                        $array = array(
                            'error' => false,
                            'msg' => 'OTP verify successfully.'
                        );

                    } else {
                        $array = array(
                            'error' => true,
                            'msg' => 'OTP Does Not Match'
                        );
                    }
                }
            }
        echo json_encode($array);
    }

    public function forgot_password() {
        if ($this->session->userdata('brw_logged_in') == TRUE) {
            redirect('master');
        } else {
            $data['page_name'] = 'Forgot Password';
            $data['user_details'] = $this->pro->list('user_login');
            $data['user_detail'] = $this->common->view1();
            $this->load->view('login/forgot_password', $data);
        }
    }

    public function request_password() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'msg' => form_error('email')
            );
        } else {
            $result = $this->login->request_password();
            if ($result == 'invalid_user') {
                $array = array(
                    'error' => true,
                    'msg' => 'Email id does not Exist.'
                );
            } else {
                $session_data = array(
                    'custforgototp' => $result[0]->email,
                    'brw_logged_type' => $result[0]->role
                );
                $this->session->set_userdata($session_data);
                    $array = array(
                        'error' => false,
                        'msg' => 'Reset OTP successfully send your email.'
                    );
            }
        }
        echo json_encode($array);
    }

    public function verify_forgot_otp() {
            if ($this->session->userdata('brw_logged_in') == TRUE) {
                redirect('master');
            } else {
                $data['user_details'] = $this->pro->list('user_login');
                $data['user_detail'] = $this->common->view1();

                $data['page_name'] = 'OTP Verification';
                $this->load->view('login/verify_forgot_otp', $data);
            }
    }

    public function forgot_chk_otp() {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('otp', 'OTP', 'required|trim|numeric|max_length[6]|min_length[6]');
            if ($this->form_validation->run() == FALSE) {
                $array = array(
                    'error' => true,
                    'msg' => form_error('otp')
                );
            } else {
                $data = array(
                    'cust_login' => base64_decode($this->input->post('custotplogin')),
                    'otp' => $this->input->post('otp')
                );
                $result = $this->login->forgot_otp_verify($data);
                if ($result == 'otp_not_match') {
                    $array = array(
                        'error' => true,
                        'msg' => 'OTP Does Not Match.'
                    );
                } else if ($result == 'invalid_user') {
                    $array = array(
                        'error' => true,
                        'msg' => 'User Not Valid.'
                    );
                } else {
                    $session_data = array(
                        'this_update_email' => $result[0]->email,
                        'brw_logged_type' => $result[0]->role
                    );
                    $this->session->set_userdata($session_data);
                        $array = array(
                            'error' => false,
                            'msg' => 'OTP verify successfully.'
                        );
                }
            }
        echo json_encode($array);
    }

    public function change_password() {
            if ($this->session->userdata('brw_logged_in') == TRUE) {
                redirect('master');
            } else {
                $data['user_details'] = $this->pro->list('user_login');
                $data['user_detail'] = $this->common->view1();

                $data['page_name'] = 'Reset Password';
                $this->load->view('login/change_password', $data);
            }
    }

    public function valid_password1($password = '') {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

        if (empty($password)) {
            $this->form_validation->set_message('valid_password1', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('valid_password1', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('valid_password1', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('valid_password1', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1) {
            $this->form_validation->set_message('valid_password1', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 8) {
            $this->form_validation->set_message('valid_password1', 'The {field} field must be at least 8 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32) {
            $this->form_validation->set_message('valid_password1', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }

    public function update_password() {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_valid_password1');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|trim|matches[password]');
            if ($this->form_validation->run() == FALSE) {
                $array = array(
                    'error' => true,
                    'msg' => form_error()
                );
            } else {
                $data = array(
                    'email' => base64_decode($this->input->post('thisupdateemail')),
                    'password' => $this->input->post('password')
                );

                $result = $this->login->update_password($data);
                if ($result == 'otp_not_match') {
                    $array = array(
                        'error' => true,
                        'msg' => 'OTP Does Not Match.'
                    );
                } else if ($result == 'invalid_user') {
                    $array = array(
                        'error' => true,
                        'msg' => 'User Not 1Valid.'
                    );
                } else {
                    $session_data = array(
                        'this_update_email' => $result[0]->email,
                        'brw_logged_type' => $result[0]->role
                    );
                    $this->session->set_userdata($session_data);
                        $array = array(
                            'error' => false,
                            'msg' => 'Password Updated Successfully.'
                        );
                }
            }
        echo json_encode($array);
    }

    public function logout() {

        $data= array(
            'session_id'=>null,
            'status'=>0,
            'admin_logged_in'=>'false',
            'expire_time'=>DATE,
         );
          $this->common->update_table1('activity_logs',$data,'id',$this->session->userdata('lsd'));
          $this->db->select('*');
          $this->db->where('id',$this->session->userdata('lsd'));
          $this->db->from('activity_logs');
          $query = $this->db->get();
          $row = $query->row();
          $this->common->update_table1('login_history',$data,'user_id',$row->user_id);
        session_destroy();
        redirect('master');
    }

    public function logoutdevice($id) {
     

        $data= array(
           'session_id'=>null,
           'status'=>0,
           'admin_logged_in'=>'false',
           'expire_time'=>DATE,
        );
         $this->common->update_table1('activity_logs',$data,'id',$id);
         $this->db->select('*');
         $this->db->where('id',$id);
         $this->db->from('activity_logs');
         $query=$this->db->get();
         $row = $query->row();
         $this->common->update_table1('login_history',$data,'user_id',$row->user_id);
        
          redirect('loginhistory');
           }

    public function resend_otp() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('custotplogin', 'OTP', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'msg' => form_error('custotplogin')
            );
        } else {
            $data = array(
                'cust_login' => base64_decode($this->input->post('custotplogin')),
                'otptype' => $this->input->post('otptype')
            );
            $result = $this->login->resend_otp($data);
            if ($result == 'send_otp') {
                $array = array(
                    'error' => false,
                    'msg' => 'OTP Resend Sucessfully.'
                );
            } else if ($result == 'invalid_user') {
                $array = array(
                    'error' => true,
                    'msg' => 'invalid Customer.'
                );
            } else if ($result == 'three_time_use') {
                $array = array(
                    'error' => true,
                    'msg' => 'Resend OTP (Only 3 times).'
                );
            } else {
                $array = array(
                    'error' => true,
                    'msg' => 'invalid Customer.'
                );
            }
        }
        echo json_encode($array);
    }

    public function valid_password($password = '') {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 8) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32) {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }

    public function change_password1() {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[8]|callback_valid_password');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|callback_valid_password');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[new_password]');
            if ($this->form_validation->run() == FALSE) {
                $array = array(
                    'error' => 'true1',
                    'current_password_error' => form_error('current_password'),
                    'new_password_error' => form_error('new_password'),
                    'confirm_password_error' => form_error('confirm_password')
                );
            } else {
                $data = array(
                    'current_password' => $this->input->post('current_password'),
                    'new_password' => $this->input->post('new_password')
                );
                $result = $this->login->change_password($data);
                if ($result == 'wrong_password') {
                    $array = array(
                        'error' => true,
                        'msg' => ' Current Password incorrect.'
                    );
                } elseif ($result == 'invalid_user') {
                    $array = array(
                        'error' => true,
                        'msg' => 'User Not Valid.'
                    );
                } else {
                    $array = array(
                        'error' => false,
                        'msg' => 'Password Updated Successfully.'
                    );
                }
            }
        echo json_encode($array);
    }
    
    function call_post() {
        $data = $this->common->list1('user_login','id','1');
        echo json_encode($data);
    }
    
    function call_post_web() {
        $data = $this->common->list1('websetfront','id','1');
        echo json_encode($data);
    }

   
}
?>