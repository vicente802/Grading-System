$(document).ready(function(){
    $('.dashboard').hide()
    $('.dashboard').show(1000)
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
                console.log(input_response)
            }
        }
    })
}
}