$(document).ready(function() {
    username.focus()

    $('#loginForm').on('submit', function(e) {
        
        $('#textErrorUsername').hide();
        $('#username').removeClass('border-red');
        $('#textErrorPassword').hide();
        $('#password').removeClass('border-red');

        if ($('#username').val() === "" ) {
            $('#textErrorUsername').show();
            $('#username').addClass('border-red');
            e.preventDefault(); // prevenir el envío del formulario
        }

        if ($('#password').val() === "" ) {
            $('#textErrorPassword').show();
            $('#password').addClass('border-red');
            e.preventDefault(); 
        }    
    });
});
