<!-- BEGIN CONTENT -->
<div class="row">
	<!-- BEGIN PAGE HEADER-->
	<div class="col-sm-12">
		<h3 class="page-header">
			<h1><?=$categories['main-category']['name']?> <small><?=$categories['sub-category']['name']?></small></h1>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="glyphicon glyphicon-home"></i>
					<a href="<?=site_url('/Intro')?>"><b>Home</b></a>
					<i class="glyphicon glyphicon-chevron-right"></i>
				</li>
				<li>
					<a href="<?=site_url('/Notice')?><?=$categories['main-category']['path']?>"><b><?=$categories['main-category']['name']?></b></a>
					<i class="glyphicon glyphicon-chevron-right"></i>
				</li>
				<li>
					<a href="<?=site_url('/Notice')?><?=$categories['sub-category']['path']?>"><b><?=$categories['sub-category']['name']?></b></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END PAGE HEADER-->

	<!-- BEGIN PAGE CONTENT-->
	<div class="col-sm-12">
		<form action="<?=site_url('/Notice')?>/add_form" method="post" id="addForm" name="addForm" class="form-horizontal col-md-12" enctype="multipart/form-data">
			<? echo validation_errors(); ?>
			<div class="form-group">
				<label for="category" class="col-sm-1 control-label">분류</label>
				<div class="col-sm-11">
					<select class="form-control" id="category" name="category">
						<option value="1">교육일정</option>
						<option value="2">학회 공지</option>
						<option value="3">언론 보도</option>
						<option value="4">활동일지</option>
						<option value="5">멘토링 공지</option>
						<option value="6">동문회 공지</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="title" class="col-sm-1 control-label">제목</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" id="title" name="title" placeholder="제목"/>
				</div>
			</div>
			<div>
				<textarea id="notice_add" name="notice_add" placeholder="본문" class="form-control" rows="15"></textarea>
			</div>
			<div class="form-group" style="margin-top : 20px">
				<label for="attachment" class="col-sm-2 col-md-1 control-label">첨부 파일</label>
				<div class="col-sm-10 col-md-11">
					<input type="file" id="attachment" name="attachment"/>
					<p class="help-block"> 최대용량 : 100 mb</p>
				</div>
			</div>
			<button type="submit" class="btn btn-default">제출</button>
		</form>
	</div>
	<!--/row-->
</div>
<!-- END CONTENT -->