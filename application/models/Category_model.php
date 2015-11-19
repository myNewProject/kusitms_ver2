<?php
class Category_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function get($main_category, $sub_category, $member){
        $strQuery = "SELECT title, path FROM category WHERE main_category = ".$main_category." AND sub_category =".$sub_category;

        return $this->db->query($strQuery)->row();
    }

    function get_category($member){
        $strQuery = "SELECT main_category, sub_category, title, path FROM category WHERE member=0 OR member = ".$member." ORDER BY main_category, sub_category";

        return $this->db->query($strQuery)->result();
    }

    function add_category($main_category, $sub_category, $title, $member) {
        $strQuery = "SELECT COUNT('sub_category') AS exist FROM 'category' WHERE main_category=1 AND sub_category=1 AND member=0";
        $result = $this->db->query($strQuery)->result();
        
        if ($result->exist = 0) {
            $this->db->insert('category', array(
                    'main_category'=>$main_category,
                    'sub_category'=>$sub_category,
                    'title'=>$title,
                    'member'=>$member
                ));
        }
    }

    function delete_category($main_category, $sub_category, $member) {
        $this->db->delete('category', array(
                'main_category'=>$main_category,
                'sub_category'=>$sub_category,
                'member'=>$member
            ));
    }

}
?>
