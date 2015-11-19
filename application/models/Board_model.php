<?php
class Board_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function gets($category){
        $strQuery = "SELECT id, title, substring(content, 1, 255) as content, writer, postDate FROM members_board WHERE category = ".$category." ORDER BY id DESC LIMIT 4";

        return $this->db->query($strQuery)->result();
    }

    function getItem($index) {
         $strQuery = "SELECT id, category, title, content, attachment_org, attachment_file, writer, postDate, click FROM members_board WHERE id = ".$index;

        return $this->db->query($strQuery)->row();
    }

    function getBoard($category, $member){
        $strQuery = "SELECT id, category, title, writer, postDate, click FROM members_board WHERE category = ".$category." AND member = ".$member." ORDER BY id DESC";

        return $this->db->query($strQuery)->result();
    }

    function getAll($category){
        $strQuery = "SELECT id, title, content, writer, postDate FROM members_board WHERE category = ".$category." ORDER BY id DESC";

        return $this->db->query($strQuery)->result();
    }

    function getCountReply($index) {
        $strQuery = "SELECT COUNT(co_id) as count FROM comments WHERE board_id = ".$index;

        return $this->db->query($strQuery)->row();
    }

    function add($category, $title, $content, $writer, $member) {
 //   function add($category, $title, $content) {
        $this->db->set('postDate', 'CURRENT_TIMESTAMP()', false);
        $this->db->insert('members_board', array(
            'category'=>$category,
            'title'=>$title,
            'content'=>$content,
            'writer'=>$writer,
            'member'=>$member
        ));
        
        return $this->db->insert_id();
    }

    function addFile($category, $title, $content, $writer, $member, $attachment_org, $attachment_file) {
//    function addFile($category, $title, $content, $attachment_org, $attachment_file) {
        $this->db->set('postDate', 'CURRENT_TIMESTAMP()', false);
        $this->db->insert('members_board', array(
            'category'=>(int)$category,
            'title'=>$title,
            'content'=>$content,
            'writer'=>$writer,
            'member'=>$member,
            'attachment_org'=>$attachment_org,
            'attachment_file'=>$attachment_file
        ));
        
        return $this->db->insert_id();
    }
 
}
?>
