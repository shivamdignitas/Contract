var nameList = null;
var fileName = null;
var clientId = null;

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

    

    var fileName = null;
    $("#contract_upload").change(function (evt) {
        var files = evt.target.files;
        var file = files[0];
        fileName = file.name;

        if (files && file) {
            var reader = new FileReader();

            reader.onload = function (readerEvt) {
                var binaryString = readerEvt.target.result;
                var q = btoa(binaryString);
                $('#upload_con').val(q);
                $('#contract_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#upload_name').val(fileName);
                $('#contract_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#contract_preview').attr('download', fileName);
                $('#contract_preview').html(fileName);

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
                $("#downpdf_link").attr('href', 'data:application/preventDefault;base64,' + data);
                $('#downpdf_link').attr('download', fileName);
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

