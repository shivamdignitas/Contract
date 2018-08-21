$(document).ready(function () {

    $('#link_logout').click(function () {
        $.ajax({
            url: logout,
            type: 'get',
            data: {},
            success: function (data) {
            }
        });
    });

    google.charts.load('current', { 'packages': ['table'] });
    google.charts.setOnLoadCallback(loadTableSchema);
    var gridData = null;
    //var value = null;

    var queryStringObject = getUrlVars();

    /*$("#existing_client_list").on('change',function() {
         var value = $(this).val();
        $.ajax(
        {
            url: fetch + "?id=" + queryStringObject['id'],
            type:'POST',
            data:'request='+value,
            beforeSend:function()
            {
                $("#table_div").html("Working On...");

            },
            success:function(data)
            {
                $("#table_div").html(data);
            },
        });
    });*/

    function startWork() {

        $.ajax({
            url: viewcompany + "?id=" + queryStringObject['id'],
            type: "get",
            data: {},
            success: function (data) {
                var con_type = null;
                var parsed_data = JSON.parse(data);
                var j=0;
                //var ptr=null;
                parsed_data.forEach(element => {
                    if (element.contract_type == 1) {
                        con_type = "Digital Marketing";
                    } else if (element.contract_type == 2) {
                        con_type = "Technical;"
                    } else {
                        con_type = "Digital Marketing and Technical";
                    }
                    var temp = null;
                    var con_stat = null;
                    if (element.contract_status == 0) {
                        con_stat = "Lead";
                    }
                    else if (element.contract_status == 1) {
                        con_stat = "Proposal";
                    }
                    else if (element.contract_status == 2) {
                        con_stat = "Agreement";
                    }
                    else if (element.contract_status == 3) {
                        con_stat = "Contract";
                    }
                    else if (element.contract_status == 4){
                        con_stat = "Closed";
                    }
                    var status_temp_array = ['Lead','Proposal','Agreement','Contract','Closed'];
                    for (var i = 0; i < 5; i++) {
                        if (con_stat == status_temp_array[i]) {
                            temp += '<option value="' + i + '" selected = "selected">' + status_temp_array[i] + '</option>';
                            //console.log(temp);
                        } else {
                            temp += '<option value="' + i + '">' + status_temp_array[i] + '</option>';
                        }
                    }

                    j=j+1;
                    //ptr = element.contract_status;

                    gridData.addRow(

                        [
                            //element.contract_id,
                            j.toString(),
                            element.company_name,
                            element.client_name,
                            element.contract_name,
                            con_type,
                            element.contract_start_date,
                            element.contract_end_date,
                            //element.client_email_address,
                            "<select id = 'type' onchange = 'status(this, " + element.contract_id + "," + element.contract_status + ")' >" + temp + "</select>",
                            "<a id ='gstn_preview' download='" + element.client_gstn_name + "' href='data:application/pdf;base64," + element.client_gstn + "' >" + element.client_gstn_name + "</a>",

                            "<a  class ='update' href='" + host_url + "admin/update.php?id=" + element.contract_id + "'><img src= '../images/udate-icon.png ' title='Update Contract'/></a><a  class = 'view' href = '" + host_url + "admin/read.php?id=" + element.contract_id + "'><img src= '../images/view.png' title='View Contract'/></a><a download='dd_c" + element.contract_id + ".pdf' class='download' href='" + host_url + "generated/contracts/dd_c" + element.contract_id + ".pdf'><img src= '../images/pdf-download.png' title='Download Contract'/></a><a class ='del' href ='#' onClick='recp(" + element.contract_id + ")'><img src = '../images/remove.png' title='Delete Contract'/></a>"
                        ]

                    );


                    // console.log(element.contract_status);
                });
                drawTable();
            }
        });

    }

function getUrlVars() {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    function loadTableSchema() {
        gridData = new google.visualization.DataTable();
        gridData.addColumn('string', 'S.No.');
        gridData.addColumn('string', 'Company Name');
        gridData.addColumn('string', 'Client Name');
        gridData.addColumn('string', 'Contract Name');
        gridData.addColumn('string', 'Contract Type');
        gridData.addColumn('string', 'Start Date');
        gridData.addColumn('string', 'End Date');
        //gridData.addColumn('string', 'Contact Email');
        gridData.addColumn('string', 'Contract Status');
        gridData.addColumn('string', 'Supported Documents');
        gridData.addColumn('string', 'Actions');

        startWork();

    }

    function drawTable() {
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(gridData, {width: '100%', height: '100%', allowHtml: true, cssClassNames: { headerRow: 'grid_headerRow', tableRow: 'grid_tableRow', headerCell: 'grid_headerCell', tableCell: 'grid_tableCell' } });
    }


});


function recp(id) {
    var res = window.confirm("Are you sure you want to delete!");
    //console.log(res);
    if (res) {
        $.ajax({
            url: delete_contract,
            type: "post",
            data: { id: id },
            success: function (data) {
                window.location.reload(true);
            }
        });
    }
}

function status(sel, id, status) {
    //var stat = sel.value;
    var obj = { key1: sel.value, key2: id, key3: status};
    //console.log(status);
    if(status == 3){
        if(obj.key1 != 4){
        var res = window.confirm("Contract cannot be changed into Lead,Proposal or Agreement.It can be closed only");
        window.location.reload(true);
        }
        else{
        var res = window.confirm("Are you sure you want to closed the contract");
        if (res) {  
        $.ajax({
            url: update_status,
            type: "post",
            data: obj,
            success: function (data) {
                window.location.reload(true);
            }
        });

        }
        window.location.reload(true);
        }

    }
    else {
        if(obj.key1 == 3){
        var res = window.confirm("Once the status changed to Contract cannot be converted back into Lead,proposal or agreement. Contract can be closed only. \n\n Are you sure you want to change status");

        if (res) {
        $.ajax({
            url: update_status,
            type: "post",
            data: obj,
            success: function (data) {
                window.location.reload(true);
            }
        });
    }
    window.location.reload(true);
    }
    else {
        var res = window.confirm("Are you sure you want to change status");
        if (res) {  
        $.ajax({
            url: update_status,
            type: "post",
            data: obj,
            success: function (data) {
                window.location.reload(true);
            }
        });

        }
        window.location.reload(true);
    }

    }
    /*else if(obj.key1 == 3){
        var res = window.confirm("Once the status changed to Contract cannot be converted back into proposal or agreement \n\n Are you sure you want to change status");

        if (res) {
        $.ajax({
            url: update_status,
            type: "post",
            data: obj,
            success: function (data) {
                window.location.reload(true);
            }
        });
    }
    window.location.reload(true);
}*/
/*else{
    var res = window.confirm("Are you sure you want to change status");
    if (res) {
        $.ajax({
            url: update_status,
            type: "post",
            data: obj,
            success: function (data) {
                //window.location.reload(true);
            }
        });

    }
    window.location.reload(true);
}*/



}
