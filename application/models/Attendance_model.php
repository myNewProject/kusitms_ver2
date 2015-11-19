<?php
class Attendance_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function getAll($member){
        $strQuery = "SELECT user_id, check_in, week, edit_time FROM attendance_board WHERE member=".$member." ORDER BY user_id DESC, week DESC";
 
        return $this->db->query($strQuery)->result();
    }

    function get($member, $id) {
        $strQuery = "SELECT user_id, check_in, week, edit_time FROM attendance_board WHERE member=".$member." AND user_id=".$id." ORDER BY week DESC" ;

        return $this->db->query($strQuery)->result();
    }
 
    function attend($member, $id, $week, $check_in){   // 출석 확인(check_in : 1(출석) 2(지각))
        $this->db->set('edit_time', 'CURRENT_TIMESTAMP()', false);
        $this->db->insert('attendance_board', array(
            'user_id'=>$id,
            'check_in'=>$check_in,
            'member'=>$member,
            'week'=>(int)$week
        ));
        
        return $this->db->insert_id();
    }

}
?>