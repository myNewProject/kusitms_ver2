<?php
class Comments_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function getComments($board_id){
        $strQuery = "SELECT co_id, re_id, board_id, uid, nickname, postdate, comment, liker FROM comments WHERE board_id=".$board_id;
 
        return $this->db->query($strQuery)->result();
    }

    function getRecomments($board_id, $co_id) {
        $strQuery = "SELECT co_id, re_id, uid, nickname, postdate, comment, liker FROM comments WHERE board_id=".$board_id." AND re_id = ".$co_id;

        return $this->db->query($strQuery)->result();
    }

    function likeComment($index) {
        $strQuery = "UPDATE comments SET liker = liker+1 WHERE co_id=".$index;
        $this->db->query($strQuery);

        $strQuery = "SELECT liker FROM comments WHERE co_id=".$index;

        return $this->db->query($strQuery)->row();
    }
    
    public function addComment($board_id, $re_id, $userID, $nickname, $comment) {  
        // SQL injection 방지코드로 변경할 것
        if ($re_id === 0)
            $strQuery = "INSERT INTO comments (board_id, uid, nickname, comment) VALUES ('".$board_id."', '".$userID."', '".$nickname."', '".$comment."')";
        else 
            $strQuery = "INSERT INTO comments (board_id, re_id, uid, nickname, comment) VALUES ('".$board_id."', '".$re_id."', '".$userID."', '".$nickname."', '".$comment."')";
        return $this->db->query($strQuery);
    }
}
?>
