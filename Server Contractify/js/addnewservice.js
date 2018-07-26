$(document).ready(function() {
    var max_fields = 10; 
    var wrapper = $(".subservice_field"); 
    var add_subsubservice = $(".add_subsubservice"); 
    
    var x = 0;
    
    $(add_subsubservice).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div><input type="text" id="subservice_'+ x +'" name="subsubservice[]" placeholder="Enter Sub-Sub Service"/><a href="#" class="remove_field" style="color: red;">Remove</a>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});