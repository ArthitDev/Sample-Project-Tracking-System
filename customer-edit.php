<?php


include('header.php');
include('functions.php');

$getID = $_GET['id'];

// Connect to the database
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// the query
$query = "SELECT * FROM customers WHERE customer_id = '" . $mysqli->real_escape_string($getID) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$customer_name = $row['customer_name'];
		$customer_sername = $row['customer_sername'];
		$address = $row['address'];
		$district = $row['district'];
		$sub_district = $row['sub_district'];
		$province = $row['province'];
		$post_code = $row['post_code'];
		$phone = $row['phone'];
		$email = $row['email'];
	}
}

/* close connection */
$mysqli->close();

?>
<div class="text-center">
	<h1>แก้ไขข้อมูลลุกค้า</h1>
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
				<h4>ข้อมูลลูกค้า</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="update_customer">
					<input type="hidden" name="action" value="update_customer">
					<input type="hidden" name="id" value="<?php echo $getID; ?>">
					<div class="row">
						<div class="col-xs-3">
							ชื่อ
							<input type="text" class="form-control required" name="customer_name" placeholder="ป้อนชื่อ" value="<?php echo htmlspecialchars($customer_name); ?>">
						</div>
						<div class="col-xs-3">
							นามสกุล
							<input type="text" class="form-control required" name="customer_sername" placeholder="ป้อนนามสกุล" value="<?php echo htmlspecialchars($customer_sername); ?>">
						</div>
						<div class="col-xs-3">
							ที่อยู่
							<input type="text" class="form-control required" name="address" placeholder="ป้อนที่อยู่" value="<?php echo htmlspecialchars($address); ?>">
						</div>
						<div class="col-xs-3">
							ตำบล
							<input type="text" class="form-control required" name="district" placeholder="ป้อนตำบล" value="<?php echo htmlspecialchars($district); ?>">
						</div>
						<div class="col-xs-3">
							อำเภอ
							<input type="text" class="form-control required" name="sub_district" placeholder="ป้อนอำเภอ" value="<?php echo htmlspecialchars($sub_district); ?>">
						</div>
						<div class="col-xs-3">
							จังหวัด
							<input type="text" class="form-control required" name="province" placeholder="ป้อนจังหวัด" value="<?php echo htmlspecialchars($province); ?>">
						</div>
						<div class="col-xs-3">
							รหัสไปรษณีย์
							<input type="text" class="form-control required" name="post_code" placeholder="ป้อนรหัสไปรษณีย์" value="<?php echo htmlspecialchars($post_code); ?>">
						</div>
						<div class="col-xs-3">
							เบอร์โทร
							<input type="text" class="form-control required" name="phone" placeholder="ป้อนเบอร์โทร" value="<?php echo htmlspecialchars($phone); ?>">
						</div>
						<div class="col-xs-3">
							อีเมล
							<input type="text" class="form-control required" name="email" placeholder="ป้อนอีเมล" value="<?php echo htmlspecialchars($email); ?>">
						</div>

					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_update_customer" class="btn btn-success float-right" value="แก้ไขข้อมูลลูกค้า" data-loading-text="กำลังแก้ไขข้อมูลลูกค้า.....">
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