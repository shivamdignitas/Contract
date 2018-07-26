$(document).ready(function() {
    var max_fields      = 10; 
    var wrapper         = $(".subservice_field"); 
    var add_subservice      = $(".add_subservice"); 
    
    var x = 0; 
    var y = 0;
    var subService = [];
    var serviceArray = [];
    
    $(add_subservice).click(function(e){ 
        e.preventDefault();
        y=0;
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div class="subbox"><input type="text" id="subservice_'+ x +'" name="subservice[]" placeholder="Enter Sub Service"/><input type="text" id="subserviceprice_'+ x +'" name="newsubserviceprice[]" placeholder="Enter Sub Service Price"/><a href="#" class="remove_field">Remove</a><div><button type="button" class="add_subsubservice">Add More Sub-Sub Service</button></div>'); //add input box

            $(".add_subsubservice").click(function(e){
                e.preventDefault();
                if(y < max_fields){
                    y++; 
                    $(wrapper).append('<div class="subsubbox"><input type="text" id="subsubservice_'+ x +''+ y +'" name="subsubservice[]" placeholder="Enter Sub-Sub Service"/><a href="#" class="remove_field_ss">Remove</a></div>'); //add input box
                }
                serviceArray.push($("#subsubservice"+ x +""+ y +"").val());
                console.log("sub sub "+y); 
            });

            $(wrapper).on("click",".remove_field_ss", function(e){ 
                e.preventDefault(); $(this).parent('div').remove(); y--;
            })
        }
        serviceArray.push($("#subservice"+ x +"").val());
        console.log("sub "+x);
    });

    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    $("#done").click(function(){
        console.table(serviceArray);
    });
});