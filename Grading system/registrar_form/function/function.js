$(document).ready(function () {
    
    $('#pending_accounts').hide();
    $('#manage_data').hide();
    $('#example').DataTable();
    $('#dashboard').hide(100);
    $('#dashboard').show(1000);
    $('#table_pending').DataTable();
   
    $('#loading_decline'+id).hide()
    console.log(id)

});
function View(ID) {
    var view_pending = "Active"
    $.ajax({
        method: 'POST',
        url: '../javascript/api/admin_pending_account.php',
        data: {
            id: ID,
            view_pending: view_pending,
        },
        success: function (pending_account) {
            if (pending_account) {
                document.getElementById('form').innerHTML = pending_account
                console.log(pending_account)
            }
        }
    })
}
function submit_student() {
    var submit_student_now = "Active"
    var pending_input_section = $('#input_section').val();
    var id = $('#user_id').val();

    if (pending_input_section == "Select Section") {
        swal({
            text: 'Select Section before clicking approved button',
            icon: 'error'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/admin_pending_account.php',
            data: {
                submit_student_now: submit_student_now,
                id: id,
                pending_input_section: pending_input_section,
            },
            success: function (approved_account) {
                if (approved_account) {
                  
                    console.log(approved_account)
                    swal({
                        text: 'Approved Sucessfully',
                        icon: 'success'
                    }).then(success => {
                        if(success){
                            $('.btn-close').click()
                            document.getElementById('account_pending_list').innerHTML = approved_account
                        }
                    })

                }
            }
        })
    }


}
function show_pending() {
    $('#dashboard').hide(500);
    $('#pending_accounts').show(1000);
    $('#manage_data').hide();
}
function home() {
    $('#pending_accounts').hide(500);
    $('#dashboard').show(1000);
    $('#manage_data').hide();
}
function management() {
    $('#pending_accounts').hide();
    $('#dashboard').hide();
    $('#manage_data').show(1000);
}
function view_course() {
    var course = "Course";
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            course: course
        },
        success: function (course) {
            if (course) {
                document.getElementById('manage_list').innerHTML = course
            }
        }
    })
}
function submit_course() {
    var add_course = "active";
    var input_course = $('#input_course').val();
    if (input_course == "") {
        swal({
            text: 'Empty Course',
            icon: 'error'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/management.php',
            data: {
                add_course: add_course,
                input_course: input_course
            },
            success: function (add_course_now) {
                if (add_course_now) {
                    if (add_course_now == "exist") {
                        swal({
                            text: input_course + ' is already exist',
                            icon: 'error'
                        })
                    } else {
                        swal({
                            text: input_course + ' Added Successfully',
                            icon: 'success'
                        })
                        document.getElementById('manage_list').innerHTML = add_course_now
                    }

                    console.log(add_course_now)
                }
            }
        })
    }

}
function drop_course(id) {
    var drop_course = "Active"
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            drop_course: drop_course,
            id: id
        },
        success: function (drop_now) {
            if (drop_now) {
                swal({
                    text: 'Deleted Successfully',
                    icon: 'success'
                })
                document.getElementById('manage_list').innerHTML = drop_now
            }
        }
    })
}
function view_section() {
    var section = "Active"
    console.log('test')
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            section: section
        },
        success: function (section_response) {
            if (section_response) {
                document.getElementById('manage_list').innerHTML = section_response
            }
        }
    })
}
function submit_section() {
    var submit_section_now = 'Active'
    var input_section = $('#input_section').val();
    var input_course = $('#input_course').val();
    if (input_course == "Select Course" || input_section == "") {
        swal({
            text: 'Please Specify Section or Course',
            icon: 'error'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/management.php',
            data: {
                submit_section: submit_section_now,
                input_course: input_course,
                input_section: input_section
            },
            success: function (section_response) {
                if (section_response) {
                    if (section_response == "exist") {
                        swal({
                            text: input_section + ' Is Alaready Exist',
                            icon: 'error'
                        })
                    } else {
                        document.getElementById('manage_list').innerHTML = section_response
                        console.log(section_response)
                    }
                }
            }
        })
    }

}
function drop_section(id) {
    var drop_section = "Active"
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            drop_section: drop_section,
            id: id
        },
        success: function (drop_section_response) {
            if (drop_section_response) {
                document.getElementById('manage_list').innerHTML = drop_section_response
            }
        }
    })
}
function decline(id) {
    $('#loading_decline').show()
    var decline_account = "Active"

    $.ajax({
        method: 'POST',
        url: '../javascript/api/admin_pending_account.php',
        data: {
            decline_account: decline_account,
            id: id
        },
        success: function (drop_pending_response) {
            if (drop_pending_response) {
                $('#loading_decline').hide()
                document.getElementById('account_pending_list').innerHTML = drop_pending_response
            }
            $('#loading_decline').hide()
            console.log(drop_pending_response)
        }

    })
}


