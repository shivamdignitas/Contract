$(document).ready(function () {

	$("#login").submit(function (event) {

		event.preventDefault();
		var dataFromLogin = objectifyForm($("#login").serializeArray());
		$.ajax({
			url: login,
			type: "post",
			data: dataFromLogin,
			success: function (data) {
				if (data == 1) {
					window.location.href = host_url + "user/index.php";
				} else if (data == 0) {
					window.location.href = host_url + "admin/dashboard.php";
				} else {
					alert("Invalid Credentials");
				}
			}
		});

	});
});