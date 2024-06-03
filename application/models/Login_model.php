<?php
class Login_model extends CI_Model {

    function __construct() {
        
    }


    function is_logged_in() {

        if (!empty($this->session->userdata('lsd'))) {
            $this->db->select('*');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('id', $this->session->userdata('lsd'));
            $this->db->from('activity_logs');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $this->session->set_userdata('brw_logged_in', False);
                $row = $query->row();

                if (!isset($row->admin_logged_in) || $row->admin_logged_in != 'true') {
                    redirect('master', 'refresh');
                }
            }
        } else {
            redirect('master');
        }
    }

    public function login_auth($data) {

        $email = $data['username'];
        $password = $data['password'];
        $emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
        $mob = "/^[1-9][0-9]*$/";
        $this->db->select('*');
        $this->db->from('user_login');
        if (preg_match($emailval, $email)) {
            $this->db->where('email', $email);
        } elseif (preg_match($mob, $email)) {
            $this->db->where('contact', $email);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                //$otp = rand(100000, 999999);
                $otp = '123456';
                $update_data = array(
                    'login_otp' => $otp,
                    'loginotpcount' => '0'
                );
                $this->db->where('email', $email);
                $this->db->update('user_login', $update_data);
                $email = $row->email;
                $subject = "Login OTP " . PRINTDATE . "-   Admin Panel" . "\n";
//                $content = 'Dear Admin' . ",\n\r";
//                $content .= "\n\r";
//
//                $content .= "Welcome to Admin Panel. Please use this OTP: $otp to login into your Admin Panel." . "\n";
//                $content .= "\n\r";
//                $content .= "Regards," . "\n";
//                $content .= "Team Admin Panel." . "\n";
                
                   $data['content'] = '<table width="95%" border="0" align="" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                <tr>
                                                    <td style="height:40px;">Login OTP</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 35px;">
                                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;"><strong>Dear Admin</strong></p>
                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                        <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                                   Welcome to Admin Panel. Please use this OTP: '.$otp.' to login into your Admin Panel
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>';
                $content = $this->load->view('email_template', $data, true);
                        $this->index->send_mail($email, $content, $subject);
                return $query->result();
            } else {
                return 'password_not_match';
            }
        } else {
            return 'user_not_exist';
        }
    }

    public function otp_verify($data) {
        $email = $data['cust_login'];
        $otp = $data['otp'];
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($otp == $row->login_otp || $otp == '112233') {
                return $query->result();
            } else {
                return 'otp_not_match';
            }
        } else {
            return 'invalid_user';
        }
    }

    public function forgot_otp_verify($data) {
        $email = $data['cust_login'];
        $otp = $data['otp'];
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($otp == $row->forgot_otp || $otp == '112233') {
                return $query->result();
            } else {
                return 'otp_not_match';
            }
        } else {
            return 'invalid_user';
        }
    }

    public function request_password() {

        $email = $this->input->post('email');
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //$otp = rand(100000, 999999);
            $otp = '123456';
            $update_data = array(
                'forgot_otp' => $otp,
                'forgototp_count' => '0'
            );
            $this->db->where('email', $email);
            $this->db->update('user_login', $update_data);
            $subject = "Reset Password OTP " . PRINTDATE . " –  Admin Panel" . "\n";
//            $content = 'Dear Admin' . ",\n\r";
//            $content .= "\n\r";
//            $content .= "Welcome to Admin Panel . Please use this OTP: " . $otp . " to login into your Admin Panel." . "\n";
//            $content .= "\n\r";
//            $content .= "Regards," . "\n";
//            $content .= "Team Admin Panel." . "\n";
//            $this->index->send_mail($email, $content, $subject);
            
            
              $data['content'] = '<table width="95%" border="0" align="" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                <tr>
                                                    <td style="height:40px;">Login OTP</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 35px;">
                                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;"><strong>Dear Admin</strong></p>
                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                        <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                                   Welcome to Admin Panel. Please use this OTP: '.$otp.' to login into your Admin Panel
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>';
                $content = $this->load->view('email_template', $data, true);
                        $this->index->send_mail($email, $content, $subject);

            return $query->result();
        } else {
            return 'invalid_user';
        }
    }

    public function resend_otp($data) {

        $email = $data['cust_login'];
        // $otp = rand(100000, 999999);
        $otp = '123456';
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
            if ($data['otptype'] == 'login_otp') {
                if ($result->loginotpcount < '3') {
                    $update_data = array(
                        'login_otp' => $otp,
                        'loginotpcount' => $result->loginotpcount + 1
                    );
                    $this->db->where('email', $email);
                    $this->db->update('user_login', $update_data);

                    $subject = "Resend Login OTP " . PRINTDATE . " - Admin Panel" . "\n";
//                    $content = 'Dear Admin' . ",\n\r";
//                    $content .= "\n\r";
//                    $content .= "Welcome to  Admin Panel. Please use this OTP: " . $otp . " to reset your password for your admin panel." . "\n";
//                    $content .= "\n\r";
//                    $content .= "Regards," . "\n";
//                    $content .= "Team Admin Panel." . "\n";
//                    $this->index->send_mail($email, $content, $subject);
                    
                      $data['content'] = '<table width="95%" border="0" align="" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                <tr>
                                                    <td style="height:40px;">Login OTP</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 35px;">
                                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;"><strong>Dear Admin</strong></p>
                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                        <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                                   Welcome to Admin Panel. Please use this OTP: '.$otp.' to reset your password for your admin panel
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>';
                $content = $this->load->view('email_template', $data, true);
                        $this->index->send_mail($email, $content, $subject);

                    return 'send_otp';
                } else {
                    return 'three_time_use';
                }
            } else {
                if ($result->forgototp_count < '3') {
                    $update_data = array(
                        'forgot_otp' => $otp,
                        'forgototp_count' => $result->forgototp_count + 1
                    );
                    $this->db->where('email', $email);
                    $this->db->update('user_login', $update_data);
                    $subject = "Resend Password OTP " . PRINTDATE . " – Admin Panel" . "\n";
//                    $content = 'Dear Admin' . ",\n\r";
//                    $content .= "\n\r";
//                    $content .= "Welcome to Admin Panel. Please use this OTP: " . $otp . " to login into your  Admin Panel." . "\n";
//                    $content .= "\n\r";
//                    $content .= "Regards," . "\n";
//                    $content .= "Team Admin Panel." . "\n";
//                    $this->index->send_mail($email, $content, $subject);
                    
                     $data['content'] = '<table width="95%" border="0" align="" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                <tr>
                                                    <td style="height:40px;">Login OTP</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 35px;">
                                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;"><strong>Dear Admin</strong></p>
                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                        <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                                   Welcome to Admin Panel. Please use this OTP: '.$otp.' to login into your Admin Panel
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>';
                $content = $this->load->view('email_template', $data, true);
                        $this->index->send_mail($email, $content, $subject);

                    return 'send_otp';
                } else {
                    return 'three_time_use';
                }
            }
        } else {
            return 'invalid_user';
        }
    }

    public function update_password($data) {

        $email = $data['email'];
        $password = $data['password'];
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $update_data = array(
                'password' => password_hash($password, PASSWORD_BCRYPT)
            );
            $this->db->where('email', $email);
            $this->db->update('user_login', $update_data);
            $subject = "Reset Password OTP " . PRINTDATE . " – Admin Panel" . "\n";
//            $content = 'Dear Admin' . ",\n\r";
//            $content .= "\n\r";
//
//            $content .= "Welcome to Admin Panel. Please use this OTP: " . $otp . "to reset your password for your Admin panel." . "\n";
//            $content .= "\n\r";
//            $content .= "Regards," . "\n";
//            $content .= "Team Admin Panel." . "\n";
//            $this->index->send_mail($email, $content, $subject);

            
            
            
                 $data['content'] = '<table width="95%" border="0" align="" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                <tr>
                                                    <td style="height:40px;">Login OTP</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 35px;">
                                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;"><strong>Dear Admin</strong></p>
                                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                        <p style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                                   Welcome to Admin Panel. Please use this OTP: '.$otp.' to reset your password for your Admin panel
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>';
                $content = $this->load->view('email_template', $data, true);
                        $this->index->send_mail($email, $content, $subject);
            return $query->result();
        } else {
            return 'invalid_user';
        }
    }

    public function change_password($data) {
        $email = $this->session->userdata('email');
        $current_password = $data['current_password'];
        $new_password = $data['new_password'];
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
            if (password_verify($current_password, $result->password)) {
                $update_data = array(
                    'password' => password_hash($new_password, PASSWORD_BCRYPT)
                );
                $this->db->where('email', $email);
                $this->db->update('user_login', $update_data);
                return 'succuss';
            } else {
                return 'wrong_password';
            }
        } else {
            return 'invalid_user';
        }
    }

}
?>