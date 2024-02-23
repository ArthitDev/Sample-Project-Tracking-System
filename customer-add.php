<?php
include('header.php');

?>
<div class="text-center">
	<h1>เพิ่มข้อมูลลูกค้า</h1>
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
				<h4>รายละเอียดลูกค้า</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_customer">
					<input type="hidden" name="action" value="add_customer">
					<div class="row">
						<div class="col-xs-3">
							ชื่อ
							<input type="text" class="form-control required" name="customer_name" placeholder="ป้อนชื่อ">
						</div>
						<div class="col-xs-3">
							นามสกุล
							<input type="text" class="form-control required" name="customer_sername" placeholder="ป้อนนามสกุล">
						</div>
						<div class="col-xs-3">
							ที่อยู่
							<input type="text" class="form-control required" name="address" placeholder="ป้อนที่อยู่">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-3">
							ตำบล
							<input type="text" class="form-control required" name="district" placeholder="ป้อนตำบล">
						</div>
						<div class="col-xs-3">
							อำเภอ
							<input type="text" class="form-control required" name="sub_district" placeholder="ป้อนอำเภอ">
						</div>
						<div class="col-xs-3">
							จังหวัด
							<input type="text" class="form-control required" name="province" placeholder="ป้อนจังหวัด">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-3">
							รหัสไปรษณีย์
							<input type="text" class="form-control required" name="post_code" placeholder="ป้อนรหัสไปรษณีย์">
						</div>
						<div class="col-xs-3">
							เบอร์โทร
							<input type="text" class="form-control required" name="phone" placeholder="ป้อนเบอร์โทร">
						</div>
						<div class="col-xs-3">
							อีเมล
							<input type="text" class="form-control required" name="email" placeholder="ป้อนอีเมล">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_add_customer" class="btn btn-success float-right" value="เพิ่มข้อมูลลูกค้า" data-loading-text="กำลังเพิ่มข้อมูลลูกค้า.....">
						</div>
					</div>
				</form>
				<p><a href="customer-list.php">กลับไปยังหน้าแสดงรายชื่อลูกค้า</a></p>
			</div>
		</div>
	</div>
	<div>

		<?php
		include('footer.php');
		?>