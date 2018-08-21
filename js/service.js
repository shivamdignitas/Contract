var serviceList = null;

$(document).ready(function () {
    //var serviceList = null;
    var tempArrayObjects = [];
    var tempArrayids = [];
    var subServiceList = [];
    var subServiceIdList = [];
    var subSubServiceList = [];
    $.ajax({
        url: get_service_admin,
        type: "get",
        data: {},
        success: function (data) {
            serviceList = JSON.parse(data);
            //console.log(serviceList);
            serviceList.forEach(service => {
                if (service.parent_id === null || service.parent_id === "" || service.parent_id === 'NULL') {
                    if (tempArrayids.indexOf(service.id) < 0) {
                        tempArrayids.push(service.id);
                        tempArrayObjects.push(service);
                    }
                } else {
                    subServiceList.push(service);
                }
            });

            tempArrayObjects.forEach(masterService => {
                $("#scope_list").append('<li><div class = "check"><input type="checkbox" class="Option" name = "sub_' + masterService.id + '" value =  "' + masterService.id + '" /><label for="master_' + masterService.id + '"> ' + masterService.service_name + '</label><br /></div></li >');
                //console.log(masterService);
            });

            subServiceList.forEach(subService => {
                if (subService.id > 44 && subService.id <= 55) {
                    $("#sub_list_" + subService.parent_id).append('<li><div class="check"><label for="input-lable-' + subService.id + '"> <input type="checkbox" id="input-lable-' + subService.id + '" class="subOption" data-master-id="' + subService.parent_id + '" value="' + subService.id + '" name="sub_' + subService.parent_id + '"/> ' + subService.service_name + '</label>&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "price"><label for="service_price"> Price Tag  <span style="color:red"></span></label><input style="opacity: 0;" id ="price_' + subService.id + '" type="number" value="' + subService.service_price + '"/></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "comm"><textarea style="opacity: 0;" id = "comment_' + subService.id + '" type="text" placeholder="Enter Comments"/></textarea></div><br /><ul id="sub_sub_list_' + subService.id + '"></ul></li>');
                } else {
                    $("#sub_list_" + subService.parent_id).append('<li><div class="check"> <label for="input-lable-' + subService.id + '"> <input type="checkbox" id="input-lable-' + subService.id + '" class="subOption" data-master-id="' + subService.parent_id + '" value="' + subService.id + '" name="sub_' + subService.parent_id + '"/> ' + subService.service_name + '</label>&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "price"><label for="service_price"> Price Tag  <span style="color:red"></span></label><input id ="price_' + subService.id + '" type="number" value="' + subService.service_price + '"/></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class = "comm"><textarea id = "comment_' + subService.id + '" type="text" placeholder="Enter Comments"/></textarea></div><br /><ul id="sub_sub_list_' + subService.id + '"></ul></li>');
                }
            });


            subSubServiceList.forEach(subSubService => {
                $("#sub_sub_list_" + subSubService.parent_id).append('<li class="sub-l3-li"><div> <label for="input-lable1-' + subSubService.id + '"> <input type="checkbox" class="subOption" id ="input-lable1-' + subSubService.id + '" data-master-id="' + subSubService.parent_id + '" value="' + subSubService.id + '" name="sub_sub_' + subSubService.parent_id + '"/> ' + subSubService.service_name + '</label>&nbsp;</div></li>');
            });

            
        }
    });
    $('#done_service').submit(function () {
        event.preventDefault();

        var dataFromForm = objectifyForm($("#done_service").serializeArray());
        //myCheckboxes_scope = [];
        var myCheckboxes_scope = [];
        var myCheckboxes_sub_scope = [];
        //var myCheckboxes_legal = [];
        //var myCheckboxes_sla = [];

        tempArrayids.forEach(masterServiceID => {
            $.each($("input[name='sub_" + masterServiceID + "']:checked"), function () {
                var t = {
                    'id': $(this).val()
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
        
        var q = "scope";
        dataFromForm[q] = myCheckboxes_scope;

         var r = "sub_scope";
        dataFromForm[r] = myCheckboxes_sub_scope;


        $.ajax({
            url: service_api,
            type: "post",
            data: dataFromForm,
            success: function (data) {
                console.log(data);
                $('.success-alert-overlay').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $("#done_service").trigger('reset');


            }
        });


    });
});    
