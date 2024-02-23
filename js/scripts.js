

$(document).ready(function () {


	// Load dataTables
	$("#data-table").dataTable();

	// add product

	$("#action_logout").click(function (e) {
		e.preventDefault();
		actionLogout();
	});

	$("#action_logout_2").click(function (e) {
		e.preventDefault();
		actionLogout();
	});

	$("#action_add_product").click(function (e) {
		e.preventDefault();
		actionAddProduct();
	});

	// add product
	$("#action_add_customer").click(function (e) {
		e.preventDefault();
		actionAddCustomer();
	});

	// // Open Date Picker for project
	// var dateFormat = $(this).attr('data-vat-rate');
	// $('#start_date, #end_date').datetimepicker({
	// 	showClose: false,
	// 	format: dateFormat
	// });


	// password strength
	var options = {
		onLoad: function () {
			$('#messages').text('Start typing password');
		},
		onKeyUp: function (evt) {
			$(evt.target).pwstrength("outputErrorList");
		}
	};
	$('#password').pwstrength(options);

	// add employee
	$("#action_add_employee").click(function (e) {
		e.preventDefault();
		actionAddEmployee();
	});

	$("#action_add_project").click(function (e) {
		e.preventDefault();
		actionAddProject();
	});

	// update Employee
	$(document).on('click', "#action_update_employee", function (e) {
		e.preventDefault();
		updateEmployee();
	});

	//update Project
	$(document).on('click', "#action_update_project", function (e) {
		e.preventDefault();
		updateProject();
	});

	// delete employee
	$(document).on('click', ".delete-employee", function (e) {
		e.preventDefault();

		var userId = 'action=delete_employee&delete=' + $(this).attr('data-employee-id'); //build a post data structure
		var user = $(this);

		$('#delete_employee').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete-employee', function () {
			deleteUser(userId);
			$(user).closest('tr').remove();
		});
	});

	// delete customer
	$(document).on('click', ".delete-customer", function (e) {
		e.preventDefault();

		var userId = 'action=delete_customer&delete=' + $(this).attr('data-customer-id'); //build a post data structure
		var user = $(this);

		$('#delete_customer').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete-customer', function () {
			deleteCustomer(userId);
			$(user).closest('tr').remove();
		});
	});

	// delete project
	$(document).on('click', ".delete-project", function (e) {
		e.preventDefault();

		var userId = 'action=delete_project&delete=' + $(this).attr('data-project-id'); //build a post data structure
		var user = $(this);

		$('#delete_project').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete-project', function () {
			deleteProject(userId);
			$(user).closest('tr').remove();
		});
	});

	// update customer
	$(document).on('click', "#action_update_customer", function (e) {
		e.preventDefault();
		updateCustomer();
	});

	// update product
	$(document).on('click', "#action_update_product", function (e) {
		e.preventDefault();
		updateProduct();
	});

	// login form
	$(document).bind('keypress', function (e) {
		e.preventDefault;

		if (e.keyCode == 13) {
			$('#btn-login').trigger('click');
		}
	});

	$(document).on('click', '#btn-login', function (e) {
		e.preventDefault;
		actionLogin();
	});


	//logout
	function actionLogout() {
		// สร้าง Modal
		var modalHtml = '<div class="modal" id="logoutModal">';
		modalHtml += '<div class="modal-dialog">';
		modalHtml += '<div class="modal-content">';
		modalHtml += '<div class="modal-header">';
		modalHtml += '<h4 class="modal-title">ยืนยันการออกจากระบบ</h4>';
		// modalHtml += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
		modalHtml += '</div>';
		modalHtml += '<div class="modal-body">';
		modalHtml += '<p>คุณต้องการออกจากระบบใช่หรือไม่?</p>';
		modalHtml += '</div>';
		modalHtml += '<div class="modal-footer">';
		modalHtml += '<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>';
		modalHtml += '<button type="button" class="btn btn-danger" id="confirmLogout">ยืนยัน</button>';
		modalHtml += '</div>';
		modalHtml += '</div>';
		modalHtml += '</div>';
		modalHtml += '</div>';

		$('body').append(modalHtml);

		$('#logoutModal').modal('show');

		$('#confirmLogout').click(function () {

			window.location.href = 'logout.php';

			$('#logoutModal').modal('hide');

		});
		$('#logoutModal').on('hidden.bs.modal', function () {
			$('#logoutModal').remove();
		});
	}





	// delete product
	$(document).on('click', ".delete-product", function (e) {
		e.preventDefault();

		var productId = 'action=delete_product&delete=' + $(this).attr('data-product-id'); //build a post data structure
		var product = $(this);

		$('#confirm').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete-product', function () {
			deleteProduct(productId);
			$(product).closest('tr').remove();
		});
	});



	function actionAddEmployee() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
			$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
			$("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
			$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_employee").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_employee").serialize(),
				dataType: 'json',
				success: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					setTimeout(function () {
						window.location.reload();
					}, 1500);
					$btn.button("reset");
				},
				error: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}

	function actionAddProduct() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
			$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
			$("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
			$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_product").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_product").serialize(),
				dataType: 'json',
				success: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					// ตั้งเวลาให้รอ 5 วินาทีก่อนที่จะรีโหลดหน้าเว็บ
					setTimeout(function () {
						window.location.reload();
					}, 1500);

					$btn.button("reset");
				},
				error: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}
	}

	function actionAddCustomer() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
			$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
			$("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
			$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_customer").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_customer").serialize(),
				dataType: 'json',
				success: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					setTimeout(function () {
						window.location.reload();
					}, 1500);
					$btn.button("reset");
				},
				error: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});
		}

	}

	function actionAddProject() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {
			$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
			$("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
			$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
		} else {

			$(".required").parent().removeClass("has-error");

			var $btn = $("#action_add_project").button("loading");

			$.ajax({

				url: 'response.php',
				type: 'POST',
				data: $("#add_project").serialize(),
				dataType: 'json',
				success: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					setTimeout(function () {
						window.location.reload();
					}, 1500);
					$btn.button("reset");
				},
				error: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					console.log("Error ที่นี่ ตรง Add Project");
				}

			});
		}

	}


	function deleteProduct(productId) {

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: productId,
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			}
		});

	}

	function deleteUser(userId) {

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: userId,
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			}
		});

	}

	function deleteCustomer(customer_id) {

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: customer_id,
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			}
		});

	}

	function deleteProject(project_id) {

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: project_id,
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
			}
		});

	}


	function updateProduct() {

		var $btn = $("#action_update_product").button("loading");

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: $("#update_product").serialize(),
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			}
		});

	}
	//Update Employee
	function updateEmployee() {

		var $btn = $("#action_update_employee").button("loading");

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: $("#update_employee").serialize(),
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			}
		});
	}

	function updateCustomer() {

		var $btn = $("#action_update_customer").button("loading");

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: $("#update_customer").serialize(),
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
			}
		});

	}


	function updateProject() {

		var $btn = $("#action_update_project").button("loading");

		jQuery.ajax({

			url: 'response.php',
			type: 'POST',
			data: $("#update_project").serialize(),
			dataType: 'json',
			success: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				setTimeout(function () {
					window.location.reload();
				}, 1500);
				$btn.button("reset");
			},
			error: function (data) {
				$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
				$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
				$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
				$btn.button("reset");
				console.log("พังตรงนี้ที่ Error Update Project")
			}
		});

	}


	// login function
	function actionLogin() {

		var errorCounter = validateForm();

		if (errorCounter > 0) {

			$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
			$("#response .message").html("<strong>Error</strong>: Missing something are we? check and try again!");
			$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);

		} else {

			var $btn = $("#btn-login").button("loading");

			jQuery.ajax({
				url: 'response.php',
				type: "POST",
				data: $("#login_form").serialize(), // serializes the form's elements.
				dataType: 'json',
				success: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-warning").addClass("alert-success").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
					setTimeout(() => {
						window.location = "dashboard.php";
					}, 1500);
				},
				error: function (data) {
					$("#response .message").html("<strong>" + data.status + "</strong>: " + data.message);
					$("#response").removeClass("alert-success").addClass("alert-warning").fadeIn();
					$("html, body").animate({ scrollTop: $('#response').offset().top }, 1000);
					$btn.button("reset");
				}

			});

		}

	}

	function validateForm() {
		// error handling
		var errorCounter = 0;

		$(".required").each(function (i, obj) {

			if ($(this).val() === '') {
				$(this).parent().addClass("has-error");
				errorCounter++;
			} else {
				$(this).parent().removeClass("has-error");
			}
		});

		return errorCounter;
	}



});