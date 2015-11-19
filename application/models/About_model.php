<?php
class About_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function get($category){
        $strQuery = "SELECT content, category FROM about_us WHERE category = ".$category;

        return $this->db->query($strQuery)->row();
    }

    function getBoard($category){
        $strQuery = "SELECT id, category, title, writer, postDate, click FROM about_us WHERE category = ".$category." ORDER BY id DESC";

        return $this->db->query($strQuery)->result();
    }

    function getAll(){
        $strQuery = "SELECT category, content FROM about_us";

        return $this->db->query($strQuery)->result();
    }

    function add_content($category, $content) {
        $this->db->insert('about_us', array(
                'category'=>$category,
                'content'=>$content
            ));
    }

    function set_content($category, $content) {
        $this->db->where('category', $category);
        $this->db->update('about_us', array(
                'content'=>$content
            ));
    }

    function add($category, $title, $content, $writer) {
 //   function add($category, $title, $content) {
        $this->db->set('postDate', 'CURRENT_TIMESTAMP()', false);
        $this->db->update('about_us', array(
            'category'=>$category,
            'title'=>$title,
            'content'=>$content,
            'writer'=>$writer
        ));
        
        return $this->db->insert_id();
    }

    function addFile($category, $title, $content, $writer, $attachment_org, $attachment_file) {
//    function addFile($category, $title, $content, $attachment_org, $attachment_file) {
        $this->db->set('postDate', 'CURRENT_TIMESTAMP()', false);
        $this->db->insert('about_us', array(
            'category'=>$category,
            'title'=>$title,
            'content'=>$content,
            'writer'=>$writer,
            'attachment_org'=>$attachment_org,
            'attachment_file'=>$attachment_file
        ));
        
        return $this->db->insert_id();
    }
 
}
?>
