<?php


include_once('includes/config.php');

// show PHP errors
ini_set('display_errors', 1);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$action = isset($_POST['action']) ? $_POST['action'] : "";



// Update product
if ($action == 'update_product') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// invoice product information
	$getID = $_POST['id']; // id
	$product_name = $_POST['product_name']; // product name
	$product_desc = $_POST['product_desc']; // product desc
	$product_unit = $_POST['product_unit']; // product unit
	$product_price = $_POST['product_price']; // product price

	// the query
	$query = "UPDATE products SET
				product_name = ?,
				product_desc = ?,
				product_unit = ?,
				product_price = ?
			 WHERE product_id = ?
			";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param(
		'sssss',
		$product_name,
		$product_desc,
		$product_unit,
		$product_price,
		$getID
	);

	//execute the query
	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'แก้ไขข้อมูลสินค้าเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>'
		));
	}

	//close database connection
	$mysqli->close();
}

// delete product
if ($action == 'delete_product') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$id = $_POST["delete"];

	// the query
	$query = "DELETE FROM products WHERE product_id = ?";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('s', $id);

	//execute the query
	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'ลบข้อมูลสินค้าเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>'
		));
	}

	// close connection 
	$mysqli->close();
}

// delete project
if ($action == 'delete_project') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$id = $_POST["delete"];

	// the query
	$query = "DELETE FROM projects WHERE project_id = ?";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('s', $id);

	//execute the query
	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'ลบข้อมูลโครงการเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>'
		));
	}

	// close connection 
	$mysqli->close();
}

// Login to system
if ($action == 'login') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	session_start();

	extract($_POST);

	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass_encrypt = md5(mysqli_real_escape_string($mysqli, $_POST['password']));

	$query = "SELECT * FROM `employees` WHERE username='$username' AND `password` = '$pass_encrypt'";

	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$count = mysqli_num_rows($results);

	if ($count != "") {
		$row = $results->fetch_assoc();

		$_SESSION['login_username'] = $row['username'];
		// $_SESSION['login_name'] = $row['name'];

		// processing remember me option and setting cookie with long expiry date
		if (isset($_POST['remember'])) {
			session_set_cookie_params('604800'); //one week (value in seconds)
			session_regenerate_id(true);
		}

		echo json_encode(array(
			'status' => 'Success',
			'message' => 'เข้าสู่ระบบสำเร็จ ระบบจะนำคุณไปยังหน้าระบบติดตามโครงการ!'
		));
	} else {
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'เข้าสู่ระบบล้มเหลว ชื่อผู้ใช้หรือรหัสผ่านอาจไม่ถูกต้อง โปรดติดต่อผู้ดูแลระบบ!'
		));
	}
}

// Adding new product
if ($action == 'add_product') {

	$product_name = $_POST['product_name'];
	$product_desc = $_POST['product_desc'];
	$product_unit = $_POST['product_unit'];
	$product_price = $_POST['product_price'];

	//our insert query query
	$query  = "INSERT INTO products
				(
					product_name,
					product_desc,
					product_unit,
					product_price
				)
				VALUES (
					?, 
                	?,
					?,
                	?
                );
              ";

	header('Content-Type: application/json');

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('ssss', $product_name, $product_desc, $product_unit, $product_price);

	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'เพิ่มข้อมูลสินค้าเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>'
		));
	}

	//close database connection
	$mysqli->close();
}

//----------------------------------------------------Project Add-------------------------------------------------

if ($action == 'add_project') {
	$project_name = $_POST["project_name"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	$project_value = $_POST["project_value"];
	$status_id = $_POST["status_id"];
	$customer_id = $_POST["customer_id"];
	$employee_id = $_POST["employee_id"];

	$query = "INSERT INTO projects (
       project_name,
       start_date,
       end_date,
       project_value,
	   status_id,
	   customer_id,
       employee_id
    ) VALUES (?, ?, ?, ?, ?, ?, ?)";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
	$stmt->bind_param(
		'ssssiii',
		$project_name,
		$start_date,
		$end_date,
		$project_value,
		$status_id,
		$customer_id,
		$employee_id
	);
	if ($stmt->execute()) {
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'เพิ่มข้อมูลโครงการเรียบร้อยแล้ว',
		));
	} else {
		// ถ้าไม่สามารถสร้างโครงการได้
		echo json_encode(array(
			'status' => 'Error',
			'message' => 'มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง',
		));
	}

	$mysqli->close();
}

