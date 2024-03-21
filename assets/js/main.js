(function($) {

    $('.cek-header-tcLink').click(function() {
        // alert();
        let url = window.location.href;
        let t = url.split("?t=")[1];
        let new_url = url.split("?t=")[0] + "?j="+t;
        navigator.clipboard.writeText(new_url)
        .then(() => {
            alert('copied');
        })
        .catch(err => {
            console.error('Error copying text to clipboard:', err);
        });
    })

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
                // console.log(data);
                location.reload();
            }
        })
    })
    let for_who = [];
    $('input[name="p"]').change(function() {
        console.log($(this).prop('checked'));
        if ($(this).prop('checked')) {
            for_who.push($(this).val())
        } else {
            var index = for_who.indexOf($(this).val());
            if (index !== -1) {
                for_who.splice(index, 1);
            }
        }
        $('input[name="for_who"]').val(for_who);
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