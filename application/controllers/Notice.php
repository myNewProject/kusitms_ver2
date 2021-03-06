<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Notice extends MY_Controller {

	private $main_category = array('name'=>'공지사항', 'path'=>'/notice');

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		redirect(site_url('/Notice/main_notice'));
	}	

	public function main_notice() {		// 공지사항
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'전체 공지', 'path'=>'/main_notice'));

		
		$this->load->model('notice_model');
		
		// 교육일정
		$_eduSchedule = $this->get_notice_intro(1);

		// 학회 공지사항
		$_notice = $this->get_notice_intro(2);

		// 멘토링 공지
		$_mento = $this->get_notice_intro(3);

		// 동문회 공지
		$_diary = $this->get_notice_intro(4);

		// 언론보도
		$_extraBoard = $this->get_notice_intro(5);
		
		$this->load->view('notice_main', array('categories'=>$categories, '_eduSchedule'=>$_eduSchedule, '_mento'=>$_mento, '_diary'=>$_diary, '_notice'=>$_notice, '_extraBoard'=>$_extraBoard));

		$this->_footer('main_footer');
	}

	public function edu_schedule() {
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'교육 일정', 'path'=>'/edu_schedule'));

		$this->load->model('notice_model');  // Model 가져오기

		// 교육일정 가져오기
		$all_result = $this->notice_model->getBoard(1);
		$result = $this->make_board($all_result, 'edu_schedule');

		$this->load->view('notice_content', array('categories'=>$categories, '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));

		$this->_footer('main_footer');
	}

	public function kusitms_notice() {
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'학회 공지', 'path'=>'/kusitms_notice'));

		$this->load->model('notice_model');  // Model 가져오기

		// 교육일정 가져오기
		$all_result = $this->notice_model->getBoard(2);
		$result = $this->make_board($all_result, 'kusitms_notice');

		$this->load->view('notice_content', array('categories'=>$categories, '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));

		$this->_footer('main_footer');
	}

	public function abroad_notice() {
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'언론보도', 'path'=>'/abroad_notice'));

		$this->load->model('notice_model');  // Model 가져오기

		// 교육일정 가져오기
		$all_result = $this->notice_model->getBoard(3);
		$result = $this->make_board($all_result, 'abroad_notice');

		$this->load->view('notice_content', array('categories'=>$categories, '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));

		$this->_footer('main_footer');
	} 

	public function diary() {
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'활동일지', 'path'=>'/diary'));

		$this->load->model('notice_model');  // Model 가져오기

		// 교육일정 가져오기
		$all_result = $this->notice_model->getBoard(4);
		$result = $this->make_board($all_result, 'diary');

		$this->load->view('notice_content', array('categories'=>$categories, '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));

		$this->_footer('main_footer');
	} 

	public function notice_item($index) {
		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$this->load->model('notice_model');  // Model 가져오기
		$notice_item = $this->notice_model->getItem($index); // 공지글 가져오기

		switch ($notice_item->category) {
		 	case 1:
		 		$categories += array('sub-category'=>array('name'=>'교육 일정', 'path'=>'/edu_schedule'));

				// 교육일정 가져오기
				$all_result = $this->notice_model->getBoard(1);
				$result = $this->make_board($all_result, 'edu_schedule');
		 		break;
		 	case 2:
		 		$categories += array('sub-category'=>array('name'=>'학회 공지', 'path'=>'/kusitms_notice'));
		 		
				// 교육일정 가져오기
				$all_result = $this->notice_model->getBoard(2);
				$result = $this->make_board($all_result, 'kusitms_notice');
		 		break;
		 	case 3:
		 		$categories += array('sub-category'=>array('name'=>'언론보도', 'path'=>'/abroad_notice'));
		 		
				// 교육일정 가져오기
				$all_result = $this->notice_model->getBoard(3);
				$result = $this->make_board($all_result, 'abroad_notice');
		 		break;
		 	case 4:
		 		$categories += array('sub-category'=>array('name'=>'활동일지', 'path'=>'/diary'));
		 		
				// 교육일정 가져오기
				$all_result = $this->notice_model->getBoard(4);
				$result = $this->make_board($all_result, 'diary');
		 		break;
		 	default:
		 		$categories += array('sub-category'=>array('name'=>'교육 일정', 'path'=>'/edu_schedule'));
		 		
				// 교육일정 가져오기
				$all_result = $this->notice_model->getBoard(1);
				$result = $this->make_board($all_result, 'edu_schedule');
		 		break;
		 }

		$comments = $this->getComments($index);
		$reply_count = $this->notice_model->getCountReply($index);

		$this->load->view('notice_item', array('categories'=>$categories, 'notice_item'=>$notice_item,  'comments'=>$comments, 'reply_count'=>$reply_count->count));

		$this->_footer('main_footer');

	}

	public function add_form() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect($this->input->get('curl').'/#login_form');
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 없습니다');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->_header('notice');

		// 현재 카테고리 위치 가져오기
		$categories = array('main-category'=>$this->main_category);

		$categories += array('sub-category'=>array('name'=>'공지 작성', 'path'=>'/diary'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('notice_add', '본문', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('notice_add', array('categories'=>$categories));
		} else {
			$this->load->model('notice_model');

			if (! $file = $this->upload_receive('attachment')) { // 첨부파일이 없을경우
				$this->notice_model->add($this->input->post('category'), $this->input->post('title'), $this->input->post('notice_add'), $this->session->userdata('userid'));
			} else {
				$this->notice_model->addFile($this->input->post('category'), $this->input->post('title'), $this->input->post('notice_add'), $this->session->userdata('userid'), $file['orig_name'], $file['file_name']);
			}
			$this->session->set_flashdata('message', '게시글 작성 성공');

			redirect(site_url('/Notice/main_notice'));
		}

		$this->_footer('main_footer');
	}

	public function upload_form() {
		// 사용자가 업로드 한 파일을 /static/img/addNotice 디렉토리에 저장한다.
		$config['upload_path'] = './static/img/addNotice';
		// git,jpg,png 파일만 업로드를 허용한다.
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload("upload")) {
			echo $this->upload->display_errors();
			echo "<script>alert('업로드에 실패 했습니다. ".$this->upload->display_errors('','')."')</script>";
		} else {
			$CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
		
			$data = $this->upload->data();
			$filename = $data['file_name'];

			$url = site_url('/static').'/img/addNotice/'.$filename;
			iconv("UTF-8","EUC-KR",$url);
			
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('".$CKEditorFuncNum."', '".$url."', '전송이 성공 했습니다.')</script>";
		}
	}

	public function upload_receive($file_name) {
		// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
		$config['upload_path'] = './static/user';
		// 허용되는 파일의 최대 사이즈 (100MB)
		$config['max_size'] = '102400';
		// 허용되는 파일 종류 All
		$config['allowed_types'] = '*';
		// 파일명 암호화 True
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload($file_name)) {
			
		} else {
			$data = $this->upload->data();
		}
		
		return $data;
	}

	public function make_board($all_result, $url) {
		$_header = "<tr>
					<th>
						 글 번호
					</th>
					<th>
						 제목
					</th>
					<th>
						 작성자
					</th>
					<th>
						 작성일
					</th>
					<th>
						댓글수
					</th>
					<th>
						 조회수
					</th>
				</tr>";

		if(!$all_result) {
			$_board = "
					<tr>
						<td colspan=5 align=center> 게시글이 없습니다.</td>
					</tr>";
			$_footer = "";
			
		} else {
			$cpage = $this->input->get('cpage');
			$cblock = $this->input->get('cblock');

			$_board="";
			$total = count($all_result);
			if ($cpage == '') 
				$cpage = 1;
			$pagesize = 5;
			
			$totalpage = (int)($total/$pagesize);
			if (($total % $pagesize) != 0) 
				$totalpage = $totalpage + 1;
			
			$counter = 0;

			while ($counter < $pagesize) :
				$newcounter = ($cpage - 1)*$pagesize + $counter;
				if ($newcounter == $total) 
					break;

				$result = $all_result[$newcounter];  // 각 게시글 하나씩 가져오기
				
				$id = $result->id;
				$category = $result->category;
				$writer = $result->writer;
				$title = $result->title;
				$postDate = $result->postDate;
				$click = $result->click;
				$this->load->model('notice_model');
				$reply_count = $this->notice_model->getCountReply($id);
				$_board .= "
					<tr>
						<th scope='row'>
							 ".$id."
						</td>
						<td>
							<a href=".site_url('/Notice/notice_item')."/".$id.">".$title."</a>
						</td>
						<td>
							 ".$writer."
						</td>
						<td>
							 ".$postDate."
						</td>
						<td>
							 ".$reply_count->count."
						</td>
						<td>
							".$click."
						</td>
					</tr>
					";

				$counter = $counter + 1;
			endwhile;

			if ($cblock == '') 
				$cblock = 1;
			$blocksize = 5;
			
			$pblock = $cblock - 1;
			$nblock = $cblock + 1;
			
			$startpage = ($cblock - 1) * $blocksize + 1;
			
			$pstartpage = $startpage - 1;
			$nstartpage = $startpage + $blocksize;
			
			$_footer = "<ul class='pagination col-xs-12'>";
			if ($pblock > 0) {
				$_footer .= "<li><a href=".site_url('/Notice')."/".$url."?cblock=".$pblock."&cpage=".$pstartpage." aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
			} else { 
				$_footer .= "<li class='disabled'><span><span aria-hidden='true'>&laquo;</span></span></li>";
			}
					
			$i = $startpage;
			while ($i < $nstartpage) :
				if ($i > $totalpage)
					break;
				if ($i == $cpage) 
					$_footer .= "<li class='active'><a href=".site_url('/Notice')."/".$url."?cblock=".$cblock."&cpage=".$i.">".$i."</a></li>" ;
				else 
					$_footer .= "<li><a href=".site_url('/Notice')."/".$url."?cblock=".$cblock."&cpage=".$i.">".$i."</a></li> ";
				$i = $i + 1;
			endwhile;
			
			if ($nstartpage <= $totalpage) {
				$_footer .= "<li><a href=".site_url('/Notice')."/".$url."?cblock=".$nblock."&cpage=".$nstartpage." aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li></ul> ";
			} else {
				$_footer .= "<li class='disabled'><span><span aria-hidden='true'>&raquo;</span></span></li></ul> ";
			}
		}
		$return = array('_header'=>$_header, '_board'=>$_board, '_footer'=>$_footer);
		return $return;
	}

	/**
	 * 공지 인트로 가져오기
	 */
	public function get_notice_intro($category) {
		$all_result = $this->notice_model->gets($category);
		$_item = "";
		if(!$all_result) {
			$_item .= "
					<div class='panel panel-default'>
						<div class='panel-body content'>
							게시글이 없습니다.
						</div>
						<div class='panel-footer'>
							　<b><a href='' class='pull-right'>Read more<span class='glyphicon glyphicon-circle-arrow-right'></span></a></b>
						</div>
					</div>
			";
			
		} else {
			foreach ($all_result as $each_schedule) {
				$id = $each_schedule->id;
				$writer = $each_schedule->writer;
				$title = $each_schedule->title;
				$content = $each_schedule->content;
				$postDate = $each_schedule->postDate;
				$_item .= "
					<div class='panel panel-default'>
						<div class='panel-body content'>
							<h4>
							<a href='".site_url('/Notice/notice_item')."/".$id."'>
							".$title." </a>
							</h4>
							<strong>".$writer."</strong>
							<em class='pull-right'>".$postDate."</em>
						</div>
						<div class='panel-footer'>
							".$content."
							<b><a href='".site_url('/Notice/notice_item').'/'.$id."' class='pull-right'>Read more<span class='glyphicon glyphicon-circle-arrow-right'></span></a></b>
							<br>
						</div>
					</div>";
			}	
		}
		return $_item;
	}

	/**
	 * 댓글 관련
	 */
	private function getComments($index) {	/* Comment 불러오기 */
		$this->load->model('Comments_model');

		$resultCom = $this->Comments_model->getComments($index);
		$comments = '';

		foreach ($resultCom as $comment) {
			if ($comment->re_id === '0') {	// 대댓이 아닌경우
				if (!$reComments = $this->Comments_model->getRecomments($index, $comment->co_id)) { // 대댓있는지 확인
					//array_push($comments, $comment);
					$comments .= $this->make_comment(
						$comment->co_id,
						$comment->re_id,
						$comment->board_id,
						$comment->uid,
						$comment->nickname,
						$comment->postdate,
						$comment->comment,
						$comment->liker
						);
				} else {
					$comments .= $this->make_comment(
						$comment->co_id,
						$comment->re_id,
						$comment->board_id,
						$comment->uid,
						$comment->nickname,
						$comment->postdate,
						$comment->comment,
						$comment->liker
						);
					foreach ($reComments as $reComment) {
						$comments .= $this->make_comment(
							$reComment->co_id,
							$reComment->re_id,
							0,
							$reComment->uid,
							$reComment->nickname,
							$reComment->postdate,
							$reComment->comment,
							$reComment->liker
							);
					}
				}
			}
		}
		return $comments;
	}
	
	private function make_comment($co_id, $re_id, $board_id, $uid, $nickname, $postdate, $comment, $liker) { /* 댓글 만들기 */
		$make_comment = 
			'<!-- BEGIN COMMENTS -->
			<div class="row bg-info"><!-- each comments -->';
		if ($re_id != 0) { 	
		$make_comment .= 
				'<div class="col-xs-1">
					<span class="glyphicon glyphicon-minus"></span>
				</div>
				<div class="col-xs-11">';
		} else {
		$make_comment .= 
				'<div class="col-xs-12">';
		}
		$make_comment .= 
					'<h4>
						<!--회원사진-->';
			if (is_file('static/img/member/'.$uid.'.jpg')) {	// $uid에 해당하는 사진의 존재유무 확인
				$make_comment .= '<img width="50" height="50" src="'.site_url('/static/img/member').'/'.$uid.'.jpg" class="media-object" alt="회원사진">';
			} else  {
				$make_comment .= '<img width="50" height="50" src="'.site_url('/static/img/member').'/nofile.png" class="media-object" alt="회원사진">';
			}
				$make_comment .=  '<a href="javascript:">'.$nickname.'</a></h4> 
					<span class="glyphicon glyphicon-calendar pull-right">'.$postdate.'</span>
					<p>
						 '.$comment.'
					</p>
					<span id="bu'.$co_id.'"><button type="button" class="btn btn-primary" onclick="likeComment('.$co_id.')">좋아요 <span class="badge">'.$liker.'</span></button></span>';
					
		if ($this->session->userdata('is_login') && $re_id === '0' ) { //$this->session->userdata('is_login') && $re_id === 0 
				$make_comment .= 
					'<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#com'.$co_id.'" aria-expanded="false" aria-controls="collapseExample">댓글달기</button>
					<div class="col-sm-12 collapse" aria-hidden="true" id="com'.$co_id.'">
						<form action="'.site_url('/Board/addComment').'/'.$board_id.'/'.$co_id.'?returnURL='.current_url().'" method="post">
						<div class="row bg-info">
							<div class="form-group">
								<input type="hidden" class="form-control" id="nickname" name="nickname" value="'.$this->session->userdata('username').'">
								</input>
							</div>
							<div class="form-group">
								<label for="comment"><span class="glyphicon glyphicon-comment"></span> comment</label>
								<textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
							</div>
							<button type="submit" class="btn btn-warning">작성</button>
						</div>
						</form>
					</div>
				</div>
			</div>';
		} else {
			$make_comment .=
				'</div>
			</div>';
		}
	return $make_comment;
	}

	public function likeComment() {		/* 댓글 좋아요 기능 */
		$co_id = $this->input->post('index');
		$this->load->model('Comments_model');
		
		$liker = $this->Comments_model->likeComment($co_id);

		echo '<button type="button" class="btn btn-primary" id="bu'.$co_id.'" onclick="likeComment('.$co_id.')">좋아요 <span class="badge">'.$liker->liker.'</span></button>';
	}

	public function addComment($index, $re_id) {	/* Comment 추가 */
		if (!$this->session->userdata('is_login')){
			$this->session->set_flashdata('message', '세션이 만료되었습니다.');
		}

		if (!$re_id) $re_id = 0;
		$this->load->model('Comments_model');
		if (!$this->Comments_model->addComment(
			$index, 
			$re_id,
			$this->session->userdata('userid'), 
			$this->input->post('nickname'),
			$this->input->post('comment')
			)) {
			$this->session->set_flashdata('message', '등록 실패');
		} else {
			$this->session->set_flashdata('message', '코멘트가 등록되었습니다..');
		}
		$returnURL = $this->input->get('returnURL');
		redirect($returnURL ? $returnURL : site_url('/Hello'));
	}

	private function makeThumbnail($img_url) { /* 썸네일 이미지 만들기 */
		$info_image=getimagesize($img_url);	// 파일 가져오기
		
		switch($info_image['mime']){
			case "image/gif";
				$new_image=imagecreatefromgif($img_url);
				echo "gif 입니다.<br>";
				break;
			case "image/jpeg";
				$new_image=imagecreatefromjpeg($img_url);
				echo "jpeg 입니다.<br>";
				break;
			case "image/png";
				$new_image=imagecreatefrompng($img_url);
				echo "png 입니다.<br>";
				break;
			case "image/bmp";
				$new_image=imagecreatefrombmp($img_url);
				echo "bmp 입니다.<br>";
				break;
		}
		if ($new_image){
			$w=100;// 섬네일 가로 사이즈
			$h=100; // 섬네일 세로 사이즈 ( 비율을 맞추려면, w:h = $info_image[0]:$info_image[1] 공식을 참조할 것)
			// 캔버스 열기
			$canvas=imagecreatetruecolor($w, $h);
			echo "캔바스 열음<br>";
			imagecopyresampled($canvas, $new_image, 0, 0, 0, 0, $w, $h, $info_image[0], $info_image[1]);
			$dir_n="/Kusitms/"; // 신규 게시물을 저장할 위치.
			$test = imagegif($canvas, $dir_n);

			echo $test;
		}
	}
}
?>
