<?php
class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function view1() {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('id', '1');
        return $this->db->get()->result_array();
    }

    //update function with  2 where condition
    function update_table2($tbl_name, $data, $column_name, $id, $column_name1, $id1) {
        $this->db->where($column_name, $id);
        $this->db->where($column_name1, $id1);
        $this->db->update($tbl_name, $data);
        return $this->db->affected_rows();
    }

    //to get clean url 
    function cleanStr($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string);  // Replaces multiple hyphens with single one.
        $string = strtolower($string);
        return $string;
    }

    //to get single data from different table using id 
    function cat_name($id, $column_name, $tbl_name) {
        $this->db->select($column_name);
        $this->db->where('id', $id);
        $this->db->from($tbl_name);
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value[$column_name];
        }
    }

    //insert 
    function insert_table($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    //update table by id 
    function update_table($tbl_name, $data, $id) {
        $this->db->where('id', $id);
        $this->db->update($tbl_name, $data);
        return $this->db->affected_rows();
    }

    //list 
    function list($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    //list with status as active 
    function list2($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    //list with where condition 
    function list1($tbl_name, $column_name, $fetch_id) {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->where($column_name, $fetch_id);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    //to get the category in category and subcategory stored in one table 
    function subcat($tbl) {
        $this->db->select('*');
        $this->db->where('category_id', '0');
        $this->db->where('status', '1');
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }

    //count all data 
    function count($tbl_name) {
        $this->db->select('*');
        $this->db->from($tbl_name);
        return  $this->db->count_all_results();
    }

    //count monthwise data 
    function count_month($tbl_name) {
        $this->db->select('*');
        $this->db->where('MONTH(date)', date('m'));
        $this->db->from($tbl_name);
        echo $this->db->count_all_results();
    }

    //to check data exist or not in edit functionality 
    function check_unique_order_no($order_no, $tbl_name, $column_name, $id = '') {
        $this->db->where($column_name, $order_no);
        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($tbl_name)->num_rows();
    }

    //fetch data in row 
    function fetch_data($id, $tbl_name) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from($tbl_name);
        return $this->db->get()->row();
    }

    //to get data in edit page 
    function view($tbl_name, $id) {
        $this->db->select('*');
        $this->db->where('id', $id);

        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    //to change multiple data status 
    public function statusall12($id, $data, $tbl) {
        $this->db->where_in('category_id', $id);
        $this->db->update($tbl, $data);
    }

    //update data with 1 where condition 
    function update_table1($tbl_name, $data, $column_name, $id) {
        $this->db->where($column_name, $id);
        $this->db->update($tbl_name, $data);
        return $this->db->affected_rows();
    }

    //delete data with 1 where condition
    function delete_table1($tbl_name, $column_name, $id) {
        $this->db->where($column_name, $id);
        $this->db->delete($tbl_name);
    }

    //delete data with 1 where condition
    function delete_table2($tbl_name, $column_name, $id, $column_name1, $id1) {
        $this->db->where($column_name, $id);
        $this->db->where($column_name1, $id1);

        $this->db->delete($tbl_name);
    }

    //delete data 
    function delete_table($tbl_name, $id) {
        $this->db->where('id', $id);
        $this->db->delete($tbl_name);
    }

    //while deleting multiple data, the data which is stored in url redirections also gets deleted using this function  
    public function deleteAllredirection($id, $id2, $tbl) {
        $this->db->where_in('column_id', $id);
        $this->db->where_in('type', $id2);
        $this->db->delete($tbl);
    }

    //deleting multiple data 
    public function deleteAll($id, $tbl,$where) {
        $this->db->where_in($where, $id);
        $this->db->delete($tbl);
    }

    
    public function statusall($id, $data, $tbl,$where) {
        $this->db->where_in($where, $id);
        $this->db->update($tbl, $data);
    }

    //category subcategory on change data 
    function getSubcategoryDependency($postData, $column_name1, $column_name3, $tbl_name) {
        $response = array();
        $this->db->select($column_name1);
        $this->db->where($column_name3, $postData[$column_name3]);
        $this->db->where('status', '1');

        $q = $this->db->get($tbl_name);
        $response = $q->result_array();

        return $response;
    }

    public function upload_image($image_data, $num, $path1) {
        $image = md5(date("d-m-y:h:i s")) . "_" . $num;
        if (is_array($image_data)) {
            $file_name = pathinfo(@$image_data['name'], PATHINFO_FILENAME);
            $extension = pathinfo(@$image_data['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file(@$image_data['tmp_name'], $path1 . '' . $image . '.' . $extension)) {
                $image = $image . '.' . $extension;
            } else {
                $image = Null;
            }
        }
        return $image;
    }

    public function role() {
        $this->db->select('*');
        $this->db->where('role !=', 'admin');
        $this->db->order_by('id', 'desc');
        $this->db->from('user_login');
        return $this->db->get()->result_array();
    }

    public function adminpriset1($id) {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->from('privilege');
        return $this->db->get()->result_array();
    }

    public function adminpriset($a, $id) {
        $this->db->select('*');
        $this->db->where($a, 1);
        $this->db->where('user_id', $id);
        $this->db->from('admin_panel_setup');
        $result = $this->db->get();
        return $result;
    }

    //need to rewrite this 
    public function un($id, $tbl) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from($tbl);
        $query = $this->db->get();
        return $query;
    }

    public function subside($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('role!=', 'admin');
        $this->db->from('user_login');
        $query = $this->db->get();
        return $query;
    }

    function selectivename($id, $select, $tblname) {
        $this->db->select($select);
        $this->db->where('id', $id);
        $this->db->from($tblname);
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value[$select];
        }
    }

    function selectivename2($id, $select, $tblname, $w) {
        $this->db->select($select);
        $this->db->where($w, $id);
        $this->db->from($tblname);
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value[$select];
        }
    }

    public function eachcheckpri($a, $role) {
        $this->db->select('*');
        $this->db->from('privilege');
        $this->db->where($a, 1);
        $this->db->where('user_id', $role);
        $query = $this->db->get();
        return $query;
    }

    //bulkimport
    public function getRows($tb, $params = array()) {
        $this->db->select('*');
        $this->db->from($tb);

        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params)) {
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        return $result;
    }

    public function chksub($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->from('user_login');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 'already_exists';
        } else {
            return $query;
        }
    }

    public function checkpripage($input, $id) {
        $this->db->select('*');
        $this->db->where('user_id', 'admin');
        $this->db->from('privilege');
        $query = $this->db->get()->result_array();
        foreach ($query as $row):
            $this->db->select('*');
            if ($row['addf'] == 1) {
                $this->db->where('addf', 1);
                $this->db->where('editf', 1);
                $this->db->where('delf', 1);
                $this->db->where('listf', 1);
            }
            if ($row['addcf'] == 1) {
                $this->db->where('addcf', 1);
                $this->db->where('editcf', 1);
                $this->db->where('delcf', 1);
                $this->db->where('catf', 1);
            }
            if ($row['addv'] == 1) {
                $this->db->where('addv', 1);
                $this->db->where('editv', 1);
                $this->db->where('delv', 1);
                $this->db->where('listv', 1);
            }
            if ($row['addcv'] == 1) {
                $this->db->where('addcv', 1);
                $this->db->where('editcv', 1);
                $this->db->where('delcv', 1);
                $this->db->where('catv', 1);
            }
            if ($row['addp'] == 1) {
                $this->db->where('addp', 1);
                $this->db->where('editp', 1);
                $this->db->where('delp', 1);
                $this->db->where('listp', 1);
            }
            if ($row['addscp'] == 1) {
                $this->db->where('addscp', 1);
                $this->db->where('editscp', 1);
                $this->db->where('delscp', 1);
                $this->db->where('subcatp', 1);
            }
            if ($row['addb'] == 1) {
                $this->db->where('addb', 1);
                $this->db->where('editb', 1);
                $this->db->where('delb', 1);
                $this->db->where('listb', 1);
            }
            if ($row['addcb'] == 1) {
                $this->db->where('addcb', 1);
                $this->db->where('editcb', 1);
                $this->db->where('delcb', 1);
                $this->db->where('catb', 1);
            }
            if ($row['adds'] == 1) {
                $this->db->where('adds', 1);
                $this->db->where('edits', 1);
                $this->db->where('dels', 1);
                $this->db->where('lists', 1);
            }
            if ($row['addscs'] == 1) {
                $this->db->where('addscs', 1);
                $this->db->where('editscs', 1);
                $this->db->where('delscs', 1);
                $this->db->where('subcats', 1);
            }
            if ($row['adde'] == 1) {
                $this->db->where('adde', 1);
                $this->db->where('edite', 1);
                $this->db->where('dele', 1);
                $this->db->where('liste', 1);
            }
            if ($row['addce'] == 1) {
                $this->db->where('addce', 1);
                $this->db->where('editce', 1);
                $this->db->where('delce', 1);
                $this->db->where('cate', 1);
            }
            if ($row['addj'] == 1) {
                $this->db->where('addj', 1);
                $this->db->where('editj', 1);
                $this->db->where('delj', 1);
                $this->db->where('listj', 1);
            }
            if ($row['addcj'] == 1) {
                $this->db->where('addcj', 1);
                $this->db->where('editcj', 1);
                $this->db->where('delcj', 1);
                $this->db->where('catj', 1);
            }
            if ($row['addn'] == 1) {
                $this->db->where('addn', 1);
                $this->db->where('editn', 1);
                $this->db->where('deln', 1);
                $this->db->where('listn', 1);
            }
            if ($row['addcn'] == 1) {
                $this->db->where('addcn', 1);
                $this->db->where('editcn', 1);
                $this->db->where('delcn', 1);
                $this->db->where('catn', 1);
            }
            if ($row['addg'] == 1) {
                $this->db->where('addg', 1);
                $this->db->where('editg', 1);
                $this->db->where('delg', 1);
                $this->db->where('listg', 1);
            }
            if ($row['addcg'] == 1) {
                $this->db->where('addcg', 1);
                $this->db->where('editcg', 1);
                $this->db->where('delcg', 1);
                $this->db->where('catg', 1);
            }
            if ($row['addtest'] == 1) {
                $this->db->where('addtest', 1);
                $this->db->where('edittest', 1);
                $this->db->where('deltest', 1);
                $this->db->where('listest', 1);
            }
            if ($row['addct'] == 1) {
                $this->db->where('addct', 1);
                $this->db->where('editct', 1);
                $this->db->where('delct', 1);
                $this->db->where('listct', 1);
            }
            if ($row['addpd'] == 1) {
                $this->db->where('addpd', 1);
                $this->db->where('editpd', 1);
                $this->db->where('delpd', 1);
                $this->db->where('listpd', 1);
            }
            if ($row['addt'] == 1) {
                $this->db->where('addt', 1);
                $this->db->where('editt', 1);
                $this->db->where('delt', 1);
                $this->db->where('listt', 1);
            }
            if ($row['addlink'] == 1) {
                $this->db->where('addlink', 1);
                $this->db->where('editlink', 1);
                $this->db->where('dellink', 1);
                $this->db->where('link', 1);
            }
            $this->db->where('id', $id);
            $this->db->from('privilege');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $delete_data['allpri'] = 1;
                $this->common->update_table('privilege', $delete_data, $id);
            }
        endforeach;
    }

    //For Dashboard analytics
    function visitorDates($date1, $date2) {
        $dates = array();
        $current = strtotime($date1);
        $datetwo = strtotime($date2);
        $stepVal = '+1 day';
        if ($date1 == $date2) {
            $dates = array('00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00',
                '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00');
        } else {
            $format = 'Y-m-d';
            while ($current <= $datetwo) {
                $dates[] = date($format, $current);
                $current = strtotime($stepVal, $current);
            }
        }
        return $dates;
    }

    function pageviewDates($date1, $date2) {
        $dates = array();
        $current = strtotime($date1);
        $datetwo = strtotime($date2);
        $stepVal = '+1 day';
        if ($date1 == $date2) {
            $dates = array('00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00',
                '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00');
        } else {
            $format = 'M d';
            while ($current <= $datetwo) {
                $dates[] = date($format, $current);
                $current = strtotime($stepVal, $current);
            }
        }
        return $dates;
    }

    function pageviewDatesCounts($date1, $date2, $data) {
        $dates = array();
        $current = strtotime($date1);
        $datetwo = strtotime($date2);
        $stepVal = '+1 day';

        if ($date1 == $date2) {
            $dates = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12',
                '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23');
            foreach ($dates as $time) {
                if (!empty($data[$time])) {
                    $counts[] = $data[$time];
                } else {
                    $counts[] = '0';
                }
            }
        } else {
            $format = 'Y-m-d';
            while ($current <= $datetwo) {
                $dates = date($format, $current);
                if (!empty($data[$dates])) {
                    $counts[] = $data[$dates];
                } else {
                    $counts[] = '0';
                }
                $current = strtotime($stepVal, $current);
            }
        }
        return $counts;
    }

    function visitorDatesCounts($date1, $date2, $data) {
        $dates = array();
        $current = strtotime($date1);
        $datetwo = strtotime($date2);
        $stepVal = '+1 day';
        if ($date1 == $date2) {
            $dates = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12',
                '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23');
            foreach ($dates as $time) {
                if (!empty($data[$time])) {
                    $counts[] = $data[$time];
                } else {
                    $counts[] = '0';
                }
            }
        } else {
            $format = 'Y-m-d';
            while ($current <= $datetwo) {
                $dates = date($format, $current);
                if (!empty($data[$dates])) {
                    $counts[] = $data[$dates];
                } else {
                    $counts[] = '0';
                }
                $current = strtotime($stepVal, $current);
            }
        }
        return $counts;
    }

    function analitics_data($data, $from, $to) {
        $url = "https://digihostsolutions.com/analytics-platform/public/api/v1/stats/1?name=" . $data . "&from=" . $from . "&to=" . $to . "";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer 8ci5TeTw3UrvRbxDwNPNXHokZwFbFGod9SDGX0y0SBIxL5c7jmFqhuKAKR4ylFN1",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        if (!$resp) {
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        // return $resp;
        $fetch_var = '';
        $result = json_decode($resp, true);
        if (is_array($result) || is_object($result)) {

            $finaldata = $result['data'];
        } else {
            $fetch_var = 'Data not found';
        }
        return $finaldata;
        // 	echo json_encode($fetch_var);
    }

    function created_date() {
        $url = "https://digihostsolutions.com/analytics-platform/public/api/v1/websites";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer 8ci5TeTw3UrvRbxDwNPNXHokZwFbFGod9SDGX0y0SBIxL5c7jmFqhuKAKR4ylFN1",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        if (!$resp) {
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        $fetch_var = '';
        $result = json_decode($resp, true);
        if (is_array($result) || is_object($result)) {
            $finaldata = $result['data'];
            foreach ($finaldata as $dat_details) {
                $fetch_var = date('Y-m-d', strtotime($dat_details['created_at']));
            }
        } else {
            $fetch_var = 'Data not found';
        }
        return $fetch_var;
    }
}
?>