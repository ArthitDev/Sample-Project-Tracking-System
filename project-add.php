<?php
include('header.php');
include('functions.php');

// Query to get distinct customer names
$customerQuery = "SELECT DISTINCT customer_id,customer_name FROM customers";
$customerResult = mysqli_query($mysqli, $customerQuery);

// Query to get distinct employee names
$employeeQuery = "SELECT DISTINCT employee_id,employee_name FROM employees";
$employeeResult = mysqli_query($mysqli, $employeeQuery);

$statusQuery = "SELECT DISTINCT status_id,status_name FROM status";
$statusResult = mysqli_query($mysqli, $statusQuery);
?>

<div class="text-center">
    <h1>เพิ่มข้อมูลโครงการ</h1>
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
                <form method="post" id="add_project">
                    <input type="hidden" name="action" value="add_project">
                    <div class="row">
                        <div class="col-xs-4">
                            ชื่อโครงการ
                            <input type="text" class="form-control margin-bottom required" name="project_name" placeholder="ป้อนชื่อ">
                        </div>
                        <div class="col-xs-4">
                            ลูกค้า
                            <select class="form-control margin-bottom required" name="customer_id">
                                <option value="">-- เลือกลูกค้า --</option> <!-- Empty option -->
                                <?php
                                while ($customerRow = mysqli_fetch_assoc($customerResult)) {
                                    echo '<option value="' . $customerRow['customer_id'] . '">' . $customerRow['customer_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            วันเริ่มโครงการ
                            <input type="date" class="form-control margin-bottom required" name="start_date" placeholder="วันเริ่มต้นโครงการ">
                        </div>
                        <div class="col-xs-4">
                            วันสิ้นสุดโครงการ
                            <input type="date" class="form-control margin-bottom required" name="end_date" placeholder="วันสิ้นสุดโครงการ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            มูลค่าโครงการ
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo CURRENCY ?></span>
                                <input type="text" name="project_value" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            ผู้ดูแลโครงการ
                            <select class="form-control margin-bottom required" name="employee_id">
                                <option value="">-- เลือกผู้ดูแลโครงการ --</option> <!-- Empty option -->
                                <?php
                                // Populate employee select options
                                while ($employeeRow = mysqli_fetch_assoc($employeeResult)) {
                                    echo '<option value="' . $employeeRow['employee_id'] . '">' . $employeeRow['employee_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            สถานะโครงการ
                            <select type="text" class="form-control margin-bottom required" name="status_id">
                                <option value="">-- เลือกสถานะโครงการ --</option> <!-- Empty option -->
                                <?php
                                // Populate employee select options
                                while ($statusRow = mysqli_fetch_assoc($statusResult)) {
                                    echo '<option value="' . $statusRow['status_id'] . '">' . $statusRow['status_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 margin-top btn-group">
                            <input type="submit" id="action_add_project" class="btn btn-success float-right" value="เพิ่มข้อมูลโครงการ" data-loading-text="กำลังเพิ่มข้อมูลโครงการ...">
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