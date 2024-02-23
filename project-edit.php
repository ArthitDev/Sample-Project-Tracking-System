<?php
include('header.php');
include('functions.php');


$getID = $_GET['id'];

$customerQuery = "SELECT DISTINCT customer_id,customer_name FROM customers";
$customerResult = mysqli_query($mysqli, $customerQuery);

// Query to get distinct employee names
$employeeQuery = "SELECT DISTINCT employee_id,employee_name FROM employees";
$employeeResult = mysqli_query($mysqli, $employeeQuery);

$statusQuery = "SELECT DISTINCT status_id,status_name FROM status";
$statusResult = mysqli_query($mysqli, $statusQuery);


$query = "SELECT * FROM projects WHERE project_id = '" . $mysqli->real_escape_string($getID) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $project_name = $row['project_name'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $project_value = $row['project_value'];
        $status_id = $row['status_id'];
        $customer_id = $row['customer_id'];
        $employee_id = $row['employee_id'];
    }
}

/* close connection */
$mysqli->close();
?>

<div class="text-center">
    <h1>แก้ไขข้อมูลโครงการ</h1>
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
                <h4>ข้อมูลโครงการ</h4>
            </div>
            <div class="panel-body form-group form-group-sm">
                <form method="post" id="update_project">
                    <input type="hidden" name="action" value="update_project">
                    <input type="hidden" name="id" value="<?php echo $getID; ?>">
                    <div class="row">
                        <div class="col-xs-4">
                            ชื่อโครงการ
                            <input type="text" class="form-control margin-bottom required" name="project_name" placeholder="ป้อนชื่อ" value="<?php echo $project_name; ?>">
                        </div>
                        <div class="col-xs-4">
                            ลูกค้า
                            <select name="customer_id" required class="form-control">
                                <?php
                                $customer_found = false;
                                foreach ($customerResult as $row) {
                                    $cid = $row['customer_id'];
                                    $customer_name = $row['customer_name'];
                                    $selected = ($cid == $customer_id) ? 'selected' : '';

                                    echo "<option value='$cid' $selected>$customer_name</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            วันเริ่มโครงการ
                            <input type="date" class="form-control margin-bottom required" name="start_date" placeholder="วันเริ่มต้นโครงการ" value="<?php echo $start_date; ?>">
                        </div>
                        <div class="col-xs-4">
                            วันสิ้นสุดโครงการ
                            <input type="date" class="form-control margin-bottom required" name="end_date" placeholder="วันสิ้นสุดโครงการ" value="<?php echo $end_date; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            มูลค่าโครงการ
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo CURRENCY ?></span>
                                <input type="text" name="project_value" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1" value="<?php echo $project_value; ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            ผู้ดูแลโครงการ
                            <select name="employee_id" required class="form-control">
                                <?php
                                $employee_found = false;
                                foreach ($employeeResult as $row) {
                                    $eid = $row['employee_id'];
                                    $employee_name = $row['employee_name'];
                                    $selected = ($eid == $employee_id) ? 'selected' : '';

                                    echo "<option value='$eid' $selected>$employee_name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            สถานะโครงการ
                            <select name="status_id" required class="form-control">
                                <?php
                                $status_found = false;
                                foreach ($statusResult as $row) {
                                    $sid = $row['status_id'];
                                    $status_name = $row['status_name'];
                                    $selected = ($sid == $status_id) ? 'selected' : '';

                                    echo "<option value='$sid' $selected>$status_name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 margin-top btn-group">
                            <input type="submit" id="action_update_project" class="btn btn-success float-right" value="แก้ไขข้อมูลโครงการ" data-loading-text="กำลังแก้ไขข้อมูลโครงการ...">
                        </div>
                    </div>
                </form>
                <p><a href="project-list.php">กลับไปยังหน้าแสดงรายละเอียดโครงการ</a></p>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>