//----------------------------------------------------Project Add-------------------------------------------------

//Add Customer

if ($action == 'add_customer') {
	$customer_name = $_POST['customer_name'];
	$customer_sername = $_POST['customer_sername'];
	$address = $_POST['address'];
	$district = $_POST['district'];
	$sub_district = $_POST['sub_district'];
	$province = $_POST['province'];
	$post_code = $_POST['post_code'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	// Our insert query
	$query = "INSERT INTO customers
(
customer_name,
customer_sername,
address,
district,
sub_district,
province,
post_code,
phone,
email
)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	header('Content-Type: application/json');

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters */
	$stmt->bind_param('sssssssss', $customer_name, $customer_sername, $address, $district, $sub_district, $province, $post_code, $phone, $email);

	if ($stmt->execute()) {
		// If saving is successful
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'เพิ่มข้อมูลลูกค้าเรียบร้อยแล้ว!'
		));
	} else {
		// If unable to create a new record
		echo json_encode(array(
			'status' => 'Error',
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'
		));
	}

	// Close database connection
	$stmt->close();
	$mysqli->close();
}
//---------------------------------------------------------------------------------------------------------



// Adding employee
if ($action == 'add_employee') {
	$employee_name = $_POST['employee_name'];
	$employee_sername = $_POST['employee_sername']; // ใช้ $sername แบบเดิม
	$address = $_POST['address'];
	$sub_district = $_POST['sub_district'];
	$district = $_POST['district'];
	$province = $_POST['province'];
	$post_code = $_POST['post_code'];
	$start_date = $_POST['start_date'];
	$job_position = $_POST['job_position'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Hash the password securely
	$password = md5($password); // ใช้ md5 แบบเดิม

	// Your insert query
	$query = "INSERT INTO employees
(
employee_name,
employee_sername,
address,
sub_district,
district,
province,
post_code,
start_date,
job_position,
username,
email,
phone,
password
)
VALUES (
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?
)";

	header('Content-Type: application/json');

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
	$stmt->bind_param('sssssssssssss', $employee_name, $employee_sername, $address, $sub_district, $district, $province, $post_code, $start_date, $job_position, $username, $email, $phone, $password);

	if ($stmt->execute()) {
		// If saving is successful
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'เพิ่มข้อมูลโครงการเรียบร้อยแล้ว!'
		));
	} else {
		// If unable to create a new record
		echo json_encode(array(
			'status' => 'Error',
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'
		));
	}

	// Close database connection
	$stmt->close();
	$mysqli->close();
}

// Update customer
if ($action == 'update_customer') {
	// Output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$getID = $_POST['id'];
	$customer_name = $_POST['customer_name'];
	$customer_sername = $_POST['customer_sername'];
	$address = $_POST['address'];
	$district = $_POST['district'];
	$sub_district = $_POST['sub_district'];
	$province = $_POST['province'];
	$post_code = $_POST['post_code'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];


	// The SQL query for updating
	$query = "UPDATE customers SET
customer_name = ?,
customer_sername = ?,
address = ?,
district = ?,
sub_district = ?,
province = ?,
post_code = ?,
phone = ?,
email = ?
WHERE customer_id = ?
";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
	$stmt->bind_param(
		'sssssssssi', // Add "i" for integer (customer_id)
		$customer_name,
		$customer_sername,
		$address,
		$district,
		$sub_district,
		$province,
		$post_code,
		$phone,
		$email,
		$getID
	);

	// Execute the query
	if ($stmt->execute()) {
		// If updating is successful
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'แก้ไขข้อมูลลูกค้าเรียบร้อยแล้ว!'
		));
	} else {
		// If unable to update the record
		echo json_encode(array(
			'status' => 'Error',
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'
		));
	}

	// Close database connection
	$stmt->close();
	$mysqli->close();
}

//---------------------------------------------------------------------------------------------------------

// Update Employee

