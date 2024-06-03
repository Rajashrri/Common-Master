<?php
class Index_model extends CI_Model
{

    function __construct()
    {
    }

    function generateRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function activity_log($activity)
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $browser_details = $this->get_Browser_detail();
        $data = array(
            'ip_address' => $this->ipCheck(),
            'useragent' => $browser_details['userAgent'],
            'name' => $browser_details['name'],
            'version' => $browser_details['version'],
            'platform' => $browser_details['platform'],
            'logintime' => $this->session->userdata('user_id'),
            'user_id' => $this->session->userdata('user_id'),
            'account_name' => $this->session->userdata('name'),
            'session_id' => $this->session->userdata('token'),
            'logintime' => $this->session->userdata('logintime'),
            'activity' => $activity,
            'page_url' => $url,
            'landing_page' => $url,
            'exit_url' => $url,
            'admin_logged_in' => 'true',
            'status' => 1,
            'createdDate' => DATE,
        );
        $this->db->insert('login_history', $data);
        //  $lsid= $this->db->insert_id();
        //    $this->session->set_userdata('lsid',$lsid);
    }

    function activity_insert()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $browser_details = $this->get_Browser_detail();
        $data = array(
            'ip_address' => $this->ipCheck(),
            'useragent' => $browser_details['userAgent'],
            'name' => $browser_details['name'],
            'version' => $browser_details['version'],
            'platform' => $browser_details['platform'],
            'logintime' => $this->session->userdata('user_id'),
            'user_id' => $this->session->userdata('user_id'),
            'account_name' => $this->session->userdata('name'),
            'session_id' => $this->session->userdata('token'),
            'logintime' => $this->session->userdata('logintime'),
            'status' => 1,
            'page_url' => $url,
            'device' => $url,
            'landing_page' => $url,
            'admin_logged_in' => 'true',
            'createdDate' => DATE,
        );
        $this->db->insert('activity_logs', $data);
        $lastid = $this->db->insert_id();

        $this->session->set_userdata('lsd', $lastid);
    }

    function activity_update()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $browser_details = $this->get_Browser_detail();
        $data = array(
            'ip_address' => $this->ipCheck(),
            'useragent' => $browser_details['userAgent'],
            'name' => $browser_details['name'],
            'version' => $browser_details['version'],
            'platform' => $browser_details['platform'],
            'logintime' => $this->session->userdata('user_id'),
            //'user_id' => $this->session->userdata('user_id'),
            'account_name' => $this->session->userdata('name'),
            //'session_id' => $this->session->userdata('token'),
            'logintime' => $this->session->userdata('logintime'),
            //'activity' => $activity,
            'page_url' => $url,
            'createdDate' => DATE,
        );
        $this->common->update_table1('activity_logs', $data, 'id', $this->session->userdata('lsd'));
    }

    function ipCheck()
    {
        $domain = $_SERVER['HTTP_HOST'];
        if ($domain != 'localhost') {
            if (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_X_FORWARDED')) {
                $ip = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                $ip = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
                $ip = getenv('HTTP_FORWARDED');
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } else {
            $ip = '127.0.0.1';
        }
        return $ip;
    }

    function get_Browser_detail()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/OPR/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        } elseif (preg_match('/Edge/i', $u_agent)) {
            $bname = 'Edge';
            $ub = "Edge";
        } elseif (preg_match('/Trident/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );
    }

    public function send_mail($reciever, $mail_message, $mail_subject)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('id', '1');
        $query = $this->db->get();
        $row = $query->row();
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_host'] = $row->smtp_host;
        $config['smtp_port'] = $row->smtp_port;
        $config['smtp_user'] = $row->smtp_user;
        $config['smtp_pass'] = $row->smtp_pass;
        $config['newline'] = "\r\n";
        $config['validation'] = FALSE;
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $this->email->initialize($config);
        $this->email->from('digihost2021@gmail.com', 'JOCO');
        $this->email->to($reciever);

        $this->email->subject($mail_subject);
        $this->email->message($mail_message);

        $send = $this->email->send();
        if ($send) {
            return 1;
        } else {
            return 0;
            $error = $this->email->print_debugger(array('headers'));
            echo json_encode($error);
        }
    }
}
