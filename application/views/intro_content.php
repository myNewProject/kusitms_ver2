<!-- BEGIN CONTENT -->
<div class="row">
	<!-- BEGIN EDIT FORM -->
	<div class="modal fade" id="edit" role="dialog" aria-labelledby="edit_title" aria-hidden="true">
		<? if ($this->session->userdata('postAuth')) { ?>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-title" id="edit_title">
						<h3>글수정</h3>
					</div>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
						<form class="form-horizontal" method="post" id="edit_form" name="edit_form" action="javascript:loadXMLDoc()">	
							<div class="form-group">
								<div class="col-sm-10">
									<textarea class="form-control" rows="15" id="edit_content" name="edit_content"></textarea>
								</div>
							</div>
						</form>
							<div class="modal-footer">
								<button id="edit-form-submit" class="btn btn-primary">변경</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<? } ?>
	</div>
	<!-- END EDIT FORM -->

	<!-- BEGIN PAGE HEADER-->
	<div class="col-md-12">
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
					<a href="<?=site_url('/Intro')?><?=$categories['main-category']['path']?>"><b><?=$categories['main-category']['name']?></b></a>
					<i class="glyphicon glyphicon-chevron-right"></i>
				</li>
				<li>
					<a href="<?=site_url('/Intro')?><?=$categories['sub-category']['path']?>"><b><?=$categories['sub-category']['name']?></b></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END PAGE HEADER-->

	<!-- BEGIN PAGE CONTENT-->
	<div class="col-md-12">
		<!-- EDIT BUTTON -->
		<? if ($this->session->userdata('postAuth')) { ?>
			<button class="btn btn-primary" onclick="clickedButton(<?=$content->category?>)" data-toggle="modal" href="#edit">수정</button>
		<? } ?>
		
		<div id="pageId" class="margin20">
		<?=$content->content ?>
		</div>
	</div>
	<!--/row-->
</div>