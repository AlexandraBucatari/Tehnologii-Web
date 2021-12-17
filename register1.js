$('document').ready(function() {
  /* handle form validation */
  $("#register-form").validate({
      rules:
   {
   name: {
      required: true,
   minlength: 3
   },
   password: {
   required: true,
   minlength: 8,
   maxlength: 15
   },
   cpassword: {
   required: true,
   equalTo: '#password'
   },
   email: {
            required: true,
            email: true
            },
    },
       messages:
    {
            name: "please enter  name",
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            email: "please enter a valid email address",
   cpassword:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm
       });
    /* handle form submit */
    function submitForm() {
    var data = $("#register-form").serialize();
    $.ajax({
    type : 'POST',
    url  : 'register1.php',
    data : data,
    beforeSend: function() {
     $("#error").fadeOut();
     $("#btn-submit").html('<span
class="glyphicon glyphicon-transfer"></span>   sending ...');
    },
    success :  function(response) {
        if(response==1){
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div
class="alert alert-danger"> <span
class="glyphicon glyphicon-info-sign"></span>
Sorry email already taken !</div>');
			   $("#btn-submit").html('<span
class="glyphicon glyphicon-log-in"></span>   Create Account');
			 });
        } else if(response=="registered"){
			 $("#btn-submit").html('<img
src="ajax-loader.gif" />   Signing Up ...');
			 setTimeout('$(".form-signin").fadeOut(500,
function(){ $(".register_container").load("welcome.php"); }); ',3000);
        } else {
         	$("#error").fadeIn(1000, function(){
      			$("#error").html('<div
class="alert alert-danger"><span
class="glyphicon glyphicon-info-sign"></span>   '+data+' !</div>');
         		$("#btn-submit").html('<span
class="glyphicon glyphicon-log-in"></span>   Create Account');
         	});
       	}
        }
    });
    return false;
  }
});
