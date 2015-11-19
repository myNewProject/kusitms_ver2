<?php
class Notice_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function gets($category){
        $strQuery = "SELECT id, title, substring(content, 1, 255) as content, writer, postDate FROM notice_board WHERE category = ".$category." ORDER BY id DESC LIMIT 4";

        return $this->db->query($strQuery)->result();
    }

    function getItem($index) {
        $get_click = $this->db->get_where('notice_board', array('id'=> $index))->row();
        $instQuery = $this->db->update('notice_board', array('click'=>$get_click->click+1), array('id'=>$index));
        
         $strQuery = "SELECT id, category, title, content, attachment_org, attachment_file, writer, postDate, click FROM notice_board WHERE id = ".$index;

        return $this->db->query($strQuery)->row();
    }

    function getBoard($category){
        $strQuery = "SELECT id, category, title, writer, postDate, click FROM notice_board WHERE category = ".$category." ORDER BY id DESC";

        return $this->db->query($strQuery)->result();
    }

    function getAll($category){
        $strQuery = "SELECT id, title, content, writer, postDate FROM notice_board WHERE category = ".$category." ORDER BY id DESC";

        return $this->db->query($strQuery)->result();
    }
    
    function getCountReply($index) {
        $strQuery = "SELECT COUNT(co_id) as count FROM comments WHERE board_id = ".$index;

        return $this->db->query($strQuery)->row();
    }


    function add($category, $title, $content, $writer) {
 //   function add($category, $title, $content) {
        $this->db->set('postDate', 'CURRENT_TIMESTAMP()', false);
        $this->db->insert('notice_board', array(
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
        $this->db->insert('notice_board', array(
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
