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
            url: display_contract,
            type: "get",
            data: {},
            success: function (data) {
                
                var parsed_data = JSON.parse(data);
                    parsed_data.forEach((element, i) => {
                        gridData.addRow(
                        [
                            (i+1).toString(),
                            element.client_name,
                            element.file_name,
                            element.upload_time,
                            "<a download='"+element.file_name+"' class ='download' href ='data:application/preventDefault;base64,"+element.contract+"'><img src= '../images/pdf-download.png' title='Download Contract'/></a><a class ='del' href ='#' onClick='recp(" + element.id + ")'><img src = '../images/remove.png' title='Delete Contract'/></a>"
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
    gridData.addColumn('string', 'Client Name');
    gridData.addColumn('string', 'Filename');
    gridData.addColumn('string', 'Upload Time');
    gridData.addColumn('string', 'Action');

    startWork();
}

function drawTable() {
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(gridData, { width: '100%', height: '100%', allowHtml: true, cssClassNames: { headerRow: 'grid_headerRow', tableRow: 'grid_tableRow', headerCell: 'grid_headerCell', tableCell: 'grid_tableCell' } });
    }

});

function recp(id) {
    var res = window.confirm("Are you sure you want to delete!");
    //console.log(res);
    if (res) {
        $.ajax({
            url: delete_uploaded_contract,
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