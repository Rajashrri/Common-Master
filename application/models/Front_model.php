<?php
class Front_model extends CI_Model
{
    function __construct()
    {
    }

    function list($tbl_name)
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }
    function list_order($tbl_name, $id, $order)
    {
        $this->db->select('*');
        $this->db->order_by($id, $order);
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }
    function count_all($tblname)
    {
        $this->db->select('*');
        $query = $this->db->get($tblname);
        return $query->num_rows();
    }

    function count($tbl_name)
    {
        $this->db->select('*');
        $this->db->from($tbl_name);
        echo $this->db->count_all_results();
    }

    function count_all2($where, $url, $tblcat, $tbl)
    {
        $this->db->select('id');
        $this->db->where($where, $url);
        $this->db->from($tblcat);
        $query = $this->db->get();
        $row = $query->row();

        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        // $this->db->from('blog');
        $query2 = $this->db->get($tbl);
        return $query2->num_rows();
    }
 //listwithlimitstatus
    function list_limit($tbl_name, $lmt, $sort_id, $order)
    {
        $this->db->select('*');
        $this->db->order_by($sort_id, $order);
        $this->db->limit($lmt);
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function FeaturedlimitListorderBy($tbl_name, $sort_id, $order, $featured, $id, $limit)
    {
        $this->db->select('*');
        $this->db->order_by($sort_id, $order);
        $this->db->where('status', '1');
        $this->db->where($featured, $id);
        $this->db->limit($limit);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }
    //listwithfeatured
    function frontlistwithfeatured($featured, $id,$order,$desc,$tbl){
        $this->db->select('*');
        $this->db->where('status','1');
        $this->db->where($featured, $id);
        $this->db->order_by($order,$desc);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }


    function details($id, $col, $tbl_name)
    {
        $this->db->select('*');
        $this->db->where($col, $id);
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function cat_with_data($tblcat, $tbl)
    {
        $query = "select * from $tblcat where status='1' AND id IN(select `category_id` from $tbl where status='1')";

        return $this->db->query($query)->result_array();
    }

    function Notcat_with_data($tblcat, $tbl)
    {
        $query = "select * from $tblcat where status=1 AND id NOT IN(select `category_id` from $tbl)";

        return $this->db->query($query)->result_array();
    }

    function insert_table($tbl_name, $data)
    {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }


    function single_details($tbl, $id, $val, $sort_id, $order_by)
    {
        $this->db->select($val);
        $this->db->where($id);
        $this->db->where('status', '1');
        $this->db->from($tbl);
        $this->db->order_by($sort_id, $order_by);
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value[$val];
        }
    }
  
    //pagination
    function fetch_detailsblog($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->where('status', '1');
        $this->db->order_by("date", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        foreach ($query->result() as $bl) {
            $newDate = date("d F Y", strtotime($bl->date));

            $output .= '
                <div class="col-12">
                    <div class="blog-listing">
                        <div class="blog-img">
                            <img src="' . base_url() . 'uploads/blog_feature_img/' . $bl->featured_image . '" class="img-fluid bg-img" alt="blog">
                            <a href="' . base_url() . 'blogs/' . $this->common->cat_name($bl->category_id, 'url', 'blogcategory') . '"><label>' . $this->common->cat_name($bl->category_id, 'category_name', 'blogcategory') . '</label></a>
                        </div>
                        <div class="blog-content">
                            <a data-cursor="pointer" class="main-title" href="' . base_url() . 'blog/' . $bl->url . '">' . $bl->title . '</a>
                            <p>' . $bl->shortdescription . ' </p>
                            <ul>
                                <li><img src="' . base_url() . 'template/front_assets/images/user/1.jpg" class="img-fluid avtar" alt="author"> ' . $bl->author_id . '
                                </li>
                                <li><i class="iconsax" data-icon="calendar-add"></i> ' . $newDate . '</li>
                            </ul>
                            <a data-cursor="pointer" class="btn-arrow" href="' . base_url() . 'blog/' . $bl->url . '">
                                <div class="icon-arrow"><i class="iconsax" data-icon="arrow-up"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.0711 10.3214C17.8811 10.3214 17.6911 10.2514 17.5411 10.1014L12.0011 4.56141L6.46109 10.1014C6.17109 10.3914 5.69109 10.3914 5.40109 10.1014C5.11109 9.81141 5.11109 9.33141 5.40109 9.04141L11.4711 2.97141C11.7611 2.68141 12.2411 2.68141 12.5311 2.97141L18.6011 9.04141C18.8911 9.33141 18.8911 9.81141 18.6011 10.1014C18.4611 10.2514 18.2611 10.3214 18.0711 10.3214Z" fill="#292D32"></path>
                                <path d="M12 21.2519C11.59 21.2519 11.25 20.9119 11.25 20.5019V3.67188C11.25 3.26188 11.59 2.92188 12 2.92188C12.41 2.92188 12.75 3.26188 12.75 3.67188V20.5019C12.75 20.9119 12.41 21.2519 12 21.2519Z" fill="#292D32"></path>
                                </svg>
                                </i></div>Read more
                            </a>
                        </div>
                    </div>
                </div>';
        }

        return $output;
    }

    public function fetch_detailsblogcat($limit, $start, $id)
    {
        $output = '';
        $this->db->select('id');
        $this->db->where('url', $id);
        $this->db->from('blogcategory');
        $query1 = $this->db->get();
        $row = $query1->row();

        $this->db->select("*");
        $this->db->from("blog");
        $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        $this->db->order_by("date", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        foreach ($query->result() as $bl) {
            $newDate = date("d F Y", strtotime($bl->date));

            $output .= ' 
                

                 <div class="col-12">
                    <div class="blog-listing">
                        <div class="blog-img">
                            <img src="' . base_url() . 'uploads/blog_feature_img/' . $bl->featured_image . '" class="img-fluid bg-img" alt="blog">
                            <a href="' . base_url() . 'blogs/' . $this->common->cat_name($bl->category_id, 'url', 'blogcategory') . '"><label>' . $this->common->cat_name($bl->category_id, 'category_name', 'blogcategory') . '</label></a>
                        </div>
                        <div class="blog-content">
                            <a data-cursor="pointer" class="main-title" href="' . base_url() . 'blog/' . $bl->url . '">' . $bl->title . '</a>
                            <p>' . $bl->shortdescription . ' </p>
                            <ul>
                                <li><img src="' . base_url() . 'template/front_assets/images/user/1.jpg" class="img-fluid avtar" alt="author"> ' . $bl->author_id . '
                                </li>
                                <li><i class="iconsax" data-icon="calendar-add"></i> ' . $newDate . '</li>
                            </ul>
                            <a data-cursor="pointer" class="btn-arrow" href="' . base_url() . 'blog/' . $bl->url . '">
                                <div class="icon-arrow"><i class="iconsax" data-icon="arrow-up"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0711 10.3214C17.8811 10.3214 17.6911 10.2514 17.5411 10.1014L12.0011 4.56141L6.46109 10.1014C6.17109 10.3914 5.69109 10.3914 5.40109 10.1014C5.11109 9.81141 5.11109 9.33141 5.40109 9.04141L11.4711 2.97141C11.7611 2.68141 12.2411 2.68141 12.5311 2.97141L18.6011 9.04141C18.8911 9.33141 18.8911 9.81141 18.6011 10.1014C18.4611 10.2514 18.2611 10.3214 18.0711 10.3214Z" fill="#292D32"></path>
                                        <path d="M12 21.2519C11.59 21.2519 11.25 20.9119 11.25 20.5019V3.67188C11.25 3.26188 11.59 2.92188 12 2.92188C12.41 2.92188 12.75 3.26188 12.75 3.67188V20.5019C12.75 20.9119 12.41 21.2519 12 21.2519Z" fill="#292D32"></path>
                                        </svg>
                                        </i></div>Read more
                            </a>
                        </div>
                    </div>
                </div> ';
        }
          return $output;
    }

    function commonlist($where,$id,$tbl){
        $this->db->select('*');
        $this->db->where($where,$id);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }
    
    
    //listforhomepagewithcategoryandnocategory
    function frontlist($order,$desc,$tbl,$tblcat,$page_name,$limit){
        if($this->db->field_exists('category_id',$tbl)){
        if($page_name == 'home'){
        if($this->db->field_exists('featured', $tbl)){
               $query = "select * from $tbl where status='1'AND featured='1' AND category_id IN(select `id` from $tblcat where status='1') limit $limit";
            }else{
                $query = "select * from $tbl where status='1' AND category_id IN(select `id` from $tblcat where status='1') limit $limit";
            }
             return $this->db->query($query)->result_array();
             
        }else{
            $query = "select * from $tbl where status='1' AND category_id IN(select `id` from $tblcat where status='1') ";
            return $this->db->query($query)->result_array(); 
        }
    }else{
        if($page_name == 'home'){
            if($this->db->field_exists('featured', $tbl)){
                  $this->db->select('*');
                  $this->db->where('status','1');
                  $this->db->where('fetaured','1');
                  $this->db->limit($limit);
                  $this->db->order_by($order,$desc);
                  $query =$this->db->get($tbl);
                  return $query->result_array(); 
                }else{
                    $this->db->select('*');
                    $this->db->where('status','1');
                    $this->db->limit($limit);
                    $this->db->order_by($order,$desc);
                    $query =$this->db->get($tbl);
                    return $query->result_array(); 
                }
               
                 
            }else{
                   $this->db->select('*');
                    $this->db->where('status','1');
                    $this->db->order_by($order,$desc);
                    $query = $this->db->get($tbl);
                return $query->result_array(); 
            }
     }
    }
    
    //forexixstingcategoryin blogsorevents
  
    //fordetailspagefetchdatabycategoryname
    function fetch_data_from_url($url,$where,$tblcat,$tbl) {
        $this->db->select('id');
        $this->db->where($where, $url);
        $this->db->where('status', '1');
        $this->db->from($tblcat);
        $query = $this->db->get();
        $row = $query->row();
       
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }
    function frontlistwithstatus($order,$desc,$tbl){
        $this->db->select('*');
        if($this->db->field_exists('status', $tbl))
        {
         $this->db->where('status','1');
        }
        $this->db->order_by($order,$desc);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    } 
    //for previous nad next blog or events
    function previous($id) {
        $this->db->select('*');
        $this->db->where('url >', $id);
        $this->db->order_by('url','Asc');
        $this->db->where('status', '1');
        $this->db->limit(1);
        $this->db->from('blog');
        return $this->db->get()->result_array();
    }
    function next($id) {
        $this->db->select('*');
        $this->db->where('url <', $id);
        $this->db->order_by('url','Desc');
        $this->db->where('status', '1');
        $this->db->limit(1);
        $this->db->from('blog');
        return $this->db->get()->result_array();
    }
    //recent blogs
    function recentnews($id,$tbl,$limit) {
        $this->db->select('*');
        $this->db->where('url !=', $id);
        $this->db->where('status', '1');
        $this->db->limit($limit);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }
  
 
        /////day's ago in php with date and time both 
    
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
    
        //day's ago in php with date 
        function timeago($date) {
            $timestamp = strtotime($date);	
            
            $strTime = array("second", "minute", "hour", "day", "month", "year");
            $length = array("60","60","24","30","12","10");
     
            $currentTime = time();
            if($currentTime >= $timestamp) {
                 $diff     = time()- $timestamp;
                 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                 $diff = $diff / $length[$i];
                 }
     
                 $diff = round($diff);
                 return $diff . " " . $strTime[$i] . "'s ago ";
            }
         }
}
?>