<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Board extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		redirect(site_url('/KusitmsErrorPage'));
	}

	public function member_intro() {		// 공지사항
		$this->_header('main-header');

		$this->load->model('board_model');
		$this->load->model('users_model');

		$_nav = "<a href='".site_url('/Board')."/member_intro?member=".$this->input->get('member')."'>".$this->input->get('member')."기 회원 소개</a>";
		$_category = $this->input->get('member')."기 회원소개";

		if (!$this->input->get('member'))
			redirect(site_url('/KusitmsErrorPage'));
		$all_result = $this->board_model->getBoard(0, $this->input->get('member'));
		$result = $this->make_board($all_result, 'member_intro', $this->input->get('member'));

		$this->load->view('member_board', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$this->input->get('member'), '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));
				
		$this->_footer('main-footer');
	}

	public function edu_team() {
		$this->_header('main-header');

		$this->load->model('board_model');
		$this->load->model('users_model');

		$_nav = "<a href='".site_url('/Board')."/edu_team?member=".$this->input->get('member')."'>".$this->input->get('member')."기 교육팀</a>";
		$_category = $this->input->get('member')."기 교육팀";

		if (!$this->input->get('member'))
			redirect(site_url('/KusitmsErrorPage'));
		$all_result = $this->board_model->getBoard(9, $this->input->get('member'));
		$result = $this->make_board($all_result, 'edu_team', $this->input->get('member'));

		$this->load->view('member_board', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$this->input->get('member'), '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));
				
		$this->_footer('main-footer');
	}

	public function management_team() {
		$this->_header('main-header');

		$this->load->model('board_model');
		$this->load->model('users_model');

		$_nav = "<a href='".site_url('/Board')."/management_team?member=".$this->input->get('member')."'>".$this->input->get('member')."기 경영총괄팀</a>";
		$_category = $this->input->get('member')."기 경영총괄팀";

		if (!$this->input->get('member'))
			redirect(site_url('/KusitmsErrorPage'));
		$all_result = $this->board_model->getBoard(10, $this->input->get('member'));
		$result = $this->make_board($all_result, 'management_team', $this->input->get('member'));

		$this->load->view('member_board', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$this->input->get('member'), '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));
				
		$this->_footer('main-footer');
	}

	public function promote_team() {
		$this->_header('main-header');

		$this->load->model('board_model');
		$this->load->model('users_model');

		$_nav = "<a href='".site_url('/Board')."/promote_team?member=".$this->input->get('member')."'>".$this->input->get('member')."기 대외홍보팀</a>";
		$_category = $this->input->get('member')."기 대외홍보팀";

		if (!$this->input->get('member'))
			redirect(site_url('/KusitmsErrorPage'));
		$all_result = $this->board_model->getBoard(11, $this->input->get('member'));
		$result = $this->make_board($all_result, 'promote_team', $this->input->get('member'));

		$this->load->view('member_board', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$this->input->get('member'), '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));
				
		$this->_footer('main-footer');
	}

	public function team_board($team) {
		$this->_header('main-header');

		$this->load->model('board_model');
		$this->load->model('users_model');

		$_nav = "<a href='".site_url('/Board')."/team_board/".$team."?member=".$this->input->get('member')."'>".$team."조</a>";
		$_category = $team."조";

		if (!$this->input->get('member'))
			redirect(site_url('/KusitmsErrorPage'));
		$all_result = $this->board_model->getBoard($team, $this->input->get('member'));
		$result = $this->make_board($all_result, 'team_board', $this->input->get('member'));

		$this->load->view('member_board', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$this->input->get('member'), '_header'=>$result['_header'], '_board'=>$result['_board'], '_footer'=>$result['_footer']));

		$this->_footer('main-footer');
	}

	public function board_item($index) {
		$this->_header('main-header');

		$this->load->model('board_model');  // Model 가져오기
		$result = $this->board_model->getItem($index); // 공지글 가져오기
		$member = $this->input->get('member');
		switch ($result->category) {
		 	case 0:
		 		$_category = $member."기 회원소개";
		 		$_nav = "<a href='".site_url('/Board')."/member_intro?member=".$member."'>".$member."기 회원소개</a>";
		 		break;
		 	case 1:
		 		$_category = "1조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/1?member=".$member."'>1조</a>";
		 		break;
		 	case 2:
		 		$_category = "2조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/2?member=".$member."'>2조</a>";
		 		break;
		 	case 3:
		 		$_category = "3조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/3?member=".$member."'>3조</a>";
		 		break;
		 	case 4:
		 		$_category = "4조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/4?member=".$member."'>4조</a>";
		 		break;
		 	case 5:
		 		$_category = "5조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/5?member=".$member."'>5조</a>";
		 		break;
		 	case 6:
		 		$_category = "6조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/6?member=".$member."'>6조</a>";
		 		break;
		 	case 7:
		 		$_category = "7조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/7?member=".$member."'>7조</a>";
		 		break;
		 	case 8:
		 		$_category = "8조";
		 		$_nav = "<a href='".site_url('/Board')."/team_board/8?member=".$member."'>8조</a>";
		 		break;
		 	case 9:
		 		$_category = $member."기 교육팀";
		 		$_nav = "<a href='".site_url('/Board')."/edu_team?member=".$member."'>".$member."기 교육팀</a>";
		 		break;
		 	case 10:
		 		$_category = $member."기 경영총괄팀";
		 		$_nav = "<a href='".site_url('/Board')."/management_team?member=".$member."'>".$member."기 경영총괄팀</a>";
		 		break;
		 	case 11:
		 		$_category = $member."기 대외홍보팀";
		 		$_nav = "<a href='".site_url('/Board')."/promote_team'>".$member."기 대외홍보팀</a>";
		 		break;
		 	default:
		 		$_category = $member."기 회원소개";
		 		$_nav = "<a href='".site_url('/Board')."/member_intro'>".$member."기 회원소개</a>";
		 		break;
		 }

		$comments = $this->getComments($index);
		$reply_count = $this->board_model->getCountReply($index);
		
		$this->load->view('member_item', array('_nav'=>$_nav, 'category'=>$_category, 'member'=>$member, 'board_item'=>$result, 'comments'=>$comments, 'reply_count'=>$reply_count->count));

		$this->_footer('main-footer');
	}

	public function testController() {
		$this->makeThumbnail(site_url('/static/img/member').'/6.jpg');
	}

	public function add() {
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect('/Auth/login?returnURL='.rawurlencode(site_url('/Hello/add')));
		}

		if (!$this->session->userdata('postAuth')) {
			$this->session->set_flashdata('message', '권한이 없습니다');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->_header('main-header');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('contentArea', '본문', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('addBoard');
		} else {
			$this->load->model('board_model');

			if (! $file = $this->upload_receive('attachment')) { // 첨부파일이 없을경우
				$this->board_model->add($this->input->post('category'), $this->input->post('title'), $this->input->post('contentArea'), $this->session->userdata('userid'), $this->input->get('member'));
			} else {
				$this->board_model->addFile($this->input->post('category'), $this->input->post('title'), $this->input->post('contentArea'), $this->session->userdata('userid'), $this->input->get('member'), $file['orig_name'], $file['file_name']);
			}
			$this->session->set_flashdata('message', '게시글 작성 성공');

			redirect(site_url('/Board/member_intro?member='.$this->input->get('member')));
		}

		$this->_footer('main-footer');
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
			$data = false;
		} else {
			$data = $this->upload->data();
		}
		
		return $data;
	}

	public function make_board($all_result, $url, $member) {
		$this->load->model('board_model');
		$_header = "
				<tr>
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
						<td colspan=6 align=center> 게시글이 없습니다.</td>
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
				$reply_count = $this->board_model->getCountReply($id);
	
				$_board .= "
					<tr>
						<td>
							 ".$id."
						</td>
						<td>
							<a href=".site_url('/Board/board_item')."/".$id."?member=".$member.">".$title."</a>
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
					</a>
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
				$_footer .= "<li><a href=".site_url('/Board')."/".$url."?cblock=".$pblock."&cpage=".$pstartpage." aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
			} else { 
				$_footer .= "<li class='disabled'><span><span aria-hidden='true'>&laquo;</span></span></li>";
			}
					
			$i = $startpage;
			while ($i < $nstartpage) :
				if ($i > $totalpage)
					break;
				if ($i == $cpage) 
					$_footer .= "<li class='active'><a href=".site_url('/Board')."/".$url."?cblock=".$cblock."&cpage=".$i.">".$i."</a></li>" ;
				else 
					$_footer .= "<li><a href=".site_url('/Board')."/".$url."?cblock=".$cblock."&cpage=".$i.">".$i."</a></li> ";
				$i = $i + 1;
			endwhile;
			
			if ($nstartpage <= $totalpage) {
				$_footer .= "<li><a href=".site_url('/Board')."/".$url."?cblock=".$nblock."&cpage=".$nstartpage." aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li></ul> ";
			} else {
				$_footer .= "<li class='disabled'><span><span aria-hidden='true'>&raquo;</span></span></li></ul> ";
			}
		}
		$return = array('_header'=>$_header, '_board'=>$_board, '_footer'=>$_footer);
		return $return;
	}

	public function get_board_intro($category) {
		$all_result = $this->board_model->gets($category);
		$_item = "";
		if(!$all_result) {
			$_item .= "
					<div class='news-blocks'>
						<h3>
						<a href='page_news_item.html'>
						게시글이 없습니다. </a>
						</h3>
					</div>";
			
		} else {
			foreach ($all_result as $result) {
				$id = $result->id;
				$writer = $result->writer;
				$title = $result->title;
				$content = $result->content;
				$postDate = $result->postDate;
				$_item .= "
					<div class='news-blocks'>
						<h3>
						<a href='".site_url('/Board/board_item')."/".$id."'>
						".$title." </a>
						</h3>
						<div class='news-block-tags'>
							<strong>".$writer."</strong>
							<em>".$postDate."</em>
						</div>
						".$content."
						<a href='".site_url('/Board/board_item').'/'.$id."' class='news-block-btn'>
						Read more <i class='m-icon-swapright m-icon-black'></i>
						</a>
					</div>";
			}	
		}
		return $_item;
	}

	// 댓글 관련

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
				$make_comment .=  '<a href="javascript:">'.$nickname.'</a><span class="glyphicon glyphicon-calendar pull-right">'.$postdate.'</span>
					</h4> 
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
