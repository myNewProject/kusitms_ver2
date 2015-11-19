</div>
<!-- END BODY CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="container" id="footer">
	<div class="row">
		<div class="col-md-12">
		 2015 &copy; KUSITMS. GD's Work.
		</div>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="<?=site_url('/static')?>/js/jquery/1.11.2/jquery.js"></script>
<script src="<?=site_url('/static')?>/lib/bootstrap/js/bootstrap.min.js"></script>
<script  src="<?=site_url('/static')?>/plugin/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {    
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		QuickSidebar.init(); // init quick sidebar
		Demo.init(); // init demo features
	});

	$("#edit-form-submit").click(function() {
		//alert(CKEDITOR.instances.edit_form.getData());
		document.forms["edit_form"].submit();
	});

	function loadXMLDoc() { 
		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		var contents = "edit_content= " + encodeURIComponent($("#edit_content").val());

		xmlhttp.open("POST", "http://localhost:8090/Kusitms_ver2/Intro/about_edit?page="+page, true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Accept","text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8");
		xmlhttp.setRequestHeader("Cache-Control", "max-age=0");
		xmlhttp.setRequestHeader("Upgrade-Insecure-Requests","1");
		xmlhttp.send(contents);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				alert("변경되었습니다");
				// 본문 refresh
				document.getElementById("pageId").innerHTML=xmlhttp.responseText;
				// Form 초기화
				for (instance in CKEDITOR.instances){
					CKEDITOR.instances[instance].setData(" ");
				}
				document.getElementById("edit_form").reset();
				$("#edit_content").val("");
			}
		}
	}

	// 수정버튼 클릭시 폼 id 변경
	function clickedButton(id) {
		page = id;
	}

	// 네비게이터 활성화
	function navActivator() {
			var page = '<?=$pagenum?>';
			if (page === 'main_header') {
				$("#home").addClass("active");
			} else if (page == 'intro') {
				$("#nav-button1").addClass("active");
			} else if (page == 'forum') {
				$("#nav-button2").addClass("active");
			} else if (page == 'business') {
				$("#nav-button3").addClass("active");
			} else if (page == 'hr') {
				$("#nav-button4").addClass("active");
			} else if (page == 'education') {
				$("#nav-button6").addClass("active");
			}
		}
	navActivator();

	// bootstrap 툴팁 초기화
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	// bootstrap 팝오버 초기화
	$(function () {
		$('[data-toggle="popover"]').popover()
	});


	// 글변경 폼 CKEDITOR
	CKEDITOR.replace('edit_content');
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>