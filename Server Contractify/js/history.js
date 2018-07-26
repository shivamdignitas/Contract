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

    function startWork() {

        $.ajax({
            url: get_history,
            type: "get",
            data: {},
            success: function (data) {
                var parsed_data = JSON.parse(data);
                parsed_data.forEach(element => {
                    var d = new Date(0);
                    d.setUTCSeconds(element.history);
                    gridData.addRow(

                        [
                            element.contract_id,
                            element.contract_name,
                            "<a id = 'downlaod' download='"+element.name+"' class='download' href='" + host_url + "generated/logs/"+element.name+"'>"+element.name+"</a>",
                            ""+d
                        ]

                    );


                    // console.log(element.contract_status);
                });
                drawTable();
            }
        });

    }



    function loadTableSchema() {
        gridData = new google.visualization.DataTable();
        gridData.addColumn('string', 'S.No.');
        gridData.addColumn('string', 'Contract Name');
        gridData.addColumn('string', 'Contract Pdf');
        gridData.addColumn('string', 'Update Time');

        

        startWork();

    }

    function drawTable() {
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(gridData, { width: '100%', height: '100%', allowHtml: true, cssClassNames: { headerRow: 'grid_headerRow', tableRow: 'grid_tableRow', headerCell: 'grid_headerCell', tableCell: 'grid_tableCell' } });
    }


});


 // function down(id) {
//     //var stat = sel.value;
//     var obj = { key1: sel.name };


//     //console.log(obj);

//     var res = window.confirm("View this contract");

//     if (res) {
//        $("#update_name").attr("href", host_url + "generated/logs/" + obj);
//     }



// }
