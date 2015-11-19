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
		<div class="list-group magin20">
			<div class="row">
				<div class="col-sm-5">
					<h3><a href="<?=site_url('/Notice/edu_schedule')?>" class="list-group-item list-group-item-success">교육 일정 공지</a></h3>
					<?=$_eduSchedule?>
				</div>
				<span class="col-sm-2"></span>
				<div class="col-sm-5">
					<h3><a href="<?=site_url('/Notice/kusitms_notice')?>" class="list-group-item list-group-item-info">학회 공지</a></h3>
					<?=$_notice?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<h3><a href="#" class="list-group-item list-group-item-warning">소모임 공지</a></h3>
					<?=$_mento?>
				</div>
				<span class="col-sm-2"></span>
				<div class="col-sm-5">
					<h3><a href="<?=site_url('/Notice/diary')?>" class="list-group-item list-group-item-danger">활동일지</a></h3>
					<?=$_diary?>
				</div>
			</div>
		</div>
	</div>
	<!--/row-->
</div>
<!-- END CONTENT -->