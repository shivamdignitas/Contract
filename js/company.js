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

    function startWork(){
    	$.ajax({
            url: display_company,
            type: "get",
            data: {},
            success: function (data) {
                
                var parsed_data = JSON.parse(data);
                    parsed_data.forEach((element, i) => {
                        gridData.addRow(
                        [
                            (i+1).toString(),
                            element.company_name,
                            //element.file_name,
                            //element.upload_time,
                            "<a class = 'create' href='" + host_url + "admin/create.php?id=" + element.company_id + "'><img src= '../images/udate-icon.png ' title='Create Contract'/></a><a class = 'upload' href='" + host_url + "admin/upload.php?id=" + element.company_id + "'><img src= '../images/pdf-download.png' title='Upload Contract'/></a><a  class = 'view' href = '" + host_url + "admin/viewcompany.php?id=" + element.company_id + "'><img src= '../images/view.png' title='View Company'/></a><a class ='del' href ='#' onClick='recp(" + element.company_id + ")'><img src = '../images/remove.png' title='Delete Company'/></a>"
                        ]
                      )
                    });   
            drawTable();        
        }
    });

    }

function loadTableSchema(){
    gridData = new google.visualization.DataTable();
    gridData.addColumn('string', 'S.No.');
    gridData.addColumn('string', 'Company Name');
    //gridData.addColumn('string', 'Filename');
    //gridData.addColumn('string', 'Upload Time');
    gridData.addColumn('string', 'Action');

    startWork();
}

function drawTable() {
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(gridData, { width: '100%', height: '100%', allowHtml: true, cssClassNames: { headerRow: 'grid_headerRow', tableRow: 'grid_tableRow', headerCell: 'grid_headerCell', tableCell: 'grid_tableCell' } });
    }

    $(document).ready(function () {

    $("#addcompany").submit(function (event) {

        event.preventDefault();
        var dataFromForm = objectifyForm($("#addcompany").serializeArray());
        $.ajax({
            url: addcompany,
            type: "post",
            data: dataFromForm,
            success: function (data) {
                window.location.reload(true);
                //console.log(data);
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

});

function recp(id) {
    var res = window.confirm("Are you sure you want to delete!");
    //console.log(res);
    if (res) {
        $.ajax({
            url: delete_company,
            type: "post",
            data: { id: id },
            success: function (data) {
                window.location.reload(true);
            }
        });
    }
}

/*function display(data) {
     //var files = evt.target.files;
        var file = data;
        var fileName = file.name;

        if (files && file) {
            var reader = new FileReader();

            reader.onload = function (readerEvt) {
                var binaryString = readerEvt.target.result;
                var q = btoa(binaryString);
                //$('#upload_con').val(q);
                //$('#contract_preview').attr('href', 'data:application/pdf;base64,' + q);
                //$('#upload_name').val(fileName);
                $('#contract_preview').attr('href', 'data:application/pdf;base64,' + q);
                $('#contract_preview').attr('download', fileName);
                //$('#contract_preview').html(fileName);

            };

            reader.readAsBinaryString(file);
        }
}*/