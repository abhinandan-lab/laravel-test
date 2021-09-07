$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#signup").click(function (e) {

        document.getElementById('register-spinner').classList.remove('d-none');

        // e.preventDefault();

        // console.log('a');

        $.ajax({
            type: 'POST',
            url: "/register_process",
            data: $('#signupform').serialize(),
            success: function (response) {
            document.getElementById('register-spinner').classList.add('d-none');

                console.log(response);

                if(response=='Signup Success'){
                    window.location.replace('/');
                }
            }
        });
    });


    // login code
    $("#login").click(function (e) {

        document.getElementById('login-spinner').classList.remove('d-none');

        // e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "/login_process",
            data: $('#loginform').serialize(),
            success: function (response) {
            document.getElementById('login-spinner').classList.add('d-none');

                // console.log(response);

                if(response=='Invalid username'){
                    $('#email-error').html(response);
                }

                else if(response=='login failed, wrong password'){
                    $('#password-error').html(response);
                    $('#email-error').html('');

                }

                else if(response=='login success'){
                    window.location.replace('/home');
                }
            }
        });
    });


    // searching users
    $("#search-btn").click(function (e) {

        let email = $('#email_input').val();
        email = (email.length > 0) ? email: '0';
        let phone = $('#phone_input').val();
        phone = (phone.length > 0) ? phone:'0';
        let gender = $('#gender_select').val();
        // gender = (gender.length > 0) ? gender:'0';
        $.ajax({
            type: 'GET',
            url: `/searching/${email}/${phone}/${gender}`,
            // url: `/searching/0/0/0`,
            data: '',
            success: function (response) {
                $('#search-tbody').html('');

                // console.log(response);

                for (let i = 0; i < response.length; i++) {
                         $('#search-tbody').append(` <tr>
                        <th scope="row">${response[i].id}</th>
                        <td>${response[i].email}</td>
                        <td>${response[i].phone}</td>
                        <td class="text-capitalize">${response[i].gender}</td>
                        </tr>`);

                  }

            }
        });
    });



});




