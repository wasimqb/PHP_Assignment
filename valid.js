// $(document).ready(function() {

//     $('#myform').submit(function(e) 
//     {
//       e.preventDefault();
     
//       var uname = $('#uname').val();
      
//       var password = $('#password').val();
  
//       $(".error").remove();
  
//       if (uname.length < 1) {
//         $('#uname').after('<span class="error">This field is required</span>');
//       }
//       if (password.length < 8) {
//         $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
//       }
      
//     });
// });

function do_login()
{
 var uname=$("#uname").val();
 var pass=$("#password").val();
 if(uname!="" && pass!="")
 {
  $.ajax
  ({
  type:'post',
  url:'sign_in.php',
  data:{
   do_login:"do_login",
   uname:uname,
   password:pass
  },
  success:function(response) {
  if(response=="success")
  {
    // var res = $.parseJSON(response);
    //   alert(response);
    // window.location.href=".php";
    alert("login");
  }
  else
  {
    alert("Wrong Details");
  }
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}