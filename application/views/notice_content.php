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
	
	<? if ($this->session->userdata('postAuth')) { ?>
	<!-- BEGIN ADD FORM -->
	<div class="col-sm-12">
		<a href="<?=site_url('/').'Notice/add_form'?>" class="btn btn-primary pull-right">글작성</a>
	</div>
	<!-- END ADD FORM -->
	<? } ?>

	<!-- BEGIN PAGE CONTENT-->
	<div class="col-sm-12">
		<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><h4><?=$categories['sub-category']['name']?></h4></div>
		<!-- Table -->
		<table class="table">
			<thead>
				<?=$_header?>
			</thead>
			<tbody>
				<?=$_board?>
			</tbody>
		</table>
			<?=$_footer?>
		</div>
	</div>
	<!--/row-->
</div>
<!-- END CONTENT -->