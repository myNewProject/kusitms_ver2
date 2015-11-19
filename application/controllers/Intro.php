<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Intro extends MY_Controller {

	private $main_category = array('name'=>'소 개', 'path'=>'/about');
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->_header('main_header');

		$this->load->view('main_body');

		$this->_footer('main_footer');
	}

	// 소개
	public function about($index = 'about') {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'학회 소개', 'path'=>'/about'));
		
		$this->content_show(1, $categories);

		$this->_footer('main_footer');
	}

	// 조직도
	public function organization() {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'조직도', 'path'=>'/organization'));
		
		$this->content_show(2, $categories);

		$this->_footer('main_footer');
	}

	// 운영진 구성
	public function management() {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'운영진 구성', 'path'=>'/management'));
		
		$this->content_show(3, $categories);

		$this->_footer('main_footer');
	}

	// 히스토리
	public function history() {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'히스토리', 'path'=>'/history'));
		
		$this->content_show(4, $categories);

		$this->_footer('main_footer');
	}

	// 정관
	public function aoa() {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'정관', 'path'=>'/aoa'));
		
		$this->content_show(5, $categories);

		$this->_footer('main_footer');
	}

	// CI
	public function ci() {
		$this->_header('intro');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'조직도', 'path'=>'/ci'));
		
		$this->content_show(6, $categories);
		
		$this->_footer('main_footer');
	}

	private function content_show($category_id, $categories) {
		$this->load->model('about_model');
		$content = $this->about_model->get($category_id);
		$this->load->view('intro_content', array('content'=>$content, 'categories'=>$categories));
	}

	// 소개글 수정용
	public function about_edit() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect($this->input->get('curl').'/#login_form');
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 없습니다');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('about_model');
		
		$this->about_model->set_content($this->input->get('page'), $this->input->post('edit_content'));
		// ajax 유도
		$this->about_content();

		//redirect(site_url('/Hello')."/about");
	}

	// ajax로 컨텐츠 하나씩 가져옴 
	public function about_content() {
		$this->load->model('about_model');

		switch ($this->input->get('page')) {
		 	case '1':
		 		$content = $this->about_model->get('1');
		 		echo $content->content;

		 		break;
		 	case '2':
		 		$content = $this->about_model->get('2');
		 		echo $content->content;
		 		
		 		break;
		 	case '3':
		 		$content = $this->about_model->get('3');
		 		echo $content->content;
		 		
		 		break;
			case '4':
		 		$content = $this->about_model->get('4');
		 		echo $content->content;
		 		
		 		break;
			case '5':
		 		$content = $this->about_model->get('5');
		 		echo $content->content;
		 		
		 		break;
			case '6':
		 		$content = $this->about_model->get('6');
		 		echo $content->content;
		 		
		 		break;

		 	default:
		 		# code...
		 		break;
		}
	}

}
?>
