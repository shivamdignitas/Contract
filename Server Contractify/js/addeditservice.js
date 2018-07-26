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
    var gridData = null;
    google.charts.setOnLoadCallback(loadTableSchema);

    function startWork() {

        $.ajax({
            url: get_all_services,
            type: "get",
            data: {},
            success: function (data) {
                
                var parsed_data = JSON.parse(data);
                    parsed_data.forEach(element => {
                        gridData.addRow(
                        [
                            element.MasterService,
                            element.SubService,
                            element.SubSubService,
                            element.ServicePrice,
                            "<a  class ='update' href='" + host_url + "admin/updateservice.php?id=" + element.id + "&subid=" + element.subid + "&subsubid=" + element.subsubid + "'><img src= '../images/udate-icon.png ' title='Update Service'/></a><a class ='del' href='" + host_url + "admin/deleteservice.php?id=" + element.id + "&subid=" + element.subid + "&subsubid=" + element.subsubid + "'><img src = '../images/remove.png' title='Delete Service'/></a>"
                        ]
                      )
                    });   
            drawTable();        
        }
    });
        
}

function loadTableSchema(){
    gridData = new google.visualization.DataTable();
    gridData.addColumn('string', 'Master Service');
    gridData.addColumn('string', 'Sub Service');
    gridData.addColumn('string', 'Sub-Sub Service');
    gridData.addColumn('string', 'Service Price');
    gridData.addColumn('string', 'Action');

    startWork();
}

function drawTable() {
    var table = new google.visualization.Table(document.getElementById('table_div_service'));
    table.draw(gridData, { width: '100%', height: '100%', allowHtml: true, cssClassNames: { headerRow: 'grid_headerRow', tableRow: 'grid_tableRow', headerCell: 'grid_headerCell', tableCell: 'grid_tableCell' } });
}

});
