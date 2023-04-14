function logout_registrar(){
    var logout_reg = "logout_registrar";''
    swal({
        title:'Do you want to logout?',
        icon:'info',
        buttons:{
            Logout:'Logout',
            No:'No'
        }
       }).then(logout =>{
        switch(logout){
            case 'Logout':
                $.ajax({
                    method:'POST',
                    url:'../javascript/api/logout.php',
                    data:{
                        logout_reg: logout_reg
                    },
                    success:function(res){
                        if(res){
                            if(res =="logout_reg"){
                                window.location.href = "../index.php";
                            }
                            console.log(res)
                        }
                    }
                })
               
                break;
            case 'No':
        }
       })
   
}