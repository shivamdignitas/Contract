var nameList = null;
var fileName = null;

$(document).ready(function () {
    $('.success-alert-overlay').hide();

    $('#link_logout').click(function () {
        $.ajax({
            url: logout,
            type: 'get',
            data: {},
            success: function (data) {
            }
        });
    });

    $("#contract_upload").change(function (evt) {
        var files = evt.target.files;
        var file = files[0];
        var fileName = file.name;

        if (files && file) {
            var reader = new FileReader();

            reader.onload = function (readerEvt) {
                var binaryString = readerEvt.target.result;
                var q = btoa(binaryString);
                $('#upload_con').val(q);
                $('#contract_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#upload_name').val(fileName);

            };

            reader.readAsBinaryString(file);
        }
    });

    $.ajax({
        url: read_name,
        type: "get",
        data: {},
        success: function (data) {
            nameList = JSON.parse(data);
            nameList.forEach(service => {
                $(".list").append('<li>"' + service.file_name + '"</li>');
            });
        }
    });

    $("#upload_contract").submit(function (event) {
        event.preventDefault();
        var dataFromForm = objectifyForm($("#upload_contract").serializeArray());

        $.ajax({
            url: upload_contract,
            type: "post",
            data: dataFromForm,
            success: function (data) {
                $('.success-alert-overlay').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $("#upload_contract").trigger('reset');
                $.ajax({
                    url: read_name,
                    type: "get",
                    data: {},
                    success: function (data) {
                        $(".list").html('');
                        nameList = JSON.parse(data);
                        nameList.forEach(service => {
                            $(".list").append('<li>"' + service.file_name + '"</li>');
                        });
                    }
                });
            }
        });

    });
});