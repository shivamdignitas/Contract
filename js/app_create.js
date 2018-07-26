var clientList = null;
var serviceList = null;
var legalList = null;
var fileName = null;

$(document).ready(function () {

    $('.success-alert-overlay').hide();

    $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        format: 'yyyy-mm-dd'
    });

    $('.prev i').removeClass();
    $('.prev i').addClass("fa fa-chevron-left");

    $('.next i').removeClass();
    $('.next i').addClass("fa fa-chevron-right");

    var isOpen_1 = false;
    $('#contract_start_date').click(function () {
        if (isOpen_1) {
            $('#contract_start_date').blur();
        }
        isOpen_1 = !isOpen_1;
    });
    var isOpen_2 = false;
    $('#contract_end_date').click(function () {
        if (isOpen_2) {
            $('#contract_end_date').blur();
        }
        isOpen_2 = !isOpen_2;
    });

    $('#existing_client_list').on('change', function () {
        var selected = $('#existing_client_list').find(":selected").attr('data-client-id');
        updateExistingClient(selected);
    });

    $('#client_pan').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    $.ajax({
        url: get_client,
        type: "get",
        data: {},
        success: function (data) {
            clientList = JSON.parse(data);
            $("#existing_client_list").append('<option class="nav-item client-pill">Select</option>');
            clientList.forEach(client => {

                $("#existing_client_list").append('<option class="nav-item client-pill"  data-client-id="' + client.client_id + '">' + client.client_name + '</option>');
            });
        }
    });

    var tempArrayObjects = [];
    var tempArrayids = [];
    var subServiceList = [];
    var subServiceIdList = [];
    var subSubServiceList = [];
    $.ajax({
        url: get_service,
        type: "get",
        data: {},
        success: function (data) {
            //console.log(data);
            serviceList = JSON.parse(data);
            serviceList.forEach(service => {
                if (service.parent_id === null || service.parent_id === "" || service.parent_id === 'NULL') {
                    if (tempArrayids.indexOf(service.id) < 0) {
                        tempArrayids.push(service.id);
                        tempArrayObjects.push(service);
                    }
                } else {
                    if (subServiceIdList.indexOf(service.parent_id) < 0) {
                        subServiceList.push(service);
                        subServiceIdList.push(service.id);
                    } else {
                        subSubServiceList.push(service);
                    }
                }
            });

            tempArrayObjects.forEach(masterService => {
                $("#scope_list").append('<li><label for="master_' + masterService.id + '"> ' + masterService.service_name + '</label><br /><ul id="sub_list_' + masterService.id + '"></ul></li >');
            });

            subServiceList.forEach(subService => {
                if (subService.id > 44 && subService.id <= 55) {
                    $("#sub_list_" + subService.parent_id).append('<li><div class="check"><label for="input-lable-' + subService.id + '"> <input type="checkbox" id="input-lable-' + subService.id + '" class="subOption" data-master-id="' + subService.parent_id + '" value="' + subService.id + '" name="sub_' + subService.parent_id + '"/> ' + subService.service_name + '</label>&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "price"><input style="opacity: 0;" id ="price_' + subService.id + '" type="number" value="' + subService.service_price + '"/></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "comm"><textarea style="opacity: 0;" id = "comment_' + subService.id + '" type="text" placeholder="Enter Comments"/></textarea></div><br /><ul id="sub_sub_list_' + subService.id + '"></ul></li>');
                } else {
                    $("#sub_list_" + subService.parent_id).append('<li><div class="check"> <label for="input-lable-' + subService.id + '"> <input type="checkbox" id="input-lable-' + subService.id + '" class="subOption" data-master-id="' + subService.parent_id + '" value="' + subService.id + '" name="sub_' + subService.parent_id + '"/> ' + subService.service_name + '</label>&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "price"> <input id ="price_' + subService.id + '" type="number" value="' + subService.service_price + '"/></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "comm"><textarea id = "comment_' + subService.id + '" type="text" placeholder="Enter Comments"/></textarea></div><br /><ul id="sub_sub_list_' + subService.id + '"></ul></li>');
                }
            });


            subSubServiceList.forEach(subSubService => {
                $("#sub_sub_list_" + subSubService.parent_id).append('<li class="sub-l3-li"><div> <label for="input-lable1-' + subSubService.id + '"> <input type="checkbox" class="subOption" id ="input-lable1-' + subSubService.id + '" data-master-id="' + subSubService.parent_id + '" value="' + subSubService.id + '" name="sub_sub_' + subSubService.parent_id + '"/> ' + subSubService.service_name + '</label>&nbsp;</div></li>');
            });
        }
    });
    $.ajax({
        url: get_legal,
        type: "get",
        data: {},
        success: function (data) {
            legalList = JSON.parse(data);
            legalList.forEach(legal => {

                //console.log(legal);
                $("#legal").append('<li><input type="checkbox" checked legal-id="' + legal.id + '" name="legal" />&nbsp;<textarea id = "legal_id_' + legal.id + '" value ="name_' + legal.id + '" >' + legal.name + '</textarea></li>');
                //console.log(masterService);
            });

        }
    });
    $.ajax({
        url: get_legal,
        type: "get",
        data: {},
        success: function (data) {
            legalList = JSON.parse(data);
            legalList.forEach(sla => {

                //console.log(sla);
                $("#sla").append('<li><input type="checkbox" checked sla-id="' + sla.id + '" name="sla_terms" />&nbsp;<textarea id = "sla_id_' + sla.id + '" value ="name_' + sla.id + '" >' + sla.name + '</textarea></li>');
                //console.log(masterService);
            });

        }
    });

    $("#client_gstn_upload").change(function (evt) {
        var files = evt.target.files;
        var file = files[0];
        fileName = file.name;
        if (files && file) {
            var reader = new FileReader();

            reader.onload = function (readerEvt) {
                var binaryString = readerEvt.target.result;
                var q = btoa(binaryString);
                $('#client_gstn').val(q);
                $('#gstn_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#gstn_name').val(fileName);
                $('#gstn_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#gstn_preview').attr('download', fileName);
                $('#gstn_preview').html(fileName);
            };

            reader.readAsBinaryString(file);
        }
    });


    $("#create_contract").submit(function (event) {


        event.preventDefault();

        var dataFromForm = objectifyForm($("#create_contract").serializeArray());

        var myCheckboxes_scope = [];
        var myCheckboxes_sub_scope = [];
        var myCheckboxes_legal = [];
        var myCheckboxes_sla = [];


        tempArrayids.forEach(masterServiceID => {
            $.each($("input[name='sub_" + masterServiceID + "']:checked"), function () {
                var t = {
                    'parent_id': $(this).attr('data-master-id'),
                    'id': $(this).val(),
                    'price': $('#price_' + $(this).val() + '').val(),
                    'comment': $('#comment_' + $(this).val() + '').val()
                };
                myCheckboxes_scope.push(t);
            });
        });

        subServiceIdList.forEach(subServiceID => {
            $.each($("input[name='sub_sub_" + subServiceID + "']:checked"), function () {
                var t = {
                    'parent_id': $(this).attr('data-master-id'),
                    'id': $(this).val()
                };
                myCheckboxes_sub_scope.push(t);
            });
        });

        $.each($("input[name ='legal']:checked"), function () {
            var s = {
                'id': $(this).attr('legal-id'),
                'name': $('#legal_id_' + $(this).attr('legal-id') + '').val()
            };
            myCheckboxes_legal.push(s);
        });

        $.each($("input[name ='sla_terms']:checked"), function () {
            var u = {
                'id': $(this).attr('sla-id'),
                'name': $('#sla_id_' + $(this).attr('sla-id') + '').val()
            };
            myCheckboxes_sla.push(u);
        });


        var q = "scope";
        dataFromForm[q] = myCheckboxes_scope;

        var r = "sub_scope";
        dataFromForm[r] = myCheckboxes_sub_scope;
        //console.log(dataFromForm);

        var m = "legal";
        dataFromForm[m] = myCheckboxes_legal;

        var n = "sla";
        dataFromForm[n] = myCheckboxes_sla;
        //console.log(dataFromForm);

        var contract_start_date = $("#contract_start_date").datetimepicker('getDate');
        var contract_end_date = $("#contract_end_date").datetimepicker('getDate');

        var diff = contract_end_date - contract_start_date;
        var days = diff / 1000 / 60 / 60 / 24;

        if (days <= 0) {
            alert('End Time must be greater than Start Time.');
            return false;
        }

        if (myCheckboxes_scope.length == 0) {
            alert('Atleast one scope must be selected.');
            return false;
        }
        if ($("#client_pan").val().length != 10) {
            alert('PAN must be 10 chars.');
            return false;
        }

        //Pattern pattern = Pattern.compile("[A-Za-z]{5}\d{4}[A-Za-z]{1}");

        var re = new RegExp("[A-Za-z]{5}[0-9]{4}[A-Z]{1}");
        if (!re.test($('#client_pan').val())) {
            alert('PAN should be alphanumeric and valid pan number');
            return false;
        }


        $.ajax({
            url: create_contract,
            type: "post",
            data: dataFromForm,
            success: function (data) {
               
                $("#downpdf_link").attr("href", host_url + "generated/contracts/" + data);
                $('.success-alert-overlay').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $("#create_contract").trigger('reset');

            }
        });

    });

});

function updateExistingClient(client_id) {

    clientList.forEach(client => {
        if (parseInt(client.client_id) == client_id) {
            populateClientFields(client);
        }
    });
}

function populateClientFields(client_object) {

    $("#client_name").val(client_object.client_name);
    $("#client_spoc").val(client_object.client_spoc);
    $("#client_contact_no").val(client_object.client_contact_no);
    $("#client_pan").val(client_object.client_pan);
    $("#client_billing_address").val(client_object.client_billing_address);
    $("#client_payment_terms").val(client_object.client_payment_terms);
    $("#client_email_address").val(client_object.client_email_address);
    $("#client_id").val(client_object.client_id);
    $("#client_gstn").val(client_object.client_gstn);
    $("#gstn_name").val(client_object.client_gstn_name);

    $('#gstn_preview').attr('href', 'data:application/pdf;base64,' + client_object.client_gstn);
    $('#gstn_preview').attr('download', client_object.client_gstn_name);
    $('#gstn_preview').html(client_object.client_gstn_name);
}