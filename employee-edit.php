<?php


include('header.php');
include('functions.php');

$getID = $_GET['id'];

$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// the query
$query = "SELECT * FROM employees WHERE employee_id = '" . $mysqli->real_escape_string($getID) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$employee_name = $row['employee_name'];
		$employee_sername = $row['employee_sername'];
		$address = $row['address'];
		$sub_district = $row['sub_district'];
		$district = $row['district'];
		$province = $row['province'];
		$post_code = $row['post_code'];
		$start_date = $row['start_date'];
		$job_position = $row['job_position'];
		$username = $row['username'];
		$email = $row['email'];
		$phone = $row['phone'];
		$password = $row['password'];
	}
}

/* close connection */
$mysqli->close();

?>
<div class="text-center">
	<h1>แก้ไขข้อมูลพนักงาน</h1>
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
				<form method="post" id="update_employee">
					<input type="hidden" name="action" value="update_employee">
					<input type="hidden" name="id" value="<?php echo $getID; ?>">
					<div class="row">
						<div class="col-xs-4">
							ชื่อ
							<input type="text" class="form-control margin-bottom required" name="employee_name" placeholder="ป้อนชื่อ" value="<?php echo $employee_name; ?>">
						</div>
						<div class="col-xs-4">
							นามสกุล
							<input type="text" class="form-control margin-bottom required" name="employee_sername" placeholder="ป้อนนามสกุล" value="<?php echo $employee_sername; ?>">
						</div>
						<div class="col-xs-4">
							ที่อยู่
							<input type="text" class="form-control margin-bottom required" name="address" placeholder="ป้อนที่อยู่" value="<?php echo $address; ?>">
						</div>
						<div class="col-xs-4">
							ตำบล
							<input type="text" class="form-control margin-bottom required" name="district" placeholder="ป้อนตำบล" value="<?php echo $district; ?>">
						</div>
						<div class="col-xs-4">
							อำเภอ
							<input type="text" class="form-control margin-bottom required" name="sub_district" placeholder="ป้อนอำเภอ" value="<?php echo $sub_district; ?>">
						</div>
						<div class="col-xs-4">
							จังหวัด
							<input type="text" class="form-control margin-bottom required" name="province" placeholder="ป้อนจังหวัด" value="<?php echo $province; ?>">
						</div>
						<div class="col-xs-4">
							รหัสไปรษณีย์
							<input type="text" class="form-control margin-bottom required" name="post_code" placeholder="ป้อนรหัสไปรษณีย์" value="<?php echo $post_code; ?>">
						</div>
						<div class="col-xs-4">
							วันเริ่มทำงาน
							<input type="date" class="form-control margin-bottom required" name="start_date" placeholder="ป้อนวันเริ่มทำงาน" value="<?php echo $start_date; ?>">
						</div>
						<div class="col-xs-4">
							ตำแหน่งงาน
							<input type="text" class="form-control margin-bottom required" name="job_position" placeholder="ป้อนตำแหน่งงาน" value="<?php echo $job_position; ?>">
						</div>
						<div class="col-xs-4">
							อีเมล
							<input type="text" class="form-control margin-bottom required" name="email" placeholder="ป้อนอีเมล" value="<?php echo $email; ?>">
						</div>
						<div class="col-xs-4">
							เบอร์โทร
							<input type="text" class="form-control margin-bottom required" name="phone" placeholder="ป้อนเบอร์โทร" value="<?php echo $phone; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							Username สำหรับใช้เข้าสู่ระบบ
							<input type="text" class="form-control margin-bottom required" name="username" placeholder="ป้อน Username" value="<?php echo $username; ?>">
						</div>
						<div class="col-xs-4">
							รหัสผ่าน
							<input type="password" class="form-control margin-bottom required" name="password" id="password" placeholder="ป้อนรหัสผ่านใหม่ หรือ เว้นว่างไว้....">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_update_employee" class="btn btn-success float-right" value="แก้ไขข้อมูลพนักงาน" data-loading-text="กำลังแก้ไขข้อมูล...">
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