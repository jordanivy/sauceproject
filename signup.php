<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type ="text/css" href="css/main.css">
<title>Sign Up</title>
</head>
<style>
body {
	background-image: url("images/pagebg.jpg");
	background-repeat: repeat;
	font:10pt tahoma; 
	margin:0;
	padding:0;
}
</style>
<script type="text/javascript">
  function checkForm(form)
  {
	  
   if(form.username.value == "") {
      alert("Error: Email cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(form.username.value)) {
      alert("Error: This is an invalid email address!");
      form.username.focus();
      return false;
    }

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }

</script>
<?php
session_start();
require_once 'headerFooter.php';
pageHeader("Sign Up");
logIn();
echo "
<body>
<div id='contain'>
<div id='content'>
	<h4>Sign Up</h4>
	<form action = 'newUser.php' method = 'post' class='bootstrap-frm' onsubmit='return checkForm(this)'>
	<fieldset>
		<legend>Sign Up:</legend>
		First Name: <br>
		<input type = 'text' name = 'firstname' value = ''><br>
		Last Name: <br>
		<input type = 'text' name = 'lastname' value = ''><br>
		Email: <br>
		<input type = 'text' name = 'username' value = ''><br>
		Password: <br>
		<input type = 'text' name = 'pwd1' value = ''><br><br>
		Confirm Password: <br>
		<input type = 'text' name = 'pwd2' value = ''><br><br>
		<div class='buttons'>
		<input type='submit' class='btn red'>
		</div>
	</fieldset>
	</form>
</div>
</div>
</body>";

pageFooter();
?>