if ($action == 'update_employee') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// user information
	$getID = $_POST['id'];
	$employee_name = $_POST['employee_name'];
	$employee_sername = $_POST['employee_sername'];
	$address = $_POST['address'];
	$district = $_POST['district'];
	$sub_district = $_POST['sub_district'];
	$province = $_POST['province'];
	$post_code = $_POST['post_code'];
	$start_date = $_POST['start_date'];
	$job_position = $_POST['job_position'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];


	if ($password == '') {
		// the query
		$query = "UPDATE employees SET
employee_name = ?,
employee_sername = ?,
address = ?,
district = ?,
sub_district = ?,
province = ?,
post_code = ?,
start_date = ?,
job_position = ?,
username = ?,
email = ?,
phone = ?
WHERE employee_id = ?
";
	} else {
		// the query
		$query = "UPDATE employees SET
employee_name = ?,
employee_sername = ?,
address = ?,
district = ?,
sub_district = ?,
province = ?,
post_code = ?,
start_date = ?,
job_position = ?,
username = ?,
email = ?,
phone = ?,
password = ?
WHERE employee_id = ?
";
	}

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	if ($password == '') {
		/* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
		$stmt->bind_param(
			'ssssssssssssi',
			$employee_name,
			$employee_sername,
			$address,
			$district,
			$sub_district,
			$province,
			$post_code,
			$start_date,
			$job_position,
			$username,
			$email,
			$phone,
			$getID
		);
	} else {
		$password = md5($password);
		/* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
		$stmt->bind_param(
			'sssssssssssssi',
			$employee_name,
			$employee_sername,
			$address,
			$district,
			$sub_district,
			$province,
			$post_code,
			$start_date,
			$job_position,
			$username,
			$email,
			$phone,
			$password,
			$getID
		);
	}


	//execute the query
	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'แก้ไขข้อมูลพนักงานเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'

		));
	}

	$stmt->close();
	$mysqli->close();
}

//------------------------------------------------Update Project---------------------------------------------------------

if ($action == 'update_project') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$getID = $_POST['id'];
	$project_name = $_POST['project_name'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$project_value = $_POST['project_value'];
	$customer_id = $_POST['customer_id'];
	$employee_id = $_POST['employee_id'];
	$status_id = $_POST['status_id'];


	// the query
	$query = "UPDATE projects SET
    project_name = ?,
    start_date = ?,
    end_date = ?,
    project_value = ?,
    customer_id = ?,
    employee_id = ?,
    status_id = ?
WHERE project_id = ?";


	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}
	/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param(
		'ssssssss',
		$project_name,
		$start_date,
		$end_date,
		$project_value,
		$customer_id,
		$employee_id,
		$status_id,
		$getID
	);


	//execute the query
	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'แก้ไขข้อมูลโครงการเรียบร้อยแล้ว',

		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>',
		));
	}

	//close database connection
	$mysqli->close();
}




















//---------------------------------------------------------------------------------------------------------


// Delete Employee
if ($action == 'delete_employee') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$id = $_POST["delete"];

	// the query
	$query = "DELETE FROM employees WHERE employee_id = ?";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double, b = blob */
	$stmt->bind_param('s', $id);

	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'ลบข้อมูลพนักงานเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'
		));
	}

	// close connection
	$mysqli->close();
}

// Delete Customer
if ($action == 'delete_customer') {

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$customer_id = $_POST["delete"];

	// the query
	$query = "DELETE FROM customers WHERE customer_id = ?";

	/* Prepare statement */
	$stmt = $mysqli->prepare($query);
	if ($stmt === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	/* Bind parameters. TYpes: s = string, i = integer, d = double, b = blob */
	$stmt->bind_param('s', $customer_id);

	if ($stmt->execute()) {
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'ลบข้อมูลลูกค้าเรียบร้อยแล้ว!'
		));
	} else {
		//if unable to create new record
		echo json_encode(array(
			'status' => 'Error',
			//'message'=> 'There has been an error, please try again.'
			'message' => 'There has been an error, please try again.
<pre>' . $mysqli->error . '</pre>
<pre>' . $query . '</pre>'
		));
	}

	// close connection
	$mysqli->close();
}
