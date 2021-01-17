
$(document).ready(function(){
    $("#btnLogout").click(function(e) {
        e.preventDefault();
        var response = window.confirm("Are you sure you want to log out?");
        if (response == true) {
            $("#formLogout").submit();
        }
    });
});