$(document).ready(function () {

	$("#register").submit(function (event) {

		event.preventDefault();
		var dataFromForm = objectifyForm($("#register").serializeArray());
		$.ajax({
			url: register,
			type: "post",
			data: dataFromForm,
			success: function (data) {
				console.log(data);
				if (data == 1) 
					alert("registered Successfully");
				else
					alert(Failed Registration)

				/* $('.success-alert-overlay').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $("#register").trigger('reset');*/
				/*if (data == 1) {
					window.location.href = host_url + "user/index.php";
				} else if (data == 0) {
					window.location.href = host_url + "admin/dashboard.php";
				} else {
					alert("Invalid Credentials");
				}*/
			}
		});

	});
});