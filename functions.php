<?php


include_once("includes/config.php");



// get products list
function getProducts()
{

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM products ORDER BY product_name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if ($results) {

		print '<table class="table table-striped table-hover table-bordered" id="data-table"><thead><tr>

				<th>ชื่อสินค้า</th>
				<th>คำอธิบายสินค้า</th>
				<th>หน่วยนับ</th>
				<th>ราคา</th>
				<th>จัดการ</th>

			  </tr></thead><tbody>';

		while ($row = $results->fetch_assoc()) {

			print '
			    <tr>
					<td>' . $row["product_name"] . '</td>
				    <td>' . $row["product_desc"] . '</td>
					<td>' . $row["product_unit"] . '</td>
				    <td>฿' . $row["product_price"] . '</td>
				    <td><a href="product-edit.php?id=' . $row["product_id"] . '" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-product-id="' . $row['product_id'] . '" class="btn btn-danger btn-xs delete-product"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';
	} else {

		echo "<p>There are no products to display.</p>";
	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}

// get Employees list
function getEmployee()
{

	// Connect to the database
	$mysqli = new mysqli("localhost", "root", "", "db_project");

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM employees ORDER BY employee_name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if ($results) {

		// print '<table class="table table-striped table-hover table-bordered" employee_id="data-table"><thead><tr>
		print '<table class="table table-striped table-hover table-bordered" id="data-table"><thead><tr>

				<th>ชื่อ</th>
				<th>นามสกุล</th>
				<th>ที่อยู่</th>
				<th>ตำบล</th>
				<th>อำเภอ</th>
				<th>จังหวัด</th>
				<th>รหัสไปรษณีย์</th>
				<th>วันเริ่มทำงาน</th>
				<th>ตำแหน่งงาน</th>
				<th>ชื่อสำหรับใช้เข้าสู่ระบบ</th>
				<th>อีเมล</th>
				<th>เบอร์โทรศัพท์</th>
				<th>จัดการ</th>

			  </tr></thead><tbody>';

		while ($row = $results->fetch_assoc()) {

			print '
			    <tr>
			    	<td>' . $row['employee_name'] . '</td>
					<td>' . $row["employee_sername"] . '</td>
					<td>' . $row["address"] . '</td>
				    <td>' . $row["district"] . '</td>
				    <td>' . $row["sub_district"] . '</td>
					<td>' . $row["province"] . '</td>
					<td>' . $row["post_code"] . '</td>
					<td>' . $row["start_date"] . '</td>
					<td>' . $row["job_position"] . '</td>
					<td>' . $row["username"] . '</td>
					<td>' . $row["email"] . '</td>
					<td>' . $row["phone"] . '</td>
				    <td><a href="employee-edit.php?id=' . $row["employee_id"] . '" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-employee-id="' . $row['employee_id'] . '" class="btn btn-danger btn-xs delete-employee"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';
	} else {

		echo "<p>There are no users to display.</p>";
	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}

// get user list
function getCustomers()
{

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM customers ORDER BY customer_name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if ($results) {

		print '<table class="table table-striped table-hover table-bordered" id="data-table"><thead><tr>

				<th>ชื่อ</th>
				<th>นามสกุล</th>
				<th>ที่อยู่</th>
				<th>ตำบล</th>
				<th>อำเภอ</th>
				<th>จังหวัด</th>
				<th>รหัสไปรษณีย์</th>
				<th>เบอร์โทร</th>
				<th>อีเมล</th>
				<th>จัดการ</th>

			  </tr></thead><tbody>';

		while ($row = $results->fetch_assoc()) {

			print '
			    <tr>
					<td>' . $row["customer_name"] . '</td>
					<td>' . $row["customer_sername"] . '</td>
					<td>' . $row["address"] . '</td>
					<td>' . $row["district"] . '</td>
					<td>' . $row["sub_district"] . '</td>
					<td>' . $row["province"] . '</td>
					<td>' . $row["post_code"] . '</td>
					<td>' . $row["phone"] . '</td>
				    <td>' . $row["email"] . '</td>
				    <td><a href="customer-edit.php?id=' . $row["customer_id"] . '" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-customer-id="' . $row['customer_id'] . '" class="btn btn-danger btn-xs delete-customer"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';
	} else {

		echo "<p>There are no customers to display.</p>";
	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}


function getProjects()
{
	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// Output any connection error
	if ($mysqli->connect_error) {
		die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	// The query
	$query = "SELECT projects.project_id, projects.project_name, projects.start_date, projects.end_date, 
              projects.project_value,customers.customer_name, employees.employee_name, status.status_name
              FROM projects
              INNER JOIN customers ON projects.customer_id = customers.customer_id
              INNER JOIN employees ON projects.employee_id = employees.employee_id
              INNER JOIN status ON projects.status_id = status.status_id";

	// Execute the query
	$results = $mysqli->query($query);

	// Check for query execution error
	if (!$results) {
		echo "<p>There was an error executing the query.</p>";
		return;
	}

	// Print table headers
	echo '<table class="table table-striped table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>ชื่อโครงการ</th>
                    <th>วันเริ่มโครงการ</th>
                    <th>วันสิ้นสุดโครงการ</th>
                    <th>มูลค่าโครงการ</th>
                    <th>ชื่อลูกค้า</th>
                    <th>ผู้ดูแลโครงการ</th>
                    <th>สถานะโครงการ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>';

	// Loop through query results
	while ($row = $results->fetch_assoc()) {
		echo '
            <tr>
                <td>' . $row["project_name"] . '</td>
                <td>' . $row["start_date"] . '</td>
                <td>' . $row["end_date"] . '</td>
                <td>฿' . $row["project_value"] . '</td>
                <td>' . $row["customer_name"] . '</td>
                <td>' . $row["employee_name"] . '</td>
				<td>' . $row["status_name"] . '</td>
                <td>
                    <a href="project-edit.php?id=' . $row["project_id"] . '" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a data-project-id="' . $row['project_id'] . '" class="btn btn-danger btn-xs delete-project"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>';
	}

	// Close the table
	echo '</tbody></table>';

	// Free the memory associated with the result
	$results->free();

	// Close the database connection
	$mysqli->close();
}
