<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Attendance extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		redirect(site_url('/KusitmsErrorPage'));
	}	

	public function attend_form() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect($this->input->get('curl').'/#login_form');
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 필요합니다.');
			redirect($this->input->get('curl'));
		}

		$this->_header('main-header');

		$this->load->model('attendance_model');
		$this->load->model('users_model');
		$member = $this->users_model->get_man_member($this->session->userdata('userid')); // 로그인 한사람의 기수
		$attend_result = $this->attendance_model->getAll($member); // 해당기수 출석부 보기

		$this->load->view('attendance', array('member'=>$member, 'attend_result'=>$attendent));
		
		$this->_footer('main-footer');
	}

	// 출석 관리자
	public function admin() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect($this->input->get('curl').'/#login_form');
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 필요합니다.');
			redirect($this->input->get('curl'));
		}

		$this->_header('main-header');

		$this->load->model('attendance_model');
		$this->load->model('users_model');
		$member = $this->users_model->get_man_member($this->session->userdata('userid')); // 로그인 한사람의 기수
		$attend_result = $this->attendance_model->getAll($member); // 해당기수 출석부 보기
		
		// 출석부 보기
		$attendent = "";
		$attend = array_pop($attend_result);

		while (!empty($attend_result)) {
			for ($i=0; $i<13; $i++) {
				if ($i==0) {
					$attendent .= "<tr><td>".$this->users_model->get_name($attend->user_id)[0]->name."</td>"; 
				} else {
					if (empty($attend->week)) {
						$attendent .= "<td>x</td>";
					} else if ($attend->week != $i) {
						$attendent .= "<td>x</td>";
					} else {
						$attendent .= "<td>".$attend->check_in."</td>";
						$attend = array_pop($attend_result);
					}
				}

				if ($i == 12) {
					$attendent .= "</tr>";
				}
			}
		}

		$this->load->view('attendance_admin', array('member'=>$member, 'attend_result'=>$attendent));
		
		$this->_footer('main-footer');
	}

	public function check() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect($this->input->get('curl').'/#login_form');
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 필요합니다.');
			redirect($this->input->get('curl'));
		}

		$this->_header('main-header');

		$this->load->model('attendance_model');
		$this->load->model('users_model');
		$member = $this->users_model->get_man_member($this->session->userdata('userid')); // 로그인 한사람의 기수
		$attend_result = $this->attendance_model->get($member, $this->session->userdata('userid')); // 해당기수 출석부 보기
		
		// 출석부 보기
		$attendent = "";
		$attend = array_pop($attend_result);

		// 출석부 만들기
			// 13개의 열 생성
			for ($i=0; $i<13; $i++) {
				if ($i==0) { // 첫번째는 이름
					$attendent .= "<tr><td>".$this->users_model->get_name($attend->user_id)[0]->name."</td>"; 
				} else { // 나머지는 출석 상태
					if (empty($attend->week)) { // 출석정보가 없다면(하지않은 주차)
						$attendent .= "<td>x</td>";
					} else if ($attend->week != $i) { // 출석하지 않았다면
						$attendent .= "<td>x</td>";
					} else { // 출석 했다면
						$attendent .= "<td>".$attend->check_in."</td>";
						$attend = array_pop($attend_result);
					}
				}

				if ($i == 12) { // 다음 사람으로 넘어가기 위해
					$attendent .= "</tr>";
				}
			}
		

		$this->load->view('attendance_man', array('member'=>$member, 'attend_result'=>$attendent));
		
		$this->_footer('main-footer');
	}
	public function test() {
		$this->load->model('users_model');
		$test = $this->users_model->get_last_id();
		echo $test[0]->last_id;

	}

	private function attend() {
		$this->load->model('attendance_model');
		$this->load->model('users_model');
		
		$member = $this->users_model->get_man_member($this->session->userdata('userid'));
		$result = $this->attendance_model->attend(
			$member, 
			$this->input->post('user_id'), 
			$this->input->post('week'),
			$this->input->post('check_in'));
		
		return $result;
	}
}
?>