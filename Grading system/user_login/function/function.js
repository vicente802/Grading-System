$(document).ready(function() {
    $('#dashboard').hide()
    $('#dashboard').show(800)
    $('#management').hide(); 
    $('.verification-code').hide()
    $('.comfirm_and_change').hide()
});
function management(){
    $('#dashboard').hide(); 
    $('#management').show(1000); 
}
function open_pass(){
    $('#changepass').modal('show')
}
function verify(){
    var change_pass = "active"
    var id = $('#user_id').val();
    var current = $('#current').val();
    var new_pass = $('#new').val();
    var retype_pass = $('#retype').val();
    if(current ==""|| new_pass==""|| retype_pass==""){
swal({
    text:'Empty Fields',
    icon:'error'
})
    }else{
        if(new_pass != retype_pass){
            swal({
                text:'Password not matched',
                icon:'error'
            })
        }else{
            $.ajax({
                method:'POST',
                url:'../javascript/api/changepass.php',
                data:{
                    change_pass:change_pass,
                    id:id,
                    current:current,
                    new_pass:new_pass,
                },
                success:function(res){
                if(res){
                    if(res=="error"){
                        swal({
                            text:'Incorrect Current Password',
                            icon:'error'
                        })
                    }
                    if(res=="success"){
                        var verifying_via_email = "active"
                        $.ajax({
                            method:'POST',
                            url:'../javascript/api/changepass.php',
                            data:{
                                verify:verifying_via_email,
                                id:id,
                            },
                            success:function(sending_code){
                                if(sending_code){
                                    if(sending_code =="success sending Code"){
                                        $('.change-form').hide();
                                        $('.verify_button').hide();
                                        $('.verification-code').show(800)
                                        $('.comfirm_and_change').show(800)
                                    }
                                    console.log(sending_code)
                                }
                            }
                        })
                    }
                }
                console.log(res)
                }
            })
        }
      
    }
}
function verify_now(){
    var verification_code = $('#verify').val();
    var change_pass_now = "active";
    if(verification_code ==""){
        swal({
            text:'Empty Fields',
            icon:'error'
        })
    }else{
        $.ajax({
            method:'POST',
            url:'../javascript/api/changepass.php',
            data:{    
                change_pass_now:change_pass_now,
                verification_code:verification_code,
        },
        success:function(response){
            if(response){
                if(response == "success"){
                    swal({
                        text:'Password Successfully Change',
                        icon:'success'
                    })
                    $('#close').click()
                }
                if(response =="failed"){
                    swal({
                        text:'Incorrect Code',
                        icon:'error'
                    })
                }
                console.log(response)
            }
        }
           })  
    }
  
}
function home(){
    $('#dashboard').hide()
    $('#dashboard').show(800)
    $('#management').hide(); 
    $('.verification-code').hide()
    $('.comfirm_and_change').hide()
}
function save_all(){
   var id = $('#user_id').val();
   var lrn = $('#LRN').val();
   var firstname = $('#firstname').val();
   var middlename = $('#middlename').val();
   var lastname = $('#lastname').val();
   var contact = $('#contact').val();
   var suffix = $('#suffix').val();
   var address = $('#address').val();
   var gender = $('#gender').val();
   var username = $('#username').val();
   var email = $('#email').val();
   var birthdate = $('#birthdate').val();
   var birthplace = $('#birthplace').val();
   var nationality = $('#nationality').val();
   var religion = $('#religion').val();
   var save = "active"
   $.ajax({
    method:'POST',
    url:'../javascript/api/changepass.php',
    data:{    
        save:save,
        id:id,
        lrn:lrn,
        firstname:firstname,
        middlename:middlename,
        lastname:lastname,
        suffix:suffix,
        contact:contact,
        address:address,
        gender:gender,
        username:username,
        email:email,
        birthdate:birthdate,
        birthplace:birthplace,
        nationality:nationality,
        religion:religion,
},
success:function(save_all_response){
    if(save_all_response){
      swal({
        text:'Account Successfully Save',
        icon:'success'
      })
      console.log(save_all_response)
    }
}
   })
}
