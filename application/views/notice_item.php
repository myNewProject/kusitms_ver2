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
		<div class="row">
			<div class="col-sm-12 blog-tag-data">
				<h3><?=$notice_item->title?></h3>
				<!-- 포스터 쓸게있다면 이부분에
				<img src="../../assets/admin/pages/media/gallery/item_img1.jpg" class="img-responsive" alt="">
				-->
				<div class="row">
					<div class="col-sm-6">
					</div>
					<div class="col-sm-6 blog-tag-data-inner">
						<ul class="list-inline">
							<li>
								<i class="glyphicon glyphicon-calendar"></i>
								<?=$notice_item->postDate?>
							</li>
							<li>
								<i class="glyphicon glyphicon-comment"></i>
								<a href="#">
								<?=$reply_count?> Comments </a>
							</li>
						</ul>
					</div>
				</div>
				<hr>
				<div class="news-item-page">
					<?=$notice_item->content?>
				</div>
				<hr>
				<!-- BEGIN COMMENTS -->
				<h3 id="comm">Comments</h3>
					<!-- BEGIN COMMENTS AREA -->
					<div class="col-sm-12">
						<?=$comments?>
					</div>
				<hr>
				<!-- END COMMENTS -->
				<!-- BEGIN COMMENTS POST -->
				<? if ($this->session->userdata('is_login')) {	?>
					<form action="<?=site_url('/Notice/addComment')?>/<?=$notice_item->id?>?returnURL=<?=current_url()?>" method="post">
					<div class="col-sm-12 bg-info" style="margin-top:30px">
						<div class="form-group">
							<input type="hidden" class="form-control" id="nickname" name="nickname" value="<?=$this->session->userdata('username')?>" readonly></input>
						</div>
						<div class="form-group">
							<label for="comment"><span class="glyphicon glyphicon-comment"></span> comment</label>
							<textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">리뷰작성</button>
					</div>
					</form>
				<? } ?>
				<!-- END COMMENTS POST -->
			</div>
		</div>
	</div>
	<!--/row-->
</div>
<!-- END CONTENT -->