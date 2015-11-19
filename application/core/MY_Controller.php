<?php
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('category_model');
	}

	public function _header($index) {

		$categories = $this->category_model->get_category($cMember->member);
		
		$this->load->view('main_header', array('categories'=>$categories, 'pagenum'=>$index));
				
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