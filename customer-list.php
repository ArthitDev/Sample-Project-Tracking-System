<?php


include('header.php');
include('functions.php');

?>
<div class="text-center">
	<h1>รายละเอียดลูกค้า</h1>
</div>
<hr>

<div class="row">

	<div class="col-xs-12">
		<div id="response" class="alert alert-success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<div class="message"></div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>ข้อมูลลูกค้า</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<?php getCustomers(); ?>
			</div>
		</div>
	</div>
	<div>

		<div id="delete_customer" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">ลบลูกค้า</h4>
					</div>
					<div class="modal-body">
						<p>คุณต้องการลบลูกค้านี้หรือไม่ ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-primary" id="delete-customer">ตกลง</button>
						<button type="button" data-dismiss="modal" class="btn">ยกเลิก</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<?php
		include('footer.php');
		?>