function add_account() {
    var add_account = "active"
    var lrn = $('#lrn').val();
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();
    var lastname = $('#lastname').val();
    var birthdate = $('#birthdate').val();
    var enc_password = $('#enc_password').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var suffix = $('#suffix').val();
    var course = $('#course').val();
    var contact = $('#contact').val();
    var year = $('#year').val();
    var section = $('#section').val();
    var role = $('#role').val();
    var status = $('#status').val();
    if (firstname == "" || lastname == "" || birthdate == "" || enc_password == ""|| username =="" || email == "" ||
      role == "Select Role" || status == "Select Status") {
        swal({
            text: 'Empty Forms',
            icon: 'error'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/admin_pending_account.php',
            data: {
                contact:contact,
                username:username,
                add_account: add_account,
                email: email,
                lrn:lrn,
                firstname:firstname,
                middlename:middlename,
                lastname:lastname,
                birthdate:birthdate,
                enc_password:enc_password,
                suffix:suffix,
                course:course,
                year:year,
                section:section,
                role:role,
                status:status,
            },
            success: function (add_account_sucess) {
                if (add_account_sucess) {
                    if (add_account_sucess == "exist") {
                        console.log(add_account_sucess);
                        swal({
                            text: 'Email Already exist',
                            icon: 'warning'
                        })
                    } else {
                        swal({
                            text:'Account Successfully created',
                            icon:'success'
                        })
                        document.getElementById('firstname').value = "";
                        document.getElementById('suffix').value = "Select Suffix";
                        document.getElementById('middlename').value = "";
                        document.getElementById('lastname').value = "";
                        document.getElementById('birthdate').value = "";
                        document.getElementById('email').value = "";
                        document.getElementById('course').value = "Select Course";
                        document.getElementById('contact').value = "";
                        document.getElementById('year').value = "Select Year";
                        document.getElementById('section').value = "Select Section";
                        document.getElementById('role').value = "";
                        document.getElementById('status').value = "";
                        document.getElementById('enc_password').value = Math.ceil(Math.random() * 10000000000);
                    }
                   

                }
            }
        })

    }

}
function view_subject() {
    var subject = "Subject";
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            subject: subject
        },
        success: function (subject_response) {
            if (subject_response) {
                document.getElementById('manage_list').innerHTML = subject_response
            }
        }
    })
}
function submit_subject() {
    var submit_subject_now = "active"
    var input_subject = $('#input_subject').val();
    var input_section1 = $('#input_section1').val();
    if (input_subject == "" || section == "Selection Section") {
        swal({
            text: 'Empty Subject Or Section',
            icon: 'error'
        })
    } else {
        $.ajax({
            method: 'POST',
            url: '../javascript/api/management.php',
            data: {
                submit_subject_now: submit_subject_now,
                input_subject: input_subject,
                input_section1: input_section1,
            },
            success: function (subject_add) {
                if (subject_add) {
                    if (subject_add == "exist") {
                        swal({
                            text: 'Subject Already Exist',
                            icon: 'error',
                        })
                    } else {
                        document.getElementById('manage_list').innerHTML = subject_add
                        console.log(subject_add)
                        console.log(input_subject)
                        console.log(input_section1)
                    }

                }
            }
        })
    }
}
function drop_subject(id) {
    var drop_subject = "Active"
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            drop_subject: drop_subject,
            id: id
        },
        success: function (drop_subject) {
            if (drop_subject) {
                document.getElementById('manage_list').innerHTML = drop_subject
            }

        }
    })
}
function view_student_list(id){
    var user_id = id;
    var view_student = "active"
    $.ajax({
        method: 'POST',
        url: '../javascript/api/management.php',
        data: {
            view_student: view_student,
            id: user_id
        },
        success:function(response_student_view){
            if(response_student_view){
                console.log(response_student_view)
                $('#view_student_list').modal('show')
                document.getElementById('test').innerHTML = response_student_view;
            }
        }
    })
}

