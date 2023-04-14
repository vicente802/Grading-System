$(document).ready(function () {
    $('#pending_accounts').hide();
    $('#manage_data').hide();
    $('#example').DataTable();
    $('#dashboard').hide(100);
    $('#dashboard').show(1000);
    $('#table_pending').DataTable();
  
    
});
function View(ID){
    var view_pending = "Active"
    $.ajax({
        method:'POST',
        url:'../javascript/api/admin_pending_account.php',
        data:{
            id:ID,
            view_pending:view_pending,
        },
        success:function(pending_account){
            if(pending_account){
             document.getElementById('form').innerHTML = pending_account
              console.log(pending_account)
            }
        }
    })
}
function submit_student(){
    var id = $('#user_id').val();
    console.log(id)
    $('.btn-close').click()
}
function show_pending(){
    $('#dashboard').hide(500);
    $('#pending_accounts').show(1000);
    $('#manage_data').hide();
}
function home(){
    $('#pending_accounts').hide(500);
    $('#dashboard').show(1000);
    $('#manage_data').hide();
}
function management(){
    $('#pending_accounts').hide();
    $('#dashboard').hide();
    $('#manage_data').show(1000);
}
function view_course(){
   var course = "Course";
   $.ajax({
    method:'POST',
    url:'../javascript/api/management.php',
    data:{
        course:course
    },
    success:function(course){
        if(course){
          document.getElementById('manage_list').innerHTML = course
        }
    }
   })
}
function submit_course(){
    var add_course = "active";
    var input_course = $('#input_course').val();
    if(input_course == ""){
        swal({
            text:'Empty Course',
            icon:'error'
        })
    }else{
        $.ajax({
            method:'POST',
            url:'../javascript/api/management.php',
            data:{
                add_course:add_course,
                input_course:input_course
            },
            success:function(add_course_now){
                if(add_course_now){
                    if(add_course_now =="exist"){
                        swal({
                            text: input_course +' is already exist',
                            icon:'error'
                        })
                    }else{
                        swal({
                            text: input_course + ' Added Successfully',
                            icon:'success'
                        })
                        document.getElementById('manage_list').innerHTML = add_course_now
                    }
                  
                    console.log(add_course_now)
                }
            }
        })
    }
   
}
function drop_course(id){
    var drop_course = "Active"
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
            drop_course:drop_course,
            id:id
        },
        success:function(drop_now){
            if(drop_now){
                swal({
                    text:'Deleted Successfully',
                    icon:'success'
                })
                document.getElementById('manage_list').innerHTML = drop_now
            }
        }
    })
}
function view_section(){
    var section = "Active"
    console.log('test')
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
            section:section
        },
        success:function(section_response){
            if(section_response){
                document.getElementById('manage_list').innerHTML = section_response
            }
        }
    })
}
function submit_section(){
    var submit_section_now = 'Active'
    var input_section = $('#input_section').val();
   var input_course = $('#input_course').val();
   if(input_course =="Select Course" || input_section ==""){
    swal({
        text:'Please Specify Section or Course',
        icon:'error'
    })
   }else{
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
            submit_section:submit_section_now,
            input_course:input_course,
            input_section:input_section
        },
        success:function(section_response){
            if(section_response){
                if(section_response == "exist"){
                    swal({
                        text: input_section + ' Is Alaready Exist',
                        icon:'error'
                    })
                }else{
                document.getElementById('manage_list').innerHTML = section_response
                }
            }
        }
    })
   }
  
}
function drop_section(id){
    var drop_section = "Active"
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
           drop_section:drop_section,
           id:id
        },
        success:function(drop_section_response){
            if(drop_section_response){
                document.getElementById('manage_list').innerHTML = drop_section_response
                }
            }
})
}
function decline(id){
    var decline_account ="Active"
    $.ajax({
        method:'POST',
        url:'../javascript/api/admin_pending_account.php',
        data:{
            decline_account:decline_account,
           id:id
        },
        success:function(drop_pending_response){
            if(drop_pending_response){
                document.getElementById('account_pending_list').innerHTML = drop_pending_response
                }
            }
})
}
function add_account(){
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();
    var lastname = $('#lastname').val();
    var birthdate = $('#birthdate').val();
    var enc_password = $('#enc_password').val();
    var email = $('#email').val();
    var course = $('#course').val();
    var year = $('#year').val();
    var section = $('#section').val();
    var role = $('#role').val();
    var status = $('#status').val();
    if(firstname==""||middlename==""||lastname==""|| birthdate==""|| enc_password==""|| email==""||
    course=="Select Course"||year=="Select Year"|| section=="Select Section"||role=="Select Role"||status=="Select Status" ){

    }else{
        document.getElementById('firstname').value="";
        document.getElementById('middlename').value="";
        document.getElementById('lastname').value="";
        document.getElementById('birthdate').value="";
        document.getElementById('email').value="";
        document.getElementById('course').value="";
        document.getElementById('year').value="";
        document.getElementById('section').value="";
        document.getElementById('role').value="";
        document.getElementById('status').value="";
        document.getElementById('enc_password').value= Math.ceil(Math.random() * 10000000000);
    }
    
}
