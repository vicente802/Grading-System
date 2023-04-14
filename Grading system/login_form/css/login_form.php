body{
background-image:url('https://www.brookings.edu/wp-content/uploads/2020/05/empty-classroom_elementary-school-middle-school-high-school.jpg');
background-position:center;
background-size:fit-content;
background-repeat:no-repeat;
}
.card{
float:center;
position:relative;
display:block;
margin-top:250px;
box-shadow:0px 0px 55px 1px;
}
.login_form{
text-align:center;
width:35%;
}
.title{
text-align:center;
font-weight:bold;
font-size:30px;
margin-top:-10px;
}
.login{
margin-top:-10px;
}
.login .form-control{
text-align:Center;
}
.btn-primary{
margin-top:10px;
}
.login_form p{
margin-top:20px;
}
.login_form .fa{
text-align:left;
background:whitesmoke;
padding:10px;
}
.input-field{
border:none;
outline:none;
border-bottom: 1px solid black;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}
.swal-footer{
text-align:center;
}
.register #address{
width:670px;

}
#card-register{
width:150%;
margin-top:50px;
margin-left:-200px;
overflow:hidden;
}
#verify_button{
    margin-top:-5px;
}
#loading{
    width:70px;
    margin-top:-20px;
    z-index:0;
    position:relative;
    justify-content:right;
    text-align:right;
}
.loading_screen{
    display:flex;
    margin-right:280px;
    text-align:right;
    justify-content:right;
    z-index:-1;
}
#card-verification{
width:80%;
}
@media screen and (max-width:800px) and (min-width:700px){
#card-verification{
width:250%;
margin-left:-100px;
}
#card-login{
width: max-content;
margin-left:-100px;
}
.register{
margin-left:-10px;
}

#card-register{
width:auto;
margin-left:-240px;
margin-top:20px;
}
#verify_button{
    margin-top:0px;
}
.register #address{
width:max-content;

}
}
@media screen and (max-width:699px) and (min-width:600px) {
    #card-register{
width:fit-content;
margin-left:-200px;
margin-top:20px;
} 
.register #address{
width:fit-content;

}
}
@media screen and (max-width:500px){
    #card-register{
width:fit-content;
margin-left:-80px;
margin-top:20px;
text-align:center;
}   
.register{
    text-align:center;
}
.register #address{
width:fit-content;

}
#card-login{
    width:fit-content;
}
}
