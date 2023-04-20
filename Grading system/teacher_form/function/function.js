$(document).ready(function(){
    $('.dashboard').hide()
    $('.dashboard').show(1000)
    $('.management').hide()
    $('#table_grading').DataTable();
    
})
function view_grades(id){
    var grading = "active"
    var user_id = id
    $.ajax({
    method:'POST',
    url:'../javascript/api/input_grades.php',
    data:{
        user_id:user_id,
        grading:grading,
    },
    success:function(response){
        if(response){
           
        document.getElementById('grades').innerHTML = response
            $('#view_setudent_grades').modal('show')
        }
    }
    })
}
function save_changes(){
var input_grades_now = "Active"
var user_id = $('#user_id').val();
var subject = $('#subject').val();
var term = $('#term').val();
var input_grades = $('#input_grades').val();
if(subject =="Select Subject"|| term=="Select Term"|| input_grades==""){
    swal({
        text:'Empty Fields',
        icon:'error'
    })
}else{
    $.ajax({
        method:'POST',
        url:'../javascript/api/input_grades.php',
        data:{
            input_grades_now:input_grades_now,
            user_id:user_id,
            subject:subject,
            term:term,
            input_grades:input_grades,
        },
        success:function(input_response){
            if(input_response){
             swal({
                text:'Inserted Successfully',
                icon:'success'
             })
             document.getElementById('table_body').innerHTML = input_response
             console.log(input_response)
            }
        }
    })
}
}
function management(){
    $('.management').show(1000)
    $('.dashboard').hide(500)
}
function term(term){

    var subject = $('#subject').val();
    var term = term.value;
    if(subject == "Select Subject"){
        swal({
            text:'Select Subject First',
            icon:'warning'
        })
    }else{
        if(term == "midterm"){
            var mid = "active"
            var id = $('#user_id').val();
            $.ajax({
                method:'POST',
                url:'../javascript/api/input_grades.php',
                data:{
                    mid:mid,
                    subject:subject,
                    id:id,
                    term:term
                },
                success:function(grade_response){
                    if(grade_response){
                      document.getElementById('input_grades').value = grade_response
                      console.log(grade_response)
                      $('#grades_style').show(800)
                    }
                }
            })
        }
        if(term == "pre-final"){
            var prefinal = "active"
            var id = $('#user_id').val();
            $.ajax({
                method:'POST',
                url:'../javascript/api/input_grades.php',
                data:{
                    prefinal:prefinal,
                    subject:subject,
                    id:id,
                    term:term
                },
                success:function(grade_response){
                    if(grade_response){
                      document.getElementById('input_grades').value = grade_response
                      console.log(grade_response)
                      $('#grades_style').show(800)
                    }
                }
            })
        }
        if(term =="final"){
            var final = "active"
            var id = $('#user_id').val();
            $.ajax({
                method:'POST',
                url:'../javascript/api/input_grades.php',
                data:{
                    final:final,
                    subject:subject,
                    id:id,
                    term:term
                },
                success:function(grade_response){
                    if(grade_response){
                      document.getElementById('input_grades').value = grade_response
                      console.log(grade_response)
                      $('#grades_style').show(800)
                    }
                }
            })
        }
    }
}
function subject(id){
    var test = id.value
    if(test !=''){
        $('#term').show(700)
        document.getElementById('term').disabled = false;
    }
}
function change_pass(){
    $('#change_pass').modal('show');
}
function close_now(){
    $('#change_pass').modal('hide')
}
function next_verify(){
 var current_password = $('#current_pass').val();
 var user_id = $('#user_id').val();
 var verify_current_pass = "Active"
 if(current_password==""){
swal({
    text:'Empty fields',
    icon:'error'
})
 }else{
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
           current_password:current_password,
           verify_current_pass:verify_current_pass,
           user_id:user_id,
        },
        success:function(verify_response){
            if(verify_response){
              if(verify_response =="success"){
                $('#new').show(800)
                $('.next_button').hide();
                $('.verify_now').show(800);
              }
              if(verify_response =="incorrect"){
                swal({
                    text:'Incorrect Current Password',
                    icon:'error'
                })
              }
            }
        }
     })
 }
}
function change_now(){
var new_pass = $('#new_pass').val();
var retype = $('#retype_pass').val();
var user_id = $('#user_id').val();
var change_now = 'Active'
if(new_pass != retype){
  swal({
    text:'Password not matched',
    icon:'error'
  })
}else{
    $.ajax({
        method:'POST',
        url:'../javascript/api/management.php',
        data:{
            new_pass:new_pass,
            retype:retype,
            change_now:change_now,
            user_id:user_id
            
        },
        success:function(change_response){
            if(change_response){
              swal({
                text:'Password Successfully Change',
                icon:'success'
              })
              $('#close_all').click();
            }
        }
     })
}
}