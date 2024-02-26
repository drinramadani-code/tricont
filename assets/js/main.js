(function($) {
    $('.signup-trigger').click(function() {
        $('.auth-container-login, .auth-container-signup').toggleClass('triggered');
    })

    // Log In
    $('.auth-container-login-form-btn').click(function() {
        let username = $('.auth-container-login-form-field-username > input').val();
        let password = $('.auth-container-login-form-field-password > input').val();
        
        $.ajax({
            url: `${permalink}user/pf_auth.php`,
            method: 'POST',
            data: {
                permalink: permalink,
                form: 'login',
                username: username,
                password: password
            },
            success: function(data) {
                location.reload();
            }
        })
    })
    $('.auth-container-signup-form-btn').click(function() {
        let username = $('.auth-container-signup-form-field-username > input').val();
        let password = $('.auth-container-signup-form-field-password > input').val();
        let email = $('.auth-container-signup-form-field-email > input').val();
        let full_name = $('.auth-container-signup-form-field-fullname > input').val();
        
        $.ajax({
            url: `${permalink}user/pf_auth.php`,
            method: 'POST',
            data: {
                permalink: permalink,
                form: 'signup',
                username: username,
                password: password,
                email: email,
                full_name: full_name
            },
            success: function(data) {
                location.reload();
            }
        })
    })
})(jQuery);