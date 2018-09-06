var goImport = function (){
    //init validate form org
    var create_form = "#form";
    var create_rules = {
        file: {
            required: true,
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {

    goImport();
    
});