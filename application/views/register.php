<!-- BEGIN CONTENT -->
<div class="row margin20">

	<!-- BEGIN PAGE CONTENT-->
	<div class="col-sm-12">
		<form action="<?=site_url('/Auth')?>/register" method="post" id="addForm" name="addForm" class="form-horizontal col-md-10" enctype="multipart/form-data">
			<? echo validation_errors(); ?>
			<!-- 개인정보 -->
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">이름</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="이름"/>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">이메일</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="이메일"/>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">비밀번호</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="비밀번호"/>
				</div>
			</div>
			<div class="form-group">
				<label for="re_password" class="col-sm-2 control-label">비밀번호 확인</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="re_password" name="re_password" placeholder="비밀번호 확인"/>
				</div>
			</div>
			<!-- 부가정보 -->
			<div class="form-group">
				<label for="university" class="col-sm-2 control-label">학교</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="university" name="university" placeholder="학교"/>
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-2 control-label">전화번호</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" id="phone" name="phone" placeholder="전화번호"/>
				</div>
			</div>
			<div class="form-group">
				<label for="class" class="col-sm-2 control-label">직책</label>
				<div class="col-sm-10">
					<select class="form-control" id="class" name="class">
						<optgroup  LABEL="─────────">
							<option value="1">비회원</option>
						</optgroup>
						<optgroup  LABEL="─────────">
							<option value="2">회원</option>
							<option value="3">교육팀</option>
							<option value="4">경영총괄팀</option>
							<option value="5">대외홍보팀</option>
							<option value="6">학회장</option>
							<option value="7">부학회장</option>
						</optgroup>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="ment" class="col-sm-2 control-label">자기소개</label>
				<div class="col-sm-10">
					<textarea id="ment" name="ment" placeholder="자기소개" class="form-control" rows="15"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="member" class="col-sm-2 control-label">기수</label>
				<div class="col-sm-10">
					<select class="form-control" id="member" name="member">
						<optgroup  LABEL="─────────">
							<option value="0">비회원</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
						</optgroup>
						
						<?php /* for ($i=0; $i < MAXNUM()+1; $i++) { 
							if (i===0) {
								echo "<option value='0'>비회원</option>";
							} else {
								echo "<option value=".$i.">".$i."</option>";
							}
						} */
						?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="age" class="col-sm-2 control-label">생년월일</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="age" name="age"/>
				</div>
			</div>
			<div class="form-group" style="margin-top : 20px">
				<label for="picture" class="col-sm-2 control-label">첨부 파일</label>
				<div class="col-sm-10">
					<input type="file" id="pircture" name="picture"/>
					<p class="help-block"> 최대용량 : 100 mb</p>
				</div>
			</div>
			<button type="submit" class="btn btn-default">제출</button>
		</form>
	</div>
	<!--/row-->
</div>
<!-- END CONTENT -->