    $(document).ready(function(){

    // var text1 = "";
    // var text2 = "";
    // var text3 = "";

    function getURLparam(){
        var qsparam = new Array(3);
        var query = window.location.search.substring(1);
        var parms = query.split('&');
        for (var i = 0; i < parms.length; i++) {
            var pos = parms[i].indexOf('=');
            if (pos > 0)
            {
                var key = parms[i].substring(0, pos);
                var val = parms[i].substring(pos + 1);
                qsparam[i] = val;    
            }                          
        }
       // 
       return qsparam;
    }

    var urlids = new Array();
    urlids = getURLparam();
    console.table(urlids);
    // console.log(urlids[0]);
    // console.log(urlids[1]);
    // console.log(urlids[2]);
    function populate(urlids){

            var obj = {id: urlids[0], subid: urlids[1], subsubid: urlids[2]}

            // console.log(urlids); 
            $.ajax({
                url: select_service,
                type: "get", 
                data: obj,
                success: function (data) {
                   
                }
            });
    }

    $(document).ready(function(){
        $.ajax({
            url: select_service,
            type: "get",
            dataType: "json", 
            data: {id: urlids[0], subid: urlids[1], subsubid: urlids[2]},
            success: function (data) {
            //console.log(urlids);    
                $("#master_service").val(data[0].masterservice);
                $("#sub_service").val(data[1].subservice);
                $("#sub_service_price").val(data[2].subserviceprice);
                $("#sub_sub_service").val(data[3].subsubservice);
               console.table(data);
               console.log(data[0].masterservice);
               console.log(data[1].subservice);
               console.log(data[2].subserviceprice);
               console.log(data[3].subsubservice);
            }
        });
    });

    $("#updatemservice").click(function(){

        var master_service = $('#master_service').val();

        $.ajax({
            url: update_service,
            type: "post",
            data: {id: urlids[0], master_service: master_service},
            success: function(data) {
                alert("Updated Master Service");
            }
        });
    });

    $("#updatesservice").click(function(){

        var sub_service = $('#sub_service').val();
        var sub_service_price = $('#sub_service_price').val();

        $.ajax({
            url: update_service,
            type: "post",
            data: {subid: urlids[1], sub_service: sub_service, sub_service_price: sub_service_price},
            success: function(data) {
                alert("Updated Sub Service");
            }
        });
    });

    $("#updatespservice").click(function(){

        var sub_service = $('#sub_service').val();
        var sub_service_price = $('#sub_service_price').val();
        
        $.ajax({
            url: update_service,
            type: "post",
            data: {subid: urlids[1], sub_service: sub_service, sub_service_price: sub_service_price},
            success: function(data) {
                alert("Updated Sub Service Price");
            }
        });
    });

    $("#updatessservice").click(function(){

        var sub_sub_service = $('#sub_sub_service').val();
        var sub_service_price = $('#sub_service_price').val();

        $.ajax({
            url: update_service,
            type: "post",
            data: {subsubid: urlids[2], sub_sub_service: sub_sub_service, sub_service_price: sub_service_price},
            success: function(data) {
                alert("Updated Sub Sub Service");
            }
        });
    });


});