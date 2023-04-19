$(document).ready(function () {
    $('#card-login').hide(10);
    $('#card-login').show(1000);
    $('#card-register').hide();
    $('.alert').hide();
    $('.loading_screen').hide();
    $('#card-verification').hide();
    document.getElementById('btn1').disabled = true;
    $('#btn1').disabled = true;
})
function login_now() {
    var email = $('#email').val();
    var pass = $('#pass').val();
    var login_key = 'Active';
    if (email == '' || pass == '') {
        swal({
            title: 'Empty Form',
            icon: 'warning'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/login_form_api.php',
            data: {
                email: email,
                pass: pass,
                login_key: login_key,
            },
            success: function (res) {
                if (res) {
                    if (res == 'Registrar') {
                        swal({
                            title: 'Login Successfully',
                            icon: 'success'
                        }).then(login => {
                            if (login) {
                                window.location.href = "../registrar_form/index.php";
                            }
                        })

                    }
                    if (res == 'invalid') {
                        $('.alert').show(200)
                    }
                    if (res == "Pending") {
                        swal({
                            text: 'We are reviewing your information right now, we will email you after this verification',
                            icon: 'error'
                        })
                        console.log(res)
                    }
                    if(res == "Teacher"){
                        swal({
                            title: 'Login Successfully',
                            icon: 'success'
                        }).then(login => {
                            if (login) {
                                window.location.href = "../teacher_form/index.php";
                            }
                        })
                    }
                    if (res == "blank") {
                        swal({
                            title: 'Your Account Need to verify by your provided gmail account',
                            icon: 'warning',
                            buttons: {
                                No: 'No',
                                Verify: 'Verify'
                            }
                        }).then(check => {
                            switch (check) {
                                case 'Verify':
                                    $('#card-verification').show(1000);
                                    $('#card-login').hide(1000);
                                    break;
                                case 'No':
                                    console.log('test')
                            }
                        })
                    }
                    if(res == "Student"){
                        console.log(res)
                        swal({
                            text:'Login Successful',
                            icon:'success'
                        }).then(login_student=>{
                            if(login_student){
                                window.location.href="../user_login/index.php";
                            }
                        })
                    }
                }

            }
        })
    }
}
function check() {

    var checkbox = document.getElementById('checkbox');
    if (checkbox.checked == true) {
        document.getElementById('btn1').disabled = false;
    } else {
        document.getElementById('btn1').disabled = true;
    }

}
function register() {
    $('#card-login').hide(1000);
    $('#card-register').show(1000);
    document.getElementById('card').style.marginTop = "80px";
    document.getElementById('card').style.width = "900px";
    document.getElementById('card').style.marginLeft = "-100px";
}
function register_now() {
    var btn = $('#btn1');
    var email = $('#Email').val();
    var loading_screen = $('.loading_screen');
    var lrn = $('#lrn').val();
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();
    var lastname = $('#lastname').val();
    var suffix = $('#suffix').val();
    var contact = $('#contact').val();
    var address = $('#address').val();
    var birthdate = $('#birthdate').val();
    var course = $('#course').val();
    var year_level = $('#year_level').val();
    var place_of_birth = $('#place_of_birth').val();
    var nationality = $('#nationality').val();
    var religion = $('#religion').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var retype_password = $('#retype-password').val();
    btn.hide();
    console.log(email)
    loading_screen.show(1000);
    if (document.getElementById('male').checked == true) {
        var gender = $('#male').val();
    }
    if (document.getElementById('female').checked == true) {
        var gender = $('#female').val();
    }
    if (password != retype_password) {
        swal({
            title: 'Password not matched',
            icon: 'error'
        })
    }
    if (firstname == "" || email == "" || lastname == "" || contact == "" || address == "" || birthdate == "" || course == "" || year_level == "" || place_of_birth == "" || nationality == "" || religion == "" || username == "" || password == "") {
        swal({
            title: 'Empty Forms',
            icon: 'error'
        })
        btn.show(1000);
        loading_screen.hide();
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/register.php',
            data: {
                email: email,
                lrn: lrn,
                firstname: firstname,
                middlename: middlename,
                lastname: lastname,
                suffix: suffix,
                contact: contact,
                address: address,
                birthdate: birthdate,
                course: course,
                year_level: year_level,
                place_of_birth: place_of_birth,
                nationality: nationality,
                religion: religion,
                username: username,
                password: password,
                gender: gender,
            },
            success: function (response) {
                if (response) {
                    if (response == 'success') {
                        $('#card-register').hide(500);
                        $('.login').hide();
                        $('#card-verification').show(1000);
                        console.log('success')
                    }
                    if (response == "Failed") {
                        loading_screen.hide(100);
                        btn.show(1000);
                        console.log('failed')
                    }
                    if (response == "exist") {
                        swal({
                            title: 'Email is Already Exist',
                            icon: 'error'
                        })
                        loading_screen.hide(100);
                        btn.show(1000);

                        console.log('Email is already exist')
                    }
                    console.log(response)
                }
            }
        })
    }
}
function Male() {
    document.getElementById('female').checked = false;
}
function Female() {
    document.getElementById('male').checked = false;
}
function verify_now() {
    var email = $('#user_id').val();
    var code = $('#code').val();
    $.ajax({
        method: 'POST',
        url: '../javascript/api/verification.php',
        data: {
            email: email,
            code: code,
        },
        success: function (verify) {
            if (verify) {
                if (verify == "success") {
                    swal({
                        text: 'We are reviewing your information right now, we will email you after this verification',
                        icon: 'success'
                    }).then(finalize => {
                        if (finalize) {
                            window.location.href = "../login_form/index.php";
                        }
                    })

                }
            }
        }
    })
}