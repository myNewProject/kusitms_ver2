<!DOCTYPE html>
<html>
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>한국대학생IT경영학회</title>
	<!-- BEGIN GLOBAL LIB -->
	<link href="<?=site_url('/static')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL LIB -->
	<!-- BEGIN CUSTOM STYLE -->
	<style>
		html {
			height:100%;
		}
		body {
			padding-top: 50px;
			height:100%;
		}

		#body-container {
			min-height: 97%;
		}

		#footer {
			width: 100%;
			height: 3%;
			background-color: black;
			color: gray;
		}

		#navtab {
			margin-top: 30px;
		}

		.margin20 {
			margin-top: 30px;
		}
		.page-bar {
		  padding: 0px;
		  background-color: #f7f7f7;
		  margin-bottom: 25px;
		  -webkit-border-radius: 4px;
		  -moz-border-radius: 4px;
		  -ms-border-radius: 4px;
		  -o-border-radius: 4px;
		  border-radius: 4px;
		}
		.page-bar:before, .page-bar:after {
		  content: " ";
		  display: table;
		}
		.page-bar:after {
		  clear: both;
		}
		.page-bar .page-breadcrumb {
		  display: inline-block;
		  float: left;
		  padding: 8px;
		  margin: 0;
		  list-style: none;
		}
		.page-bar .page-breadcrumb > li {
		  display: inline-block;
		}
		.ie8 .page-bar .page-breadcrumb > li {
		  margin-right: 1px;
		}
		.page-bar .page-breadcrumb > li > a,
		.page-bar .page-breadcrumb > li > span {
		  color: #888;
		  font-size: 14px;
		  text-shadow: none;
		}
		.page-bar .page-breadcrumb > li > i {
		  color: #aaa;
		  font-size: 14px;
		  text-shadow: none;
		}
		.page-bar .page-breadcrumb > li > i[class^="icon-"],
		.page-bar .page-breadcrumb > li > i[class*="icon-"] {
		  color: gray;
		}
		.page-bar .page-toolbar {
		  display: inline-block;
		  float: right;
		  padding: 0;
		}
		.page-bar .page-toolbar .btn-fit-height {
		  -webkit-border-radius: 0 4px 4px 0;
		  -moz-border-radius: 0 4px 4px 0;
		  -ms-border-radius: 0 4px 4px 0;
		  -o-border-radius: 0 4px 4px 0;
		  border-radius: 0 4px 4px 0;
		  padding-top: 8px;
		  padding-bottom: 8px;
		}
	</style>
	<!-- END CUSTOM STYLE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<!-- BEGIN VIEW FLASHDATA -->
<?php
if ($this->session->flashdata('message')) { ?>
<script>
	alert('<?=$this->session->flashdata('message') ?>');
</script>
<? }
?>
<!-- END VIEW FLASHDATA -->
<!-- BEGIN HEADER -->
<div>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?=site_url('/Intro')?>">KUSITMS</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php 
				if ($this->session->userdata('is_login')) {	?>
					<li><a href="<?=site_url('/')?>auth/logout">
						<span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="bottom" title="로그아웃"> 로그아웃</span>
					</a></li>
					<li><a data-toggle="popover" data-placement="bottom" title="Dismissible popover" data-html="true" data-content="<a href='#'>첫번째 알림</a><br><a href='#'>두번째 알림</a>" href="#">
						<span class="glyphicon glyphicon-bell" data-toggle="tooltip" data-placement="bottom" title="마이페이지"> 마이페이지</span>
					</a></li>
				<?php
				} else {	?>
					<li>
						<a href="<?=site_url('/Auth/register')?>">
							<span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="bottom" title="회원가입"> 회원가입</span> 
						</a>
					</li>
					<li>
						<a data-toggle="modal" href="#login_form">
							<span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="bottom" title="로그인"> 로그인</span> 
						</a>
					</li>
					<div class="modal fade" id="login_form" role="dialog" aria-labelledby="login_title" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="modal-title" id="login_title">
										<h3>로그인</h3>
									</div>
								</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="row">
										<form class="form-horizontal" method="post" action="<?=site_url('/Auth')?>/authentication<?=empty($returnURL) ? '' : '?returnURL='.rawurlencode($returnURL) ?>">	
											<div class="form-group">
												<label class="control-label col-sm-2" for="inputEmail">아이디</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="email" name="email" placeholder="이메일">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="inputPassword">비밀번호</label>
												<div class="col-sm-10">
													<input class="form-control" type="password" id="password" name="password" placeholder="비밀번호">
												</div>
											</div>
										
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">로그인</button>
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</nav>
</div>
<!-- END HEADER -->

<!-- BEGIN BODY CONTAINER -->
<div class="container" id="body-container">

<!-- BEGIN CATEGORIES -->
<ul class="nav nav-tabs nav-justified" id="navtab">
	<li role="presentation" id="home">
		<a href="<?=site_url('/')?>">Home</a>
	</li>
	<? foreach ($categories as $category) { 
		if ($category->sub_category === '0'
			&& $category->main_category < '4') { ?>

		<li class="dropdown" role="presentation" id="nav-button<?=$category->main_category?>">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><?=$category->title?><span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<? foreach($categories as $sub_category) {
					if ($sub_category->sub_category != '0'
					  && $sub_category->main_category === $category->main_category) {?>
						<li><a href="<?=site_url('/')?><?=$sub_category->path?>"><?=$sub_category->title?></a></li>
				<? 	}
				} ?>
			</ul>
		</li>

		<? }
	} ?>
	<li role="presentation" id="member">
		<a href="<?=site_url('/member')?>">기수게시판</a>
	</li>
</ul>
<!-- END CATEGORIES -->