var host_url = "http://localhost/contract/"; // "/" at the last in necessary
var base_api_url = host_url + "api/";

var login = base_api_url + "auth/login.php";
var logout = base_api_url + "auth/logout.php";
var read_all = base_api_url + "contract/read_all.php";
var read_name = base_api_url + "contract/read_name.php";
var upload_contract = base_api_url + "contract/upload.php";
var get_client = base_api_url + "client/get.php";
var get_service = base_api_url + "service/get.php";
var get_service = base_api_url + "service/get.php";
var get_history = base_api_url + "service/get_history.php";
var get_legal = base_api_url + "service/get_legal.php";
var get_service_admin = base_api_url + "service/get_service_admin.php";
var create_contract = base_api_url + "contract/create.php";
var delete_contract = base_api_url + "contract/delete.php";
var read = base_api_url + "contract/read.php";
var update_contract = base_api_url + "contract/update.php";
var service_api = base_api_url + "contract/service_api.php";
var stats = base_api_url + "contract/stats.php";
var update_status = base_api_url + "contract/update_status.php";
var get_all_services = base_api_url + "service/get_all.php";

var update_service = base_api_url + "service/update_service.php";
var select_service = base_api_url + "service/getselectservice.php";
var master_service = base_api_url + "service/master_service.php";
var sub_service = base_api_url + "service/sub_service.php";
var subsub_service = base_api_url + "service/subsub_service.php";
var service_price = base_api_url + "service/service_price.php";
var delete_service = base_api_url + "service/deleteservice.php";
var get_service_byid = base_api_url + "service/get_service_byid.php";


function objectifyForm(formArray) {
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}

$('#link_logout').click(function () {
    $.ajax({
        url: logout,
        type: 'get',
        data: {},
        success: function (data) {
        }
    });
});

$('.success-alert-overlay').click(function () {
    $(this).fadeOut();
});