<?php
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('category_model');
		/*
		if (!$this->input->is_cli_request()) {
			$this->load->library('session');
		}*/
	}

	public function _header($index) {

		$cMember = $this->users_model->get_current_member();
		$categories = $this->category_model->get_category($cMember->member);
		
		$this->load->view('main_header', array('member'=>$cMember->member, 'categories'=>$categories, 'pagenum'=>$index));
				
	}

	public function _footer($index) {
		switch ($index) {
			case 'main_footer':
				$this->load->view('main_footer');
				break;
			
			default:
				$this->load->view('footer');
				break;
		}
	}
}