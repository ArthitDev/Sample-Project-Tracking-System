<?php
include('header.php');

?>
<div class="text-center">
	<h1>เพิ่มข้อมูลสินค้า</h1>
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
				<h4>รายละเอียดของสินค้า</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_product">
					<input type="hidden" name="action" value="add_product">

					<div class="row">
						<div class="col-xs-3">
							ชื่อสินค้า
							<input type="text" class="form-control required" name="product_name" placeholder="ป้อนชื่อสินค้า">
						</div>
						<div class="col-xs-3">
							คำอธิบายสินค้า
							<input type="text" class="form-control required" name="product_desc" placeholder="ป้อนคำอธิบายสินค้า">
						</div>
						<div class="col-xs-3">
							หน่วยนับ
							<input type="text" class="form-control required" name="product_unit" placeholder="ป้อนหน่วยนับสินค้า">
						</div>
						<div class="col-xs-3">
							ราคา
							<div class="input-group">
								<span class="input-group-addon"><?php echo CURRENCY ?></span>
								<input type="number" name="product_price" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<input type="submit" id="action_add_product" class="btn btn-success float-right" value="เพิ่มสินค้า" data-loading-text="กำลังเพิ่มสินค้า...">
						</div>
					</div>
				</form>
				<p><a href="product-list.php">กลับไปยังหน้าแสดงรายการสินค้า</a></p>
			</div>
		</div>
	</div>
	<div>


		<?php
		include('footer.php');
		?>