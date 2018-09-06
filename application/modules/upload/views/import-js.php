<script>
	var goImport = function (){
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
</script>