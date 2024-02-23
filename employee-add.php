<?php

include('header.php');

?>
<div class="text-center">
	<h1>เพิ่มข้อมูลพนักงาน</h1>
</div>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>ข้อมูลพนักงาน</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_employee">
					<input type="hidden" name="action" value="add_employee">
					<div class="row">
						<div class="col-xs-4">
							ชื่อ
							<input type="text" class="form-control margin-bottom required" name="employee_name" placeholder="ป้อนชื่อ">
						</div>
						<div class="col-xs-4">
							นามสกุล
							<input type="text" class="form-control margin-bottom required" name="employee_sername" placeholder="ป้อนนามสกุล">
						</div>
						<div class="col-xs-4">
							ที่อยู่
							<input type="text" class="form-control margin-bottom required" name="address" placeholder="ป้อนที่อยู่">
						</div>
						<div class="col-xs-4">
							ตำบล
							<input type="text" class="form-control margin-bottom required" name="district" placeholder="ป้อนตำบล">
						</div>
						<div class="col-xs-4">
							อำเภอ
							<input type="text" class="form-control margin-bottom required" name="sub_district" placeholder="ป้อนอำเภอ">
						</div>
						<div class="col-xs-4">
							จังหวัด
							<input type="text" class="form-control margin-bottom required" name="province" placeholder="ป้อนจังหวัด">
						</div>
						<div class="col-xs-4">
							รหัสไปรษณีย์
							<input type="text" class="form-control margin-bottom required" name="post_code" placeholder="ป้อนรหัสไปรษณีย์">
						</div>
						<div class="col-xs-4">
							วันเริ่มทำงาน
							<input type="date" class="form-control margin-bottom required" name="start_date" placeholder="ป้อนวันเริ่มทำงาน">
						</div>
						<div class="col-xs-4">
							ตำแหน่งงาน
							<input type="text" class="form-control margin-bottom required" name="job_position" placeholder="ป้อนตำแหน่งงาน">
						</div>
						<div class="col-xs-4">
							อีเมล
							<input type="text" class="form-control margin-bottom required" name="email" placeholder="ป้อนอีเมล">
						</div>
						<div class="col-xs-4">
							เบอร์โทร
							<input type="text" class="form-control margin-bottom required" name="phone" placeholder="ป้อนเบอร์โทร">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							Username สำหรับใช้เข้าสู่ระบบ
							<input type="text" class="form-control margin-bottom required" name="username" placeholder="ป้อน Username">
						</div>
						<div class="col-xs-4">
							รหัสผ่าน
							<input type="password" class="form-control required" name="password" id="password" placeholder="ป้อนรหัสผ่าน">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_add_employee" class="btn btn-success float-right" value="เพิ่มข้อมูลพนักงาน" data-loading-text="กำลังเพิ่มข้อมูลพนักงาน...">
						</div>
					</div>
				</form>
				<p><a href="employee-list.php">กลับไปยังหน้าแสดงรายละเอียดพนักงาน</a></p>
			</div>
		</div>
	</div>
	<div>

		<?php
		include('footer.php');
		?>