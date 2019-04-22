$(document).ready(() => {

    $('#medications').click(e => {
        $('#email_password').removeClass('active');
        $('#medications').addClass('active');
        $("#empass").hide();
        $("#medications").hide();
        $("#meds").show();
        $("#email_password").show();
    });

    $('#email_password').click(e => {
        $('#medications').removeClass('active');
        $('#email_password').addClass('active');
        $("#meds").hide();
        $("#email_password").hide();
        $("#empass").show();
        $("#medications").show();
    });

    $('#submit_email').click(() => {
        if(changeEmail()){
            $.ajax({
                type: 'post',
                url: 'php/logout.php',
                success: () => {
                    // Goes to login screen
                    console.log('Logged out');
                    window.location = 'login.html';
                }
            });
        }
    });
    $('#submit_password').click(() => {
        if(changePassword()){
            $.ajax({
                type: 'post',
                url: 'php/logout.php',
                success: () => {
                    // Goes to login screen
                    console.log('Logged out');
                    window.location = 'login.html';
                }
            });
        }
    });

    function changeEmail() {

        const email = $('#email').val();
        const newEmail = $('#newEmail').val();

        $.ajax({
            type: 'post',
            url: 'php/changeEmail.php',
            data: {
                email: email,
                newEmail: newEmail
            },
            success: () => {
                // Clear all fields
                $('#email').val("");
                $('#newEmail').val("");
                console.log('Success');
                //close session and force re-login
                logout();
            },
            statusCode: {
                // Wrong email
                401: () => {
                    // Take this log out when done
                    console.log('Wrong email');
                }
            }
        });
    }

    function changePassword() {

        const password = $('#password').val();
        const newPassword = $('#newPassword').val();

        $.ajax({
            type: 'post',
            url: 'php/changePassword.php',
            data: {
                password: password,
                newPassword: newPassword
            },
            success: () => {
                // Clear all fields
                $('#password').val("");
                $('#newPassword').val("");
                console.log('Success');
                //close session and force re-login
                logout();
            },
            statusCode: {
                // Wrong password
                401: () => {
                    // Take this log out when done
                    console.log('Wrong password');
                }
            }
        });
    }

    function logout(){
        $.ajax({
            type: 'post',
            url: 'php/logout.php',
            success: () => {
                // Goes to login screen
                console.log('Logged out');
                window.location = 'login.html';
            }
        });
    }